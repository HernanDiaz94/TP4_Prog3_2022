<!DOCTYPE html>
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
    <h2>Marcas</h2>

    <?php
        include '../conexion.php';
        $id=$_REQUEST['id'];
                $sql="select * from marcas where id='$id' ";
                $resultado= mysqli_query($conexion,$sql);
                $row= mysqli_fetch_assoc($resultado);
                
    ?>

    <form action="proceso_editar.php?id=<?php echo $row['id']; ?>" method="post">

    <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre'];?>" REQUIRED> <br><br>
   
    <input type="submit" name="enviar" value="aceptar"><br>
    </form>
</center>
</body>
</html>