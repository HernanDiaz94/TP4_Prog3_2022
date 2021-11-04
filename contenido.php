<?php

switch( $opcion )
{

	case 1:
		include("productos/productos.php");
		break;
	case 2:
		include("clientes/clientes.php");
		break;
	case 3:
		include("ventas/ventas.php");
		break;
	case 4:
		include("rubros/rubros.php");
		break;
	case 5:
		include("marcas/marcas.php");
		break;

		default: include("productos/productos.php");
	
}	

?>
