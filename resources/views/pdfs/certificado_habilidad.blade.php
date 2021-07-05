<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>
<body>
<table>
    <tr width="100%">
        <td width="15%"><img src="https://robertoprincipe.com/logo.png" alt="" width="100%"> </td>
        <td width="85%" style="text-align: center !important;">
            <h2> <b> COLEGIO DE ARQUITECTOS DEL PERU </b> </h2>
            <h3> <b> REGIONAL DE PIURA </b> </h3>
        </td>
    </tr>
</table>

<div style="width:100%; border: solid 2px; border-radius: 30px; height: 790px;">
    <div style="width: 100%; border-bottom: 1px solid; padding: 5px; padding-left: 15px; padding-right: 15px; font-weight: 900; font-size: 1.3em;">
        CERTIFICADO DE HABILIDAD PROFESIONAL
        <div style="float: right; margin-left: 5px; color: red;"> N - {{$data->id}}</div>
    </div>

    <div style="width: 100%; padding: 15px; text-align: justify-all!important; background-image: url('https://robertoprincipe.com/logo.png'); background-repeat: no-repeat; background-position: 50% 50%;">
        <div style="background-color: rgba(255, 255, 255, 0.5);">
        Estado: <b> <u>HABILITADO</u> </b> <br>
        Vigencia:<b> <u>VALIDO HASTA EL {{strtoupper($vigencia)}}</u> </b>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="width: 100%; text-align: justify!important;">
            Por el presente, el Colegio de Aequitectos del Perú - Regional Piura <br> <br>
            certifica que el Arq° <b><u>{{$data->nombres_apellidos}}</u></b> con Colegiatura N° <b><u>{{$data->reg_cap}}</u></b>, se encuentra
            habilitado (a) para el ejercicio profesional de acuerdo con lo establecido en el Art°. 3 del D.S. N° 005 - 2011 - VIVIENDA,
            reglamento de la Ley N° 28966 (Ley que complementa el marco legal vigente referido al ejecicio profesional del Arquitecto)
            y el Art°. N° 4 del Estatuto de Colegio de Arquitectos del Perú. <br> <br>

            Se expide el presente a solicitud del interesado.

            <br><br><br><br>

            <img src="{{public_path('img/'.$serial.'.svg')}}" alt="">

            <div style="float: right">Piura, {{$emision}}</div>
            <br>
            <div style="font-size: 0.9em">Este Certificado puede ser verificado a través del correo institucional cappiuraregional@cappiura.org.pe y utilizando lectora de códigos
            o teléfono celular enfocando al código QR. El celular debe poseer un software gratuito descargado desde internet.
            El presente documento deja constancia únicamente del Certificado de Habilidad que se señala.
                Tiene una vigencia de 30 días calendario.</div>
            <br><br>


            <div style="font-size: 0.9em">
                <b>NOTA:</b> <br>
                * Vigente segun se expresa en el presente documento <br>
                * Este certificado es obligatorio para demostrar la habilidad profesional del titular, en todos los casos que requiera acreditarse
                para realizar actividades propias del ejercicio profesional del arquitecto
            </div>


        </div>


    </div>

        </div>
    <div style="float:bottom; border-top: solid 2px; width: 100% !important; margin-top: 50px; text-align: center!important; padding-top: 15px">
        <b>CALLE AREQUIPA 921 - PIURA - PERU - TELEFAX: 073 - 328194</b>
    </div>
</div>

<main>

</main>

</body>
</html>
