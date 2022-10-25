

<?php

$opcion = 0;
if( isset($_GET['opcion']))
{
	$opcion = $_GET['opcion'];	
}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/logo.png">
  <title>TP4_2022</title>
  <?php // include("estilo.php"); ?>
</head>
<body>
<div id="contenedor">
 
  <?php
    include("cabecera.php");
    include("menu.php");
    include("contenido.php");
    include("pie.php");
   ?>
  
  </div>
</body>
</html>