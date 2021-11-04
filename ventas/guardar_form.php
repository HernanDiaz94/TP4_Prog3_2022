<?php
include '../conexion.php';
extract($_POST);
var_dump($_POST);
    $consulta = "SELECT * from productos";
    $ejecutar = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
        foreach ($ejecutar as $valores): 
            if($_POST['productos']==$valores['id']){ // productos es id de producto y valores id es de la consulta 
                if($_POST['cantidadVenta'] > $valores['cantidad'] ){
                    echo "La cantidad que quiere supera el stock disponible";
                    HEADER ("LOCATION: formulario.php");
                } else{
                    $PrecioTotal= $valores['precio'] * $_POST['cantidadVenta'];

                    $sql="INSERT INTO ventas (fecha,id_producto,id_cliente,precio,cantidad) 
                    VALUES('$fecha',$productos,$clientes,$PrecioTotal,$cantidadVenta)";
                    $resultado = mysqli_query($conexion,$sql);

                        if($resultado)
                        {       
                            $idProd=intval($valores['id']);
                            $stockActualizado= $valores['cantidad']-$cantidadVenta;
                            $sql="UPDATE productos 
                            SET cantidad='$stockActualizado' 
                            where id ='$idProd' ";
                            $resultado = mysqli_query($conexion,$sql);
                            if($resultado)
                            {
                                HEADER ("LOCATION: mostrar.php");
                            }else{
                                
                                    echo"actualizacion de stock incorrecta";
                                }
                        }else{
                                echo"alta incorrecta";
                                }
                    }
            }
        endforeach;

        

?>