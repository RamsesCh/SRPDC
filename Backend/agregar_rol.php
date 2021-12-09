<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];

$nombre_rol = $_POST['nombre_rol'];
$estado = $_POST['status'];
$observaciones = $_POST['observaciones'];
$modulo = $_POST['modulo'];

////Inserta a la tabla roles
$insertar = $mysqli->query("INSERT INTO roles VALUES ('', '$nombre_rol', '$estado', '$observaciones')");


//////////Consulta el rol insertado
$consulta = $mysqli->query("SELECT MAX(id_rol) AS id_rol FROM roles");
$datos=$consulta->fetch_array();
$id_rol=$datos['id_rol'];
////Recorre el array de modulo y lo inserta para sarle permisos
foreach($modulo as $valor => $id_modulo)
{   
    if ($id_modulo > 3) {
        $editar=$_POST['editar'.$id_modulo];
        $insertar = $mysqli->query("INSERT INTO rel_roles_modulos VALUES ('', '$id_rol', '$id_modulo', '$editar')");
    }
    else{
        $insertar = $mysqli->query("INSERT INTO rel_roles_modulos VALUES ('', '$id_rol', '$id_modulo', 1)");
    }
}

$insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Roles', 'Insert', '$fecha_hora')");

echo '<script>alert("Rol de usuario dado de alta")</script>';
echo "<script>location.href='../gestion_roles.php'</script>";
?>