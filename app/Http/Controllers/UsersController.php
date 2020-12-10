<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Permissions\StandardPermissions;
use Response;
use Sentinel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $empleado = Employee::find($request->id);

        return view('admin.users.create', compact('empleado'));
    }

    public function verificar($clave)
    {
        $hasher = Sentinel::getHasher();
        $user = Sentinel::getUser();        

        if ($hasher->check($clave, $user->password)) {
            return Response::json(true);
        }else {
            return Response::json(false);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $employee = Employee::find($request->id);

        $user = new User;
        $user->email      = $request->email;
        $user->first_name = strtoupper($employee->nombres);
        $user->last_name  = strtoupper($employee->apellidos);
        $user->password   = bcrypt($request->password);
        $user->status     = 0;

        foreach ($request->permissions as $key => $permission)
        {
            if ($permission == 'true')
            {
                $user->addPermission($key);

            } else {

                $user->addPermission($key, false);
            }
        }

        $user->save();

        $user->employee()->attach($employee->id);

        $activation = \Activation::create($user);

        $role = Sentinel::findRoleBySlug($request->roles_id);

        $role->users()->attach($user);

        $this->sendEmail($user, $activation->code);


        Flash::success('Exito el usuario '. $user->first_name .' se ha creado correctamente, se envio un correo para activar la cuenta.');

        return redirect('admin/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = EloquentUser::findOrFail($id);

        if (count($request->permissions) == 0)
        {
            $user->permissions = [];

        } else {

            foreach ($request->permissions as $key => $permission)
            {
                if ($permission == 'true')
                {
                    $user->updatePermission($key);

                    } else {
                    
                    $user->updatePermission($key, false);
                }
            } 

        }

        $user->save();

        Flash::success('Exito el usuario '. $user->first_name .' se ha editado correctamente');

        return redirect('admin/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Flash::success('Exito el usuario '. $user->name .' eliminado correctamente');
    }

    private function sendEmail($user, $code)
    {
        \Mail::send('auth.activation', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email);

            $message->subject("Hola, $user->first_name, activa tu cuenta.");
        });
    }
}
