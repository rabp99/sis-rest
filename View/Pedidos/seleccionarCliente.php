<?php
    session_start();
    $submit = "index";
    require_once('../../Controller/RegistrarPedidoController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <title>SIS-REST - Seleccionar Cliente</title>
        <link rel="stylesheet" type="text/css" href="../../resources/css/los_patos.min.css" />
        <link rel="stylesheet" type="text/css" href="../../resources/css/dashborad.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    </head>
    <body>
        <div data-role="page" id="seleccionarCliente" data-theme="a">
            <div data-role="header">
                <a href="../../home.php" data-icon="home">Home</a>
                <h1>Seleccionar Cliente</h1>
            </div>
            <div data-role="content">
                <ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Buscar">
                    <?php
                    if(!is_array($clientes)) {
                        echo "Ningún cliente registrado en el sistema";
                    }
                    else {
                        foreach ($clientes as $cliente) {
                    ?>
                    <li>
                        <a href="seleccionarProducto.php?idCliente=<?php echo $cliente["idCliente"]; ?>" data-ajax="false"><?php echo $cliente["nombreCompleto"]; ?></a>
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <a href="../Mantenimiento/Cliente/RegistroCliente.php?accion=nuevo"><button>Nuevo Cliente</button></a>
            </div>
            <div data-role="footer" data-fullscreen="true">
                <h4>Copyright SIS-REST &copy; 2014</h4>
            </div>
        </div>
    </body>
</html>