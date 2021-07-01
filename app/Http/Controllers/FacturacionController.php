<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    public function verificarruc($ruc){
        // Datos
        $token = 'apis-token-502.vVgJNGu-wIN8CFkdzNoeeWRFFlmfsH1C';

        // Iniciar llamada a API
                $curl = curl_init();

        // Buscar ruc sunat
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $ruc,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Referer: http://apis.net.pe/api-ruc',
                        'Authorization: Bearer ' . $token
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        // Datos de empresas según padron reducido
                $empresa = json_decode($response, true);
                return $empresa;
    }
}
