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
    include 'funcionMarca.php';

      // Preguntamos si se pudo conectar a la base de datos
      if (!$conexion) {        
        // Si la conexion se pudo realizar, podemos seguir trabajando
        echo 'Error de conexion con la base de datos';
        exit();
    }
?>
  
<?php

    if (!isset($_REQUEST['id_marca']) || $_REQUEST['id_marca'] == 0) {
        $buscado = '';
    } else {
        $marcaBuscada = $_REQUEST['id_marca'];
        $filtro = "productos.id_marca = $marcaBuscada"; //and 
    }
    

    // Consultamos todos los usuarios con estado = 1 (usuarios no borrados)
        $comando = "select productos.*, marcas.nombre as marca from productos 
        inner join marcas on (productos.id_marca = marcas.id) where $filtro"; //estado = 1
        $datos = mysqli_query($conexion, $comando);
        
        // Preguntamos si se pudo realizar la consulta
        if ($datos) {

            // Si se pudo hacer la consulta, construimos una tabla html para mostrar los datos
            echo '<table border="1">';
            echo '
                <tr> 
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Marca</th>
                </tr>
            ';
            
            // Para cada registro obtenido de la tabla de usuarios, creamos una fila en la tabla html
            while ($productosDeMarca = mysqli_fetch_assoc($datos)) {

                extract($productosDeMarca); // $id, $nombre, $precio y $cantidad

                echo "
                    <tr>
                        <td>$nombre</td>
                        <td>$precio</td>
                        <td>$cantidad</td>
                        <td>$marca</td>
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


