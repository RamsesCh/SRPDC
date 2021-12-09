<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];

$id_pregunta = $_POST['id_pregunta'];
$pregunta = $_POST['pregunta'];
$status = $_POST['status'];
$descripcion = $_POST['descripcion'];

$insertar = $mysqli->query("UPDATE preguntas SET
	pregunta='$pregunta',	
    estado='$status',
    descripcion='$descripcion'
    where id_pregunta='$id_pregunta'");

$insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Preguntas', 'update', '$fecha_hora')");

    echo '<script>alert("Pregunta actualizada con exito")</script>';
    echo "<script>location.href='../preguntas.php'</script>";

?>