<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPago;
use App\Models\CertificadoHabilidad;
use App\Models\Pago;
use App\Models\Transaccion;
use App\Models\UsuariosColegiado;
use Illuminate\Http\Request;

use Session;


//FACTURACION
use Greenter\Ws\Services\SunatEndpoints;
use Greenter\See;
//FACTURACION MANEJO DE DATOS
use Greenter\Model\Client\Client;
use Greenter\Model\Company\Company;
use Greenter\Model\Company\Address;
use Greenter\Model\Sale\Invoice;
use Greenter\Model\Sale\SaleDetail;
use Greenter\Model\Sale\Legend;

class TransaccionController extends Controller
{

    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }
        $pagos = Transaccion::all();

        return view('transacciones.index', ['pagos' => $pagos]);
    }

    public function detalle(Transaccion $transaccion)
    {
        return view('transacciones.detalle', ['pago' => $transaccion]);
    }

    public function detalle_pago($pago)
    {
        $pago = Transaccion::where('id', $pago)->first();

        return $pago;
    }


    public function store(Request $request, $colegiado)
    {

        $colegiado = UsuariosColegiado::find($colegiado);
        $pago = Pago::find($request->pago);
        $categoria = CategoriasPago::where('id', $pago->categoria_pago_id)->first();
        $trans = new Transaccion();
        $trans->reg_cap = $colegiado->reg_cap;
        $trans->dni = $colegiado->dni;
        $trans->monto = $pago->monto;
        $trans->pago_concepto = $categoria->categoria . " - " .$pago->pago;
        $trans->exonerable = $pago->exonerable;
        $trans->estado = 1;
        $trans->fecha = date("Y-m-d");
        $trans->save();

        Session::flash('message','Deuda Generada con exito al colegiado!');
        return redirect()->route('view-colegiado', $colegiado);
    }

    public function show(Transaccion $deuda)
    {
        return $deuda;
    }

    public function edit(Transaccion $transaccion)
    {
        $usuario = UsuariosColegiado::where('reg_cap', $transaccion->reg_cap)->first();
        return view('usuarios-colegiados.edit', ['transaccion' => $transaccion, 'usuario' => $usuario]);
    }


    public function update_tipo_documento(Request $request)
    {
        $trans = Transaccion::where('id', $request->id_deuda)->first();

        if($request->tipo_documento == "boleta"){
            $trans->tipo_documento = 1;
            $trans->documento = $request->documento;
            $trans->razon_social = $request->razon_social;
            $trans->direccion = $request->direccion;
            $trans->save();
        }

        if($request->tipo_documento == "factura"){
            $trans->tipo_documento = 2;
            $trans->documento = $request->documento;
            $trans->razon_social = $request->razon_social;
            $trans->direccion = $request->direccion;
            $trans->save();
        }

        return $trans->monto;
    }

    public function update_mercado_pago(Transaccion $pago, $id_mercadopago){
        if($pago->certificado_id != null){
            $certificado = CertificadoHabilidad::find($pago->certificado_id);
            $certificado->pagado = 2;

            app(CertificadoHabilidadController::class)->create_certificado($pago->certificado_id);
        }

        $pago->estado = 2;
        $pago->id_mercadopago = $id_mercadopago;
        $pago->medio_pago = 1;
        $pago->save();

        return $pago;
    }

    public function update_panel(Request $request, Transaccion $transaccion)
    {

            $transaccion->estado = $request->estado;
            $transaccion->medio_pago = 2;
            $transaccion->save();

            $usuario = UsuariosColegiado::where('reg_cap', $transaccion->reg_cap)->first();

            if($request->estado == 2){
                return view('usuarios-colegiados.transaccion-datos-panel', ['transaccion' => $transaccion, 'usuario' => $usuario]);
            }
            else{
                Session::flash('message','Estado del pago actualizado correctamente!');
                return back();
            }

    }

    public function update_emision_factura(Request $request, Transaccion $transaccion){
        $transaccion->tipo_documento = $request->tipo_documento;
        $transaccion->documento = $request->documento;
        $transaccion->razon_social = $request->razon_social;
        $transaccion->direccion = $request->direccion;

        $transaccion->save();

        $colegiado = UsuariosColegiado::where('reg_cap', $transaccion->reg_cap)->first();

        return redirect()->route('view-colegiado', $colegiado->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaccion $transaccion)
    {
        //
    }
}
