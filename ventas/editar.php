<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Guardar</title>
</head>
<body>
<center>
    <h2>Formulario de Ventas</h2>

    <?php
        include '../conexion.php';
        $id=$_REQUEST['id'];
                $sql="select * from ventas where id='$id' ";
                $resultado= mysqli_query($conexion,$sql);
                $row= mysqli_fetch_assoc($resultado);
                
    ?>

    <form action="proceso_editar.php?id=<?php echo $row['id']; ?>" method="post">

    <input type="date" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha'];?>" REQUIRED> <br><br>
    <input type="number" name="precio" placeholder="Precio" value="<?php echo $row['precio'];?>" REQUIRED><br><br>
    <input type="number" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad'];?>" REQUIRED><br><br>
   
    <input type="submit" name="enviar" value="aceptar"><br>
    </form>
</center>
</body>
</html> -->