<?php
require("../conexion.php");
require("../componentes/variables_session.php");
$id_user=$_SESSION['id_usuario'];

/////////Consulta que solo exista un aforo activo

    $semaforo = $_POST['semaforo'];
    $a_gral = $_POST['a_gral'];
    $a_admin = $_POST['a_admin'];
    $a_docentes = $_POST['a_docentes'];
    $a_estudiantes = $_POST['a_estudiantes'];
    $status = $_POST['status'];
    $observaciones = $_POST['observaciones'];

    if($status == 'Activado'){
        $consulta = $mysqli->query("SELECT * FROM aforo WHERE estado = 'Activado'");
        
        if (mysqli_num_rows($consulta) >= 1) {
            echo '<script>alert("Solo puede haber un aforo activo")</script>';
            echo "<script>location.href='../gestion_aforo.php'</script>";
        } else {
            $insertar = $mysqli->query("INSERT INTO aforo VALUES ('','$semaforo', '$a_gral', '$a_admin', '$a_docentes', '$a_estudiantes', '$status', '$observaciones')");

            $insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Aforo', 'Insert', '$fecha_hora')");

            echo '<script>alert("Aforo dado de alta")</script>';
            echo "<script>location.href='../gestion_aforo.php'</script>";
        }
           
    }
    else{

    $insertar = $mysqli->query("INSERT INTO aforo VALUES ('','$semaforo', '$a_gral', '$a_admin', '$a_docentes', '$a_estudiantes', '$status', '$observaciones')");

    $insertar = $mysqli->query("INSERT INTO tbl_log VALUES ('','$id_user', 'Aforo', 'Insert', '$fecha_hora')");

    echo '<script>alert("Aforo dado de alta")</script>';
    echo "<script>location.href='../gestion_aforo.php'</script>";

    }

?>