<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cargar productos</title>
</head>
<body>
<center>

    <h2>Formulario de Productos</h2>
    <form action=guardar_form.php method="post">
    
    <input type="text" name="nombre" placeholder="Nombre Producto" value="" REQUIRED> <br><br>
    <input type="number" name="precio" placeholder="Precio" value="" REQUIRED><br><br>
    <input type="number" name="cantidad" placeholder="Cantidad" value="" REQUIRED><br><br>
    
    <!-- RUBRO -->
    <label for="rubros"><p>Rubro</p>
        <select name="rubros" id="rubros">
            
            <?php 
                
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
                include '../conexion.php';
                $consulta = "SELECT * from marcas";
                $ejecutar = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
            ?>
            
            <?php foreach ($ejecutar as $opciones): ?>
                <option value="<?php echo $opciones['id']; ?>"> <?php echo $opciones['nombre']; ?> </option>
            <?php endforeach ?>
        
        </select>
    </label><br><br>
    
    <input type="submit" name="enviar" value="aceptar"><br><br>
    
    </form>

    <br><br>
    <a href="../index.php?opcion=1">Volver</a>

    <!-- Voy a guardar_form.php -->
</center>
</body>
</html>