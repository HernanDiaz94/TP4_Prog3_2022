<?php
include '../conexion.php';
$id=$_REQUEST['id'];


$sql="DELETE FROM productos where id='$id' ";
$resultado = mysqli_query($conexion,$sql);
if($resultado)
{
    HEADER ("LOCATION: mostrar.php");
}else{
    
        echo"alta incorrecta";
    }
?>