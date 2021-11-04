<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cargar Clientes</title>
</head>
<body>
<center>
    <h2>Formulario de Clientes</h2>
    <form action=guardar_form.php method="post">
    
    <input type="text" name="nombre" placeholder="Nombre" value="" REQUIRED> <br><br>
    <input type="text" name="apellido" placeholder="Apellido" value="" REQUIRED><br><br>
    <input type="number" name="dni" placeholder="DNI" value="" REQUIRED><br><br>
    
    
    <input type="submit" name="enviar" value="aceptar"><br>
    
    </form>
    <br><br>
    <a href="../index.php?opcion=2">Volver</a>
    <!-- Voy a guardar_form.php -->
</center>
</body>
</html>