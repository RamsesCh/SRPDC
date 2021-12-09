<?php 
session_start();
if ($_SESSION['matricula'])
{
	session_destroy();
	header("location:index.php");
}
else
{
	header("location:index.php");
	echo "La sesion no fue destruida";
}

?>