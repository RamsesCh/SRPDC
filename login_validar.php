<?php
session_start();
require_once('./lib/nusoap.php');
require("conexion.php");

$correo=$_POST['User'];
$password=$_POST['Pass'];
if($correo=="" || $password==""){
	echo "CAMPOS OBLIGATORIOS";
}
else
{
		if (filter_var($correo, FILTER_VALIDATE_EMAIL)) ///EN ESTE IF SE BUSCAN LOS USUSARIOS LOCALES ES DECIR AQUELLOS QE NO VIENEN DE WEBSERVICE
		{
			$consultar=$mysqli->query("SELECT * FROM usuarios WHERE correo='$correo' AND estado='Activado'");
			if($dato=$consultar->fetch_array())
			{
				if($password==$dato['password'])
				{
					$consultar_rol=$mysqli->query("SELECT * FROM usuarios INNER JOIN roles ON roles.id_rol=usuarios.id_rol WHERE usuarios.correo='$correo'");
					$dato_rol=$consultar_rol->fetch_array();

					$id_usuario=$_SESSION['id_usuario']=$dato['id_usuario'];
					$nombre=$_SESSION['nombre']=$dato['nombre'];
					$telefono=$_SESSION['telefono']=$dato['telefono'];
					$correo=$_SESSION['matricula']=$dato['correo'];
					$password=$_SESSION['password']=$dato['password'];
					$tipo_rol=$_SESSION['tipo_rol']=$dato_rol['nombre_rol'];
					$id_rol=$_SESSION['id_rol']=$dato_rol['id_rol'];

					//echo '<script>alert("Bienvenido:'.$nombre.'")</script>';
					echo "<script>location.href='info_user.php'</script>";
				}
				else
				{
					echo "PASSWORD INCORRECTO";
					
				}
			}
			else
			{
					echo "USUARIO INCORRECTO";
			}
		}
		else //////////ACA SE BUSCA EN WEB SERVICE
		{
			$client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
			}
			$params = array(
				'lsMatricula' => $correo,
				'lsPassword' => $password
				
			);
			$result = $client->call('Login', $params);
			if ($result) {

					$data = $result['LoginResult']['diffgram'];
					

				if($data)
				{	
					$matricula=$_SESSION['matricula']=$data['NewDataSet']['Alumno']['matricula'];
					$nombre_solo=$_SESSION['nombre_solo']=$data['NewDataSet']['Alumno']['nombre'];//este solo es el pimer nopmbre o nombres
					$apaterno=$_SESSION['apaterno']=$data['NewDataSet']['Alumno']['apaterno'];
					$amaterno=$_SESSION['amaterno']=$data['NewDataSet']['Alumno']['amaterno'];
					$nombre=$_SESSION['nombre']=$nombre_solo.' '.$apaterno.' '.$amaterno;//Este es el nombre completo
					$nivel_educativo=$_SESSION['nivel_educativo']=$data['NewDataSet']['Alumno']['desc_nivel'];
					$cuatrimestre=$_SESSION['cuatrimestre']=$data['NewDataSet']['Alumno']['desc_grado'];
					$carrera=$_SESSION['carrera']=$data['NewDataSet']['Alumno']['desc_carrera'];
					$grupo=$_SESSION['grupo']=$data['NewDataSet']['Alumno']['desc_grupo'];
					$pass=$_SESSION['pass']=$data['NewDataSet']['Alumno']['contrasena'];
					$tipo_rol=$_SESSION['tipo_rol']='Estudiante';

					echo "<script>location.href='contestar_form.php'</script>";
					//echo '<script>alert("Bienvenido '.$nombre.'")</script>';
					
				}

				else
				{
					echo "DATOS INCORRECTOS";
				}

			}
		}
}

?>