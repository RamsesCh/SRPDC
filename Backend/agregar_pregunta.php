<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];

/////////Consulta que solo existan 4 preguntas de sanidad
$consulta = $mysqli->query("SELECT COUNT(*) as preguntas FROM preguntas");
$datos = $consulta->fetch_array();

if ($datos['preguntas']>=4) {

    echo '<script>alert("Solo puede haber 4 preguntas de sanidad")</script>';
    echo "<script>location.href='../preguntas.php'</script>";

} else {

    
    $pregunta = $_POST['pregunta'];
    $estado = $_POST['status'];
    $descripcion = $_POST['descripcion'];

    $insertar = $mysqli->query("INSERT INTO preguntas VALUES ('','$pregunta', '$estado', '$descripcion')");

    $insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Preguntas', 'Insert', '$fecha_hora')");

    echo '<script>alert("Pregunta dado de alta")</script>';
    echo "<script>location.href='../preguntas.php'</script>";

}
?>