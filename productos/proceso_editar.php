<?php
include '../conexion.php';
$id=$_REQUEST['id'];

extract($_POST);
var_dump($_POST);

$sql="UPDATE productos SET nombre='$nombre', precio='$precio', cantidad='$cantidad', id_rubro='$rubros', id_marca='$marcas' 
where id ='$id' ";
$resultado = mysqli_query($conexion,$sql);
if($resultado)
{
    HEADER ("LOCATION: mostrar.php");
}else{
    
        echo"alta incorrecta";
    }
?>