<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\CategoriasPago;
use Illuminate\Http\Request;

class PagoController extends Controller
{

    public function index()
    {
        $pagos = Pago::all();
        $categorias = CategoriasPago::all();
        return view('pagos.index', ['pagos' => $pagos, 'categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $pago = new Pago();
        $pago->categoria_pago_id = $request->categoria;
        $pago->pago = $request->pago;
        $pago->concepto = $request->concepto;
        $pago->estado = $request->estado;
        $pago->save();

        return back();
    }


    public function desactivar(Pago $pago)
    {
        $pago->estado = 2;
        $pago->save();

        return back();
    }

    public function activar(Pago $pago)
    {
        $pago->estado = 1;
        $pago->save();

        return back();
    }


    public function update(Request $request)
    {
        $pago = Pago::find($request->id);
        $pago->categoria_pago_id = $request->categoria;
        $pago->pago = $request->pago;
        $pago->concepto = $request->concepto;
        $pago->save();

        return redirect()->route('pagos');
    }


    public function edit(Pago $pago)
    {
        $categorias = CategoriasPago::all();
        return view('pagos.edit', ['pago' => $pago, 'categorias' => $categorias]);
    }
}
