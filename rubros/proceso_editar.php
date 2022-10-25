<?php
include '../conexion.php';
$id=$_REQUEST['id'];

$nombre=$_POST['nombre'];


$sql="UPDATE rubros SET nombre='$nombre'
where id ='$id' ";
$resultado = mysqli_query($conexion,$sql);
if($resultado)
{
    HEADER ("LOCATION: mostrar.php");
}else{
    
        echo "alta incorrecta";
    }
?>