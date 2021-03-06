<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plate;
use App\Ingredient;
use App\Ingredients_type;
use App\Liqueurs_type;
use App\Unit;
use Laracasts\Flash\Flash;
use App\Plates_has_ingredient;
use App\Plates_has_liqueur;
use App\Plates_has_sauce;
use App\Sauce;
use App\Image;
use App\Bitacora;
use Carbon\Carbon;

use App\Http\Requests;

class PlatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::orderBy('plato')->get();
        $plates->each(function($plates){
            $plates->image;
        });
        return view('admin.plates.index')
            ->with('plates', $plates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $ingredients_types = Ingredients_type::all();
        $liqueurs_types = Liqueurs_type::lists('tipo_licor', 'id');

        $sauces = Sauce::lists('salsa', 'id');


        return view('admin.plates.create', compact('ingredients_types', 'liqueurs_types', 'sauces'));


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //--  Manipulando la imagen
        if($request->file('image'))
        {
            $file = $request->file('image');
            $name = 'orisa_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/plates/';
            $file->move($path, $name);

            $image = new Image();
            $image->imagen = $name;
            $image->save();
        }

        //--  Guardando datos del plato
        $plate = new Plate($request->all());
        $plate->image_id = $image->id;
        $plate->save();

        // Guardando los ingredientes
        foreach ($request->id_ingredientes as $key => $value) {

            $receta = new Plates_has_ingredient();

            $receta->plato_id = $plate->id;
            $receta->ingrediente_id = $request->id_ingredientes[$key];
            $receta->cantidad_ingrediente = $request->cantidades_i[$key];
            $receta->unit_id = $request->unidades_i[$key];

            $receta->save();
        }

        //-- Guardando la salsas --//
        if ($request->sauces) {

            foreach ($request->sauces as $key => $value) {
                $salsa = new Plates_has_sauce();

                $salsa->salsa_id = $value;
                $salsa->plato_id = $plate->id;
                $salsa->save();
            }
        }

        //-- Guardando los licores
        if ($request->id_licores) {

            foreach ($request->id_licores as $key => $licor) {

              $plate->licores()->attach([$licor => ['cantidad_licor' => $request->cantidades_l[$key], 'unit_id' => $request->unidades_l[$key]]]);
            }
        }

        bitacora('Registro el plato', $plate->plato, $plate->id);

        Flash::success('<strong>Éxito </strong> el plato '. $plate->plato .' se creo correctamente.');

        return redirect('admin/platos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plate = Plate::find($id);

        $ingredientes = $plate->ingredientes()->get();
        $licores = $plate->licores()->get();
        $unidades_licores = $plate->UnidadesLicores()->get();
        $unidades_ingredientes = $plate->UnidadesIngredientes()->get();
        $salsas = $plate->salsas()->get();

       return view('admin.plates.show', compact('plate', 'ingredientes', 'licores', 'unidades_licores', 'unidades_ingredientes', 'salsas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $plate = Plate::findOrFail($id);

        $ingredientes = $plate->Ingredientes()->get();
        $licores = $plate->Licores()->get();
        $plate->Ingredientes()->detach();
        $plate->Licores()->detach();
        foreach($ingredientes as $key => $ingrediente)
        {
          $plate->Ingredientes()->attach([$ingrediente->id => ['cantidad_ingrediente' => $request->cantidad_i[$key], 'unit_id' => $request->units[$key]]]);
        }

        if($request->cantidad_l){
          foreach($licores as $key => $licor)
          {
            $plate->Licores()->attach([$licor->id => ['cantidad_liqueur' => $request->cantidad_l[$key], 'unit_id' => $request->units_l[$key]]]);
          }
        }

        bitacora('Edito el plato', $plate->plato, $id);
        Flash::success('<strong>Éxito </strong> el plato '. $plate->plato .' se modifico correctamente.');

        return redirect()->back();
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
