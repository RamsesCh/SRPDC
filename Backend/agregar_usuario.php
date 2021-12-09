<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$id_rol = $_POST['id_rol'];
$observaciones = $_POST['observaciones'];
$status = $_POST['status'];

$consulta = $mysqli->query("SELECT * FROM usuarios WHERE correo = '$correo'");
$result= mysqli_num_rows($consulta);

if($result <= 0)
{
    $insertar = $mysqli->query("INSERT INTO usuarios VALUES ('', '$nombre', '$telefono', '$correo', '$password', '$id_rol', '$status', '$observaciones')");
    echo "<script>location.href='usuarios.php'</script>";
    echo '<script>alert("Usuario dado de alta")</script>';
    
$insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Usuarios', 'Insert', '$fecha_hora')");
}
else
{
    echo '<script>alert("Este correo ya existe, Por favor usa otro correo.")</script>';
}

?>