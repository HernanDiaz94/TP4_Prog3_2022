<?php
include '../conexion.php';


$nombre=$_POST['nombre'];


$sql="INSERT INTO rubros (nombre) VALUES('$nombre')";
$resultado = mysqli_query($conexion,$sql);

if($resultado)
{
    HEADER ("LOCATION: mostrar.php");
}else{
    
        echo"alta incorrecta";
        }
?>