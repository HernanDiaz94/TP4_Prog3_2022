<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cargar Venta</title>
</head>
<body>
<center>
    <h2>Formulario de Ventas</h2>
    <form action=guardar_form.php method="post">
    
    <input type="date" name="fecha" placeholder="Fecha" value="" REQUIRED><br><br>
    <!-- <input type="number" name="precio" placeholder="Precio" value="" REQUIRED><br><br> 
    <input type="number" name="cantidad" placeholder="Cantidad" value="" REQUIRED><br><br> -->
    
    <!-- Producto -->
    <label for="productos"><p>Productos</p>
        <select name="productos" id="productos">
            
            <?php 
                include '../conexion.php';
                $consulta = "SELECT * from productos";
                $ejecutar = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
            ?>
            
            <?php foreach ($ejecutar as $opciones): ?>
                <option value="<?php echo $opciones['id']; ?>"> 
                    <?php 
                        echo $opciones['nombre'].' | Precio U. $'.$opciones['precio'].' | Stock:'. $opciones['cantidad']; 
                    ?> 
                </option>
            <?php endforeach ?>
        </select>
        
    </label><br>
    
    <input type="number" name="cantidadVenta" placeholder="Cantidad a comprar" value="" REQUIRED><br>

    <!-- Cliente -->
    <label for="clientes"><p>Clientes</p>
        <select name="clientes" id="clientes">
            
            <?php 
                
                $consulta = "SELECT * from clientes";
                $ejecutar = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
            ?>
            
            <?php foreach ($ejecutar as $opciones): ?>
                <option value="<?php echo $opciones['id']; ?>"> <?php echo $opciones['nombre'].' '.$opciones['apellido']; ?> </option>
                
            <?php endforeach ?>
        
        </select>
    </label><br><br>

    <input type="submit" name="enviar" value="aceptar"><br>
    
    </form>

    <br>
    <a href="../index.php?opcion=3">Volver</a>
    <!-- Voy a guardar_form.php -->
</center>
</body>
</html>