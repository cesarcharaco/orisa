<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Unit;
use App\Ingredients_type;
use App\Ingredient;
use App\Http\Requests;
use App\Http\Requests\IngredientRequest;
use App\Http\Requests\IngredientEditRequest;
use Laracasts\Flash\Flash;
use Response;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();

        return view('admin.ingredients.index', compact('ingredients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $providers = Provider::lists('razon_social', 'id');
        $units = Unit::lists( 'unidad', 'id');
        $ingredients_types = Ingredients_type::lists( 'tipo_ingrediente', 'id');

        return view('admin.ingredients.create', compact('units', 'providers', 'ingredients_types'));
    }

    public function getIngredients($type)
    {
        $ingredients = Ingredient::where('id_type', $type)->get();
        
        return Response::json($ingredients);
    }

    public function addIngredient($id_i)
    {
        $ingredient = Ingredient::where('id', $id_i)->get();

        $units = Unit::all();

        return Response::json(array('ingredient' => $ingredient, 'units' => $units));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientRequest $request)
    {

        $ingredient = Ingredient::create($request->all());
        $ingredient->save();

        foreach($request->id_providers as $provider)
        {
            $ingredient->providers()->attach($provider);
        }

        

        bitacora('Registro el ingrediente', $ingredient->ingrediente, $ingredient->id);

        Flash::success('<strong> Éxito </strong> se ha registrado un nuevo ingrediente '.$ingredient->ingrediente .' correctamente.');

        return redirect('admin/ingredientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredients_types = Ingredients_type::lists( 'tipo_ingrediente', 'id');
        $units = Unit::lists( 'unidad', 'id');

        $providers = false;

        return view('admin.ingredients.show', compact('ingredient', 'providers', 'ingredients_types', 'providers', 'units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredients_types = Ingredients_type::lists( 'tipo_ingrediente', 'id');
        $units = Unit::lists( 'unidad', 'id');

        $providers = false;

        return view('admin.ingredients.edit', compact('ingredient', 'providers', 'ingredients_types', 'providers', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientEditRequest $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        $ingredient->fill($request->all());
        $ingredient->save();

        bitacora('Edito el ingrediente', $ingredient->ingrediente, $id);

        Flash::success('<strong>Exito </strong> '. $ingredient->ingrediente. ' se actualizo correctamente.');


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $ingredient = Ingredient::find($request->id);
        $ingredient->delete();

        bitacora('Se elimino el ingrediente', $ingredient->ingrediente, $request->id);


        Flash::success('<strong>Éxito </strong> el ingrediente '. $ingredient->ingrediente .' se eliminó correctamente.');

        return redirect('admin/ingredientes');
    }
}
