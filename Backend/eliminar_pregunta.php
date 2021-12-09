<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];
$id = $_REQUEST['id'];

$consulta = $mysqli->query("SELECT COUNT(*) as preguntas FROM preguntas");
$datos = $consulta->fetch_array();

if ($datos['preguntas']>=4) {

    echo '<script>alert("Siempre debe haber 4 preguntas de sanidad")</script>';
    echo "<script>location.href='../preguntas.php'</script>";

}
else{
    
    $consulta="DELETE from preguntas where id_pregunta='$id'";
    $result=$mysqli->query($consulta);

    $insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Preguntas', 'Delete', '$fecha_hora')");

    echo '<script>alert("Registro eliminado con exito")</script>';
    echo "<script>location.href='../preguntas.php'</script>";
}

?>