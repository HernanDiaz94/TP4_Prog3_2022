<?php
    ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mostrar</title>
</head>
<body>
<center>

<?php 
    include '../conexion.php';
    include 'funcionFechaVenta.php';

      // Preguntamos si se pudo conectar a la base de datos
      if (!$conexion) {        
        // Si la conexion se pudo realizar, podemos seguir trabajando
        echo 'Error de conexion con la base de datos';
        exit();
    }
?>
  
<?php

    if (!isset($_REQUEST['id_venta']) || $_REQUEST['id_venta'] == 0) {
        $buscado = '';
    } else {
        $ventaBuscada = $_REQUEST['id_venta'];
        $filtro = "ventas.id = $ventaBuscada"; //and 
    }
    
        $comando = "select ventas.*, productos.nombre as producto, clientes.nombre as clienteN, clientes.apellido as clienteA 
        from ventas
        inner join productos on (ventas.id_producto = productos.id)
        inner join clientes on (ventas.id_cliente = clientes.id) 
        where $filtro"; 
        $datos = mysqli_query($conexion, $comando);
        
        // Preguntamos si se pudo realizar la consulta
        if ($datos) {

            // Si se pudo hacer la consulta, construimos una tabla html para mostrar los datos
            echo '<table border="1">';
            echo '
                <tr> 
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                </tr>
            ';
            
            // Para cada registro obtenido de la tabla de usuarios, creamos una fila en la tabla html
            while ($ventasDeFecha = mysqli_fetch_assoc($datos)) {

                extract($ventasDeFecha); // $id, $fecha, $precio, $cantidad, $producto, $clienteN, $clienteA
                echo "
                    <tr>
                        <td>$fecha</td>
                        <td>$precio</td>
                        <td>$cantidad</td>
                        <td>$producto</td>
                        <td>$clienteN $clienteA</td>
                    </tr>
                ";
                    
            }
            echo '</table>';

            mysqli_free_result($datos);
            mysqli_close($conexion);

        } else {
            echo 'Error accediendo a los datos.';
        }


            /* SELECT productos.nombre, productos.precio, productos.cantidad, marcas.nombre as marca, rubros.nombre as rubros
                FROM `productos`inner join marcas on productos.id_marca = marcas.id, rubros on productos.id_rubro = rubros.id */ 
                
            
?>

    <br><br>
    <a href="../index.php?opcion=1">Volver</a>
</center>
</body>
</html>


