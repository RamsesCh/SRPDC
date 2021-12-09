<?php
session_start();
require("../conexion.php");

$matricula=$_SESSION['matricula'];
$nombre=$_SESSION['nombre'];
$nivel_educativo=$_SESSION['nivel_educativo'];
$carrera=$_SESSION['carrera'];
$cuatrimestre=$_SESSION['cuatrimestre'];
$grupo=$_SESSION['grupo'];
$grupo_short=explode(' ',$grupo);
$tipo_rol=$_SESSION['tipo_rol'];

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$fecha_hora = date("Y-m-d H:i:s");

if($p1=='NO' && $p2=='NO' && $p3=='NO' && $p4=='NO')
{
    $valido=1;
}
else
{
    $valido=0;
}

$contenido = $tipo_rol.'||'.$matricula.'||'.utf8_encode($nombre).'||'.$nivel_educativo.'||'.utf8_encode($carrera).'||'.$cuatrimestre.'||'.$grupo_short[0].'||'.$fecha.'||'.$hora.'||'.$p1.'||'.$p2.'||'.$p3.'||'.$p4.'||'.$valido;

$insertar = $mysqli->query("INSERT INTO qr VALUES ('', '$contenido', '$fecha', '$hora', '1', '$matricula', '$valido')");
echo "<script>location.href='../mostrarqr.php'</script>";

?>