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
    <table border="3" >
    <thead>
    <tr>
    <th colspan="1"><a href="formulario.php">Agregar Cliente</th>
    <th colspan="6">Listado de Clientes</th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>APELLIDO</td>
        <td>DNI</td>

        <td colspan="2">Operaciones</td>
        </tr>
        <?php
                include '../conexion.php';

                /* SELECT productos.nombre, productos.precio, productos.cantidad, marcas.nombre as marca, rubros.nombre as rubros
                    FROM `productos`inner join marcas on productos.id_marca = marcas.id, rubros on productos.id_rubro = rubros.id */ 

                $sql="select * from clientes";
                $resultado= mysqli_query($conexion,$sql);
                while( $row= mysqli_fetch_assoc($resultado) )
                {
        ?>

                    <tr>
                        <td> <?php echo $row['id'];   ?> </td>
                        <td> <?php echo $row['nombre'];       ?> </td>
                        <td> <?php echo $row['apellido'];     ?> </td>
                        <td> <?php echo $row['dni'];        ?> </td>
     
                        <td> <a href="editar.php?id=<?php echo $row['id'];?>"> EDITAR </a></td>
                        <td> <a href="borrar.php?id=<?php echo $row['id'];?>"> BORRAR </a></td>
                    </tr>
        <?php   }        ?>
    </tbody>
    </table>

    <br><br>
    <a href="../index.php?opcion=2">Volver</a>
</center>
</body>
</html>