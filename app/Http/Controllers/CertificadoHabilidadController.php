<?php

namespace App\Http\Controllers;

use App\Models\CertificadoHabilidad;
use App\Http\Controllers\Controller;
use App\Models\UsuariosColegiado;
use App\Models\Transaccion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Generator;

use QrCode;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;

class CertificadoHabilidadController extends Controller
{

    public function index()
    {

    }

    public function  certificadosColegiados($colegiado){
        $certificados = CertificadoHabilidad::where('reg_cap', $colegiado)->where('pagado', 1)->get();

        return $certificados;
    }

    public function store(Request $request)
    {
        $colegiado = UsuariosColegiado::where('reg_cap', $request->reg_cap)->first();
        $serial = Str::random(50);
        $verificar = Transaccion::where('reg_cap', $request->reg_cap)->where('estado', 1)->where('certificado_id', '!=', 'null')->count();


        if($verificar > 0){
            $verificar = Transaccion::where('reg_cap', $request->reg_cap)->where('estado', 1)->where('certificado_id', '!=', 'null')->first();
            return $verificar;
        }
        else{
            //Registro de Certificado
            $certi = new CertificadoHabilidad();
            $certi->reg_cap = $request->reg_cap;
            $certi->nombres_apellidos = $colegiado->apellido_paterno. " ". $colegiado->apellido_materno. " ". $colegiado->nombres;
            $certi->codigo_serie = $serial;
            $certi->vigencia_fecha = date('Y-m-d');
            $certi->link_validacion = "localhost:8000/verificar-certificado-habilidad/".$serial;
            $certi->pdf = $serial.".pdf";
            $certi->pagado = 1;
            $certi->save();

            //Registro de Transaccion
            $trans = new Transaccion();
            $trans->reg_cap = $request->reg_cap;
            $trans->dni = $colegiado->dni;
            $trans->monto = $request->monto;
            $trans->pago_concepto = $request->pago_concepto;
            $trans->estado = 1;
            $trans->fecha = date("Y-m-d");
            $trans->exonerable = 1;
            $trans->certificado_id = $certi->id;
            $trans->save();

            return $trans;
        }
    }

    public function create_certificado($id_certificado)
    {
        setlocale(LC_ALL, 'es_ES');
        set_time_limit(60000);


        $data = CertificadoHabilidad::find($id_certificado);
        $serial = $data->codigo_serie;
        $fecha = Carbon::parse($data->vigencia_fecha);
        $fecha->format("F");
        Carbon::setLocale('es');
        $fecha->diffForHumans(); //esto se mostrará en español
        $fecha = $fecha->day . " del ".$fecha->monthName." del ".$fecha->year;

        $emision = Carbon::parse($data->created_at);
        $emision->format('F');
        $emision->diffForHumans();
        $emision->locale();

        $emision = $emision->day . " del ".$emision->monthName." del ".$emision->year;

        /** Codigo que permite generar el Codigo QR para su posterior lectura **/
        QrCode::generate('https://localhost:8000/verificar-certificado/'.$serial, '../public/img/'.$serial.'.svg');
        $pdf = $serial.".pdf";

        //return view('pdfs.certificado_habilidad', $data);

        PDF::loadView('pdfs.certificado_habilidad', ['data' => $data, 'vigencia' => $fecha, 'emision' => $emision, 'serial' => $serial])
                    ->setPaper('a4', 'portrait')
                    ->save("pdf/".$pdf);
    }

    public function show(CertificadoHabilidad $certificadoHabilidad)
    {

    }

    public function edit(CertificadoHabilidad $certificadoHabilidad)
    {
        //
    }

    public function update(Request $request, CertificadoHabilidad $certificadoHabilidad)
    {
        //
    }

    public function destroy(CertificadoHabilidad $certificadoHabilidad)
    {
        //
    }
}
