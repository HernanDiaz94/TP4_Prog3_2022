<?php
include '../conexion.php';


$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];



$sql="INSERT INTO clientes (nombre,apellido,dni) VALUES('$nombre','$apellido',$dni)";
$resultado = mysqli_query($conexion,$sql);

if($resultado)
{
    HEADER ("LOCATION: mostrar.php");
}else{
    
        echo"alta incorrecta";
        }
?>