<?php 
session_start();
require("conexion.php");

if(@!$_SESSION['matricula'])
{
  header("location:index.php");
}
  $tipo_rol=$_SESSION['tipo_rol'];
  $nombre=$_SESSION['nombre'];
  $fecha = date("Y-m-d");

  date_default_timezone_set('America/Mexico_City');
  $fecha_hora = date("Y-m-d H:i:s");
  $hora = date("H:i:s");

if($tipo_rol=='Estudiante')
{
  $matricula=$_SESSION['matricula'];
  $nivel_educativo=$_SESSION['nivel_educativo'];
  $cuatrimestre=$_SESSION['cuatrimestre'];
  $carrera=$_SESSION['carrera'];
  $grupo=$_SESSION['grupo'];
  $pass=$_SESSION['pass']; 
}
else
{
  $id_usuario=$_SESSION['id_usuario'];
	$telefono=$_SESSION['telefono'];
	$correo=$_SESSION['matricula'];
	$password=$_SESSION['password'];
	$id_rol=$_SESSION['id_rol'];
}
?>