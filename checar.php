<?php
require("conexion.php");
require("componentes/variables_session.php");

$datos= $_POST['respuesta'];
$dato = explode("||", $datos);
$dato4 = utf8_decode($dato[4]);
$dato2 = utf8_decode($dato[2]);
$temp = $_POST['Temp'];

if($dato[0]=="Estudiante")
{
    /////consulta si el qr ya fue escaneado
    $consulta = $mysqli->query("SELECT * FROM qr where fecha='$dato[7]' AND usuario='$dato[1]' AND estado = 1");
    if(mysqli_num_rows($consulta)==0)
    {
        echo 2;
    }
    else
    {
        if($dato[13]==0)
        {
            //////si el qr no es valido
            echo 3;
            $insertar = $mysqli->query("INSERT INTO historial_alumnos VALUES ('', '$dato[1]', '$dato2', '$dato[3]', '$dato4', '$dato[5]', '$dato[6]', '$dato[7].$dato[8]', '$fecha_hora', '$temp', '$dato[9]', '$dato[10]', '$dato[11]', '$dato[12]', 0)");
            //////CAMBIO DE STATUS DE QR A 0 PARA MATARLO Y NO PUEDA USARSE MAS
            $update = $mysqli->query("UPDATE qr SET
            estado=0
            where fecha='$dato[7]' AND usuario='$dato[1]'");
        }
        else
        {
            echo 1;
            //////Inesercion a la tabla de historial
            $insertar = $mysqli->query("INSERT INTO historial_alumnos VALUES ('', '$dato[1]', '$dato2', '$dato[3]', '$dato4', '$dato[5]', '$dato[6]', '$dato[7].$dato[8]', '$fecha_hora', '$temp', '$dato[9]', '$dato[10]', '$dato[11]', '$dato[12]', 1)");

            //////CAMBIO DE STATUS DE QR A 0 PARA MATARLO Y NO PUEDA USARSE MAS
            $update = $mysqli->query("UPDATE qr SET
            estado=0
            where fecha='$dato[7]' AND usuario='$dato[1]'");

        }
    }
    
}
else
{
    /////consulta si el qr ya fue escaneado
    $consulta = $mysqli->query("SELECT * FROM qr where fecha='$dato[2]' AND usuario='$dato[1]' AND estado = 1");
    if(mysqli_num_rows($consulta)==0)
    {
        echo 2;
    }
    else
    {
        if($dato[8]==0)
        {
            ////si el qr no es valido
            echo 3;
            //////Inesercion a la tabla de historial
            $insertar = $mysqli->query("INSERT INTO historial_users VALUES ('', '$dato[1]', '$dato[2].$dato[3].', '$fecha_hora', '$temp', '$dato[4]', '$dato[5]', '$dato[6]', '$dato[7]', 0)");

            //////CAMBIO DE STATUS DE QR A 0 PARA MATARLO Y NO PUEDA USARSE MAS
            $update = $mysqli->query("UPDATE qr SET
            estado=0
            where fecha='$dato[2]' AND usuario='$dato[1]'");
        }
        else
        {
            echo 1;
            //////Inesercion a la tabla de historial
            $insertar = $mysqli->query("INSERT INTO historial_users VALUES ('', '$dato[1]', '$dato[2].$dato[3].', '$fecha_hora', '$temp', '$dato[4]', '$dato[5]', '$dato[6]', '$dato[7]', 1)");

            //////CAMBIO DE STATUS DE QR A 0 PARA MATARLO Y NO PUEDA USARSE MAS
            $update = $mysqli->query("UPDATE qr SET
            estado=0
            where fecha='$dato[2]' AND usuario='$dato[1]'");
        }
    }
}
//echo "<script>console.log(".$id."')</script>";
?>