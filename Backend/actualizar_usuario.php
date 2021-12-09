<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];

$id_usuario = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$id_rol = $_POST['id_rol'];
$status = $_POST['status'];
$observaciones = $_POST['observaciones'];


$update = $mysqli->query("UPDATE usuarios SET
	nombre='$nombre',	
    telefono='$telefono',
    correo='$correo', 
    password='$password',
    id_rol='$id_rol',
    estado='$status',
    observaciones='$observaciones'
    where id_usuario='$id_usuario'");

$insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Usuarios', 'Update', '$fecha_hora')");

    echo '<script>alert("Usuario actualizado con exito")</script>';
    echo "<script>location.href='usuarios.php'</script>";

?>