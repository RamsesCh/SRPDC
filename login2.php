<?php
require_once('./lib/nusoap.php');


$client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
	$err = $client->getError();
	if ($err) {
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	}
	$params = array(
		'lsMatricula' => 'TI2018S030',
		'lsPassword' => 'cibernet'
		
	);
	$result = $client->call('Login', $params);
	if ($result) {

             $data = $result['LoginResult']['diffgram'];
			 

		if($data)
        {	
            $nombre =$data['NewDataSet']['Alumno']['nombre'];
            $apaterno =$data['NewDataSet']['Alumno']['apaterno'];
            $amaterno =$data['NewDataSet']['Alumno']['amaterno'];
            $matricula =$data['NewDataSet']['Alumno']['matricula'];
            $nivel_educativo =$data['NewDataSet']['Alumno']['desc_nivel'];
            $cuatrimestre =$data['NewDataSet']['Alumno']['desc_grado'];
			$carrera =$data['NewDataSet']['Alumno']['desc_carrera'];
            $grupo =$data['NewDataSet']['Alumno']['grupo'];
            $pass =$data['NewDataSet']['Alumno']['contrasena'];

			echo '<script>alert("Bienvenido")</script>';
            echo print_r($data).'<br><br>';
            echo 'DATOS DE USUARIO: '.$nombre.' '.$apaterno.' '.$amaterno.'<br>';
            echo 'MATRICULA: '.$matricula.'<br>';
            echo 'NIVEL EDUCATIVO: '.$nivel_educativo.'<br>';
			echo 'CARRERA: '.$carrera.'<br>';
            echo 'CUATRIMESTRE: '.$cuatrimestre.'<br>';
			echo 'GRUPO: '.$grupo.'<br>';
            echo 'CONTRASEÑA: '.$pass.'<br>';
		}

		else
		{
			echo '<script>alert("Acceso denegado")</script>';
		}

	 }
//json_encode($newResult, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
?>
