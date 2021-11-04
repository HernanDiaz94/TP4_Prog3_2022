<?php
include '../conexion.php';
$id=$_REQUEST['id'];

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];


$sql="UPDATE clientes SET nombre='$nombre', apellido='$apellido', dni='$dni' 
where id ='$id' ";
$resultado = mysqli_query($conexion,$sql);
if($resultado)
{
    HEADER ("LOCATION: mostrar.php");
}else{
    
        echo"alta incorrecta";
    }
?>