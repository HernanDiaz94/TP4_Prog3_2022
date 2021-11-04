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
    <h2>Formulario de productos</h2>

    <?php
        include '../conexion.php';
        $id=$_REQUEST['id'];
                $sql="select * from productos where id='$id' ";
                $resultado= mysqli_query($conexion,$sql);
                $row= mysqli_fetch_assoc($resultado);
                
    ?>

    <form action="proceso_editar.php?id=<?php echo $row['id']; ?>" method="post">

    <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre'];?>" REQUIRED> <br><br>
    <input type="number" name="precio" placeholder="Precio" value="<?php echo $row['precio'];?>" REQUIRED><br><br>
    <input type="number" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad'];?>" REQUIRED><br><br>
    <!-- RUBRO -->
    <label for="rubros"><p>Rubro</p>
        <select name="rubros" id="rubros">
            
            <?php 
                include '../conexion.php';
                $consulta = "SELECT * from rubros";
                $ejecutar = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
            ?>
            
            <?php foreach ($ejecutar as $opciones): ?>
                <option value="<?php echo $opciones['id']; ?>"> <?php echo $opciones['nombre']; ?> </option>
            <?php endforeach ?>
        
        </select>
    </label><br><br>

    <!-- MARCA -->
    <label for="marcas"><p>Marca</p>
        <select name="marcas" id="marcas">
            
            <?php 
                include 'conexion.php';
                $consulta = "SELECT * from marcas";
                $ejecutar = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
            ?>
            
            <?php foreach ($ejecutar as $opciones): ?>
                <option value="<?php echo $opciones['id']; ?>"> <?php echo $opciones['nombre']; ?> </option>
            <?php endforeach ?>
        
        </select>
    </label><br><br>
   
    <input type="submit" name="enviar" value="aceptar"><br>
    </form>
</center>
</body>
</html>