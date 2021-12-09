<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];

$id_rol = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$status = $_POST['status'];
$observaciones = $_POST['observaciones'];
$modulo = $_POST['modulo'];

///Actualizar a la tabla roles
$update = $mysqli->query("UPDATE roles SET
	nombre_rol='$nombre_rol',	
    estado='$status',
    observaciones='$observaciones'
    where id_rol='$id_rol'");

//////////Elimina los registros de relación
$consulta = $mysqli->query("DELETE FROM rel_roles_modulos WHERE id_rol='$id_rol'");

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

$insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Roles', 'Update', '$fecha_hora')");

echo '<script>alert("Rol de usuario Actualizado")</script>';
echo "<script>location.href='../gestion_roles.php'</script>";


?>