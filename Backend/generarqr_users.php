<?php
require("../conexion.php");
require("../componentes/variables_session.php");

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

if($p1=='NO' && $p2=='NO' && $p3=='NO' && $p4=='NO')
{
    $valido=1;
}
else
{
    $valido=0;
}

$contenido = $tipo_rol.'||'.$id_usuario.'||'.$fecha.'||'.$hora.'||'.$p1.'||'.$p2.'||'.$p3.'||'.$p4.'||'.$valido;


$insertar = $mysqli->query("INSERT INTO qr VALUES ('', '$contenido', '$fecha', '$hora', '1', '$id_usuario', '$valido')");
echo "<script>location.href='../mostrarqr.php'</script>";

?>