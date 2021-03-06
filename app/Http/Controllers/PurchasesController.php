<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Drink;
use App\Ingredient;
use App\Liqueur;
use App\Provider;
use App\Purchase;
use App\Unit;
use Laracasts\Flash\Flash;
use App\Http\Requests;
use PDF;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Purchase::orderBy('id', 'ASC')->get();

        return view('admin.purchases.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $providers = Provider::all();

        $request->proveedor ? $ingredients = Provider::find($request->proveedor)->ingredients()->get() : $ingredients = false;

        $request->proveedor ? $liqueurs = Provider::find($request->proveedor)->liqueurs()->get() : $liqueurs = false;

        $request->proveedor ? $drinks = Provider::find($request->proveedor)->drinks()->get() : $drinks = false;

        $request->proveedor ? $provider = Provider::find($request->proveedor) : $provider = false;

        if($request->proveedor && $liqueurs == '[]' && $drinks == '[]' && $ingredients == '[]')
        {   

            $proveedor = Provider::find($request->proveedor);
            $provider = true;


        	$ingrediente = route('admin.ingredientes.create');
        	$bebida = route('admin.bebidas.create');
        	$licor = route('admin.licores.create');
            
            Flash::warning('<strong> Alerta </strong> El proveedor <strong>'.$proveedor->razon_social.'</strong> no tiene productos asociados, registre un: <strong><a href="'.$ingrediente.'">Ingrediente</a></strong>, <strong><a href="'.$licor.'">licor</a></strong> o <strong><a href="'.$bebida.'">bebida</a></strong>');

            return redirect('admin/compra/create');

        }
        
        $request->proveedor ? $id_proveedor = $request->proveedor : $id_proveedor = false;
        
        if(isset($request->add_ingredients) || isset($request->add_liqueurs) || isset($request->add_drinks)){

        $id_proveedor = $request->id_proveedor;
        $provider = Provider::find($id_proveedor);
            if(isset($request->add_ingredients)){

                foreach ($request->add_ingredients as $key => $value) {

                    $data_ingredient[$key] = Ingredient::find($value);
                    $units_i[$key] = Ingredient::find($value)->unit()->get();

                }

            }else{

                $data_ingredient = false;
            }

            if(isset($request->add_liqueurs)){

                foreach ($request->add_liqueurs as $key => $value) {

                    $data_liqueur[$key] = Liqueur::find($value);
                    $units_l[$key] = Liqueur::find($value)->unit()->get();


                }

            }else {

                $data_liqueur = false;
            }

            if(isset($request->add_drinks)){

                foreach ($request->add_drinks as $key => $drink) {

                    $data_drink[$key] = Drink::find($drink);
                    $units_d[$key] = Drink::find($drink)->unit()->get();

                }

            }else{

                $data_drink = false;
            }



        return view('admin.purchases.create', compact('providers', 'provider', 'ingredients', 'liqueurs', 'drinks', 'data_ingredient', 'data_liqueur', 'data_drink', 'units_d', 'units_i', 'units_l', 'id_proveedor'));


        }else {

            $data_ingredient = false;
            $data_liqueur = false;
            $data_drink = false;


        }

        return view('admin.purchases.create', compact('providers', 'provider', 'ingredients', 'liqueurs', 'drinks', 'data_ingredient', 'data_liqueur', 'data_drink', 'id_proveedor'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now('America/Caracas');
        $provider = Provider::find($request->id_proveedor);
        $order = new Purchase;
        $order->proveedor_id = $request->id_proveedor;
        $order->estatus = '0';
        $order->fecha = $date;
        $order->save();

        if(isset($request->ingredients)){

            foreach ($request->ingredients as $i => $ingredient) {

                $order->ingredient()->attach([$ingredient => ['cantidad' => $request->cantidad_ingredient[$i], 'precio' => '0.00']]);
            }
        }

        if(isset($request->liqueurs)){

            foreach ($request->liqueurs as $l => $liqueur) {

                $order->liqueur()->attach([$liqueur => ['cantidad' => $request->cantidad_liqueur[$l], 'precio' => '0.00']]);
            }
        }

        if(isset($request->drinks)){

            foreach ($request->drinks as $d => $drink) {

                $order->drink()->attach([$drink => ['cantidad' => $request->cantidad_drink[$d], 'precio' => '0.00']]);
            }
        }

    $url = route('admin.compra.show', $order->id);
    bitacora('Realizó orden de compra', $order->id, $order->id);
    Flash::success('<strong> Éxito </strong> Se proceso la <strong><a href="'.$url.'" title="Ver orden">Orden de compra</a></strong> correctamente!');

    return redirect('admin/compra');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Purchase::find($id);
        $ingredients = $order->ingredient()->get();
        $liqueurs = $order->liqueur()->get();
        $drinks = $order->drink()->get();


        return view('admin.purchases.show', compact('order', 'ingredients', 'liqueurs', 'drinks'));

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

    public function process($id)
    {
        $order = Purchase::find($id);

        if($order->estatus == '0')
        {

            $ingredients = Purchase::find($id)->ingredient;
            $liqueurs = Purchase::find($id)->liqueur;
            $drinks = Purchase::find($id)->drink;

            return view('admin.purchases.process', compact('ingredients', 'liqueurs', 'drinks', 'order'));

        }else{

            Flash::warning('<strong> Alerta </strong> esta orden se encuentra en estado procesado.');

            return redirect()->back();
        }

    }


    public function saved(Request $request)
    {
        $order = Purchase::find($request->id_compra);
        //dd($request->id_compra);
        //dd($order);
        //dd($request->all());
        if($order->estatus == '0')
        {
            $order->estatus = '1';
            $total = 0;

            if ($request->ingredients or $request->liqueurs or $request->drinks)
            {
                if($request->ingredients)
                {
                    foreach ($request->ingredients as $key => $ingredient)
                    {
                        $i = Ingredient::find($ingredient);
                        $i->stock = $i->stock += $request->cantidad_ingredient[$key];
                        $i->save();

                        $order->ingredient[$key]->pivot->precio += $request->precio_i[$key];
                        $order->ingredient[$key]->pivot->cantidad = $request->cantidad_ingredient[$key];
                        $order->ingredient[$key]->pivot->importe = $request->cantidad_ingredient[$key] * $request->precio_i[$key];
                        $total = $order->ingredient[$key]->pivot->importe + $total;
                        $order->ingredient[$key]->pivot->save();
                    }

                }

                if($request->liqueurs)
                {
                    foreach ($request->liqueurs as $key => $liqueur)
                    {
                        $l = Liqueur::find($liqueur);
                        $l->stock = $l->stock += $request->cantidad_liqueur[$key];
                        $l->save();

                        $order->liqueur[$key]->pivot->precio += $request->precio_l[$key];
                        $order->liqueur[$key]->pivot->cantidad = $request->cantidad_liqueur[$key];
                        $order->liqueur[$key]->pivot->importe = $request->cantidad_liqueur[$key] * $request->precio_l[$key];
                        $total = $order->liqueur[$key]->pivot->importe + $total;
                        $order->liqueur[$key]->pivot->save();
                    }
                }

                if($request->drinks)
                {
                    foreach ($request->drinks as $key => $drink)
                    {
                        $d = Drink::find($drink);
                        $d->stock = $d->stock += $request->cantidad_drink[$key];
                        $d->save();

                        $order->drink[$key]->pivot->precio += $request->precio_d[$key];
                        $order->drink[$key]->pivot->cantidad = $request->cantidad_drink[$key];
                        $order->drink[$key]->pivot->importe = $request->cantidad_drink[$key] * $request->precio_d[$key];
                        $total = $order->drink[$key]->pivot->importe + $total;
                        $order->drink[$key]->pivot->save();
                    }
                }
            
            $order->total = $total;
            $order->save();
                Flash::success('<strong> Ëxito </strong> se ha incrementado la existencia de los productos en el inventario correctamente.');

                return redirect('admin/compra');

            }else{

                Flash::warning('<strong> Alerta </strong> error al incrementar la existencia de los productos.');
            }

        }else{

            Flash::warning('<strong> Alerta </strong> esta orden se encuentra en estado procesado.');

            return redirect()->back();
        }
    }

    public function pdf($id)
    {
        $orden = Purchase::find($id);
        $ingredientes = $orden->ingredient()->get();
        $licores = $orden->liqueur()->get();
        $bebidas = $orden->drink()->get();

        
        $pdf =  PDF::loadView('admin.purchases.pdf.individual', ['orden' => $orden, 'ingredientes' => $ingredientes, 'licores' => $licores, 'bebidas' => $bebidas]);
        
        return $pdf->stream();
    }

    public function printList()
    {
        $ordenes = Purchase::orderBy('id', 'DESC')->get();

        $pdf =  PDF::loadView('admin.purchases.pdf.listado', ['ordenes' => $ordenes]);
        
        return $pdf->stream();
    }
}
