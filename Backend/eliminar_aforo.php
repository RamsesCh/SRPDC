<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];
 
$id = $_REQUEST['id'];

$consulta="DELETE from aforo where id_aforo='$id'";
$result=$mysqli->query($consulta);


$insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Aforo', 'Delete', '$fecha_hora')");

echo '<script>alert("Registro eliminado con exito")</script>';
echo "<script>location.href='../gestion_aforo.php'</script>";
?>