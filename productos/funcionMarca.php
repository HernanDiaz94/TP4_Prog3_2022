<?php

function crearCampoMarca($id_marca = 0)
{

    global $conexion;

    $marcas = mysqli_query($conexion, 'select * from marcas');
    if (!$marcas) {
        echo 'No se puede mostrar esta pagina';
        exit();
    }

    echo '<select name="id_marca">';
    echo '<option value="0"></option>';
    while ($m = mysqli_fetch_assoc($marcas)) {
        extract($m); // $id, $nombre
        if ($id == $id_marca) {
            $elegido = 'selected';
        } else {
            $elegido = '';
        }
        echo "<option value='$id' $elegido>$nombre</option>";
    }
    echo '</select>';
}

?>