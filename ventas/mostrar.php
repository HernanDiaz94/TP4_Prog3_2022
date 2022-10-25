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
    <th colspan="1"><a href="formulario.php">Agregar Venta</th>
    <th colspan="6">Lista Venta</th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <td>ID</td>
        <td>FECHA</td>
        <td>PRECIO</td>
        <td>CANTIDAD</td>
        <td>PRODUCTO</td>
        <td>CLIENTE</td>

        <td colspan="2">Operaciones</td>
        </tr>
        <?php
                include '../conexion.php';

                // $sql="select * from ventas";

                $sql = '
                select ventas.*, productos.nombre as producto, clientes.nombre as clienteN, clientes.apellido as clienteA 
                from ventas
                inner join productos on (ventas.id_producto = productos.id)
                inner join clientes on (ventas.id_cliente = clientes.id)
            ';
                $resultado= mysqli_query($conexion,$sql);
                while( $row= mysqli_fetch_assoc($resultado) )
                {
        ?>

                    <tr>
                        <td> <?php echo $row['id'];   ?> </td>
                        <td> <?php echo $row['fecha'];       ?> </td>
                        <td> <?php echo $row['precio'];     ?> </td>
                        <td> <?php echo $row['cantidad'];        ?> </td>
                        <td> <?php echo $row['producto'];        ?> </td>
                        <td> <?php echo $row['clienteN'].' '.$row['clienteA'];        ?> </td>
     
                        <!-- <td> <a href="editar.php?id=<?php echo $row['id'];?>"> EDITAR </a></td> -->
                        <td> <a href="borrar.php?id=<?php echo $row['id'];?>"> BORRAR </a></td>
                    </tr>
        <?php   }        ?>
    </tbody>
    </table>
    <br>
    <br>
    <?php include 'funcionFechaVenta.php'; ?>
    <form action="mostrarFiltrado.php" method="get"><br>
        <input type="hidden" name="opcion" value="1">
        <label for="">Mostrar ventas en la fecha: </label>
        <?= crearCampoFechaVenta(); ?>
        <button type="submit">Filtrar</button>
    </form>
    <br>
    <a href="../index.php?opcion=1">Volver</a>
</center>
</body>
</html>