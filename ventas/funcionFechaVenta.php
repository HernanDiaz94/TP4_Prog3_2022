<?php

function crearCampoFechaVenta($id_venta = 0)
{

    global $conexion;

    $ventas = mysqli_query($conexion, 'select * from ventas');
    if (!$ventas) {
        echo 'No se puede mostrar esta pagina';
        exit();
    }

    echo '<select name="id_venta">';
    echo '<option value="0"></option>';
    while ($v = mysqli_fetch_assoc($ventas)) {
        extract($v); // $id, $fecha,$id_producto,$id_cliente,$precio,$cantidad
        if ($id == $id_venta) {
            $elegido = 'selected';
        } else {
            $elegido = '';
        }
        echo "<option value='$id' $elegido>$fecha</option>";
    }
    echo '</select>';
}

?>