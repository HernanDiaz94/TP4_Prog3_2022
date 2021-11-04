<?php
include '../conexion.php';

extract($_POST);


$sql="INSERT INTO productos(nombre,precio,cantidad,id_marca,id_rubro) VALUES('$nombre',$precio,$cantidad,'$marcas','$rubros')";
$resultado = mysqli_query($conexion,$sql);

if($resultado)
{   
    HEADER ("LOCATION: mostrar.php");
}else{
    
        echo"alta incorrecta";
        }
?>