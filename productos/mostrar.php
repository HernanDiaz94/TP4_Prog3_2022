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
    <table border="3">
    <thead>
    <tr>
    <th colspan="1"><a href="formulario.php">Agregar Producto</th>
    <th colspan="6">Lista Productos</th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>PRECIO</td>
        <td>CANTIDAD</td>
        <td>MARCA</td>
        <td>RUBRO</td>

        <td colspan="2">Operaciones</td>
        </tr>
        <?php
                include '../conexion.php';

                /* SELECT productos.nombre, productos.precio, productos.cantidad, marcas.nombre as marca, rubros.nombre as rubros
                    FROM `productos`inner join marcas on productos.id_marca = marcas.id, rubros on productos.id_rubro = rubros.id */ 
                    
                // Las tablas estan bien, aca se relacionan productos, marcas y rubros. Traemos todo lo de productos, el nombre de la marca y el nombre del rubro, y le damos nuevos nombres a estos ultimos
                // campos
                $sql = '
                    select productos.*, marcas.nombre as marca, rubros.nombre as rubro from productos
                    inner join marcas on (productos.id_marca = marcas.id)
                    inner join rubros on (productos.id_rubro = rubros.id)
                ';
                //$sql="select * from productos";
                $resultado= mysqli_query($conexion,$sql);

                //var_dump($resultado);
                while( $row= mysqli_fetch_assoc($resultado) )
                {
                    //var_dump($row);
                    //continue;
        ?>

                    <tr>
                        <td> <?php echo $row['id'];   ?> </td>
                        <td> <?php echo $row['nombre'];       ?> </td>
                        <td> <?php echo $row['precio'];     ?> </td>
                        <td> <?php echo $row['cantidad'];        ?> </td>
                        <td> <?php echo $row['marca'];        ?> </td>
                        <td> <?php echo $row['rubro'];        ?> </td>
     
                        <td> <a href="editar.php?id=<?php echo $row['id'];?>"> EDITAR </a></td>
                        <td> <a href="borrar.php?id=<?php echo $row['id'];?>"> BORRAR </a></td>
                    </tr>
        <?php   }        ?>
    </tbody>
    </table>

    <br>
    <?php include 'funcionMarca.php'; ?>
    <form action="mostrarFiltrado.php" method="get"><br>
        <input type="hidden" name="opcion" value="1">
        <label for="">Mostrar productos de esta marca</label>
        <?= crearCampoMarca(); ?>
        <button type="submit">Filtrar</button>
    </form>
    <br>
    <a href="../index.php?opcion=1">Volver</a>
</center>
</body>
</html>
