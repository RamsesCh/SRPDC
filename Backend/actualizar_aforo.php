<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];


$id_aforo = $_POST['id_aforo'];
$semaforo = $_POST['semaforo'];
$a_gral = $_POST['a_gral'];
$a_admin = $_POST['a_admin'];
$a_docentes = $_POST['a_docentes'];
$a_estudiantes = $_POST['a_estudiantes'];
$status = $_POST['status'];
$observaciones = $_POST['observaciones'];

if ($status == 'Activado') {
    $consulta = $mysqli->query("SELECT * FROM aforo WHERE estado = 'Activado'");
    if (mysqli_num_rows($consulta) >= 1) {
        echo '<script>alert("Solo puede haber un aforo activo")</script>';
        echo "<script>location.href='../gestion_aforo.php'</script>";
    } else {
    
    $insertar = $mysqli->query("UPDATE aforo SET
	semaforo='$semaforo',
	a_general='$a_gral',
    a_administrativo='$a_admin',
    a_docentes='$a_docentes',
    a_estudiantes='$a_estudiantes',
    estado='$status',
    observaciones='$observaciones'
    where id_aforo='$id_aforo'");

    $insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Aforo', 'update', '$fecha_hora')");

    echo '<script>alert("Datos actualizados con exito")</script>';
    echo "<script>location.href='../gestion_aforo.php'</script>";
    }
    
} else {

    $insertar = $mysqli->query("UPDATE aforo SET
	semaforo='$semaforo',
	a_general='$a_gral',
    a_administrativo='$a_admin',
    a_docentes='$a_docentes',
    a_estudiantes='$a_estudiantes',
    estado='$status',
    observaciones='$observaciones'
    where id_aforo='$id_aforo'");

    $insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Aforo', 'update', '$fecha_hora')");

    echo '<script>alert("Datos actualizados con exito")</script>';
    echo "<script>location.href='../gestion_aforo.php'</script>";
}




?>