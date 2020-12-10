<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Liqueurs_type;
use App\Ingredients_type;
use Laracasts\Flash\Flash;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categorias_licor = Liqueurs_type::all();
        $categorias_ingredientes = Ingredients_type::all();
        return view('admin.categorias.index', compact('categorias_licor', 'categorias_ingredientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->tipo)
        {
            $categoria = new Liqueurs_type();
            $categoria->tipo_licor = $request->nombre;
        }else 
        {
            $categoria = new Ingredients_type();
            $categoria->tipo_ingrediente = $request->nombre;
        }
       
        $categoria->save();
        
        Flash::success('<strong>Exito! </strong> la categoria se creo correctamente');

        return redirect('admin/categorias');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $type)
    {   
        $categoria = Liquei::find($id);
        return view('admin/categorias/edit', compact('categoria'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
