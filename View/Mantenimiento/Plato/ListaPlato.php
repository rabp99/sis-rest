<?php
    $submit = "lista";
    require_once('../../../Controller/MantenimientoPlatoController.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <title>SIS-REST - Lista Platos</title>
        <link rel="stylesheet" type="text/css" href="../../../resources/css/los_patos.min.css" />
        <link rel="stylesheet" type="text/css" href="../../../resources/css/dashborad.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
        <?php if(isset($_GET["rpta"])) { ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $.mobile.changePage( "#dialogo", { role: "dialog" } );
            });
        </script>
        <?php }?>
    </head>
    <body>
        <div data-role="page" id="listaPlatos" data-theme="a">
            <div data-role="header">
                <a href="../../../home.php" data-icon="home">Home</a>
                <h1>Lista Platos</h1>
            </div>
            <div data-role="content">
                <table data-role="table" class="ui-responsive" data-split-icon="delete">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!is_array($platos)) {
                            echo "<td colspan='3'><center>No hay registrado ningún Plato</center></td></tr>";
                        }
                        else {
                            foreach ($platos as $plato) {
                        ?>
                        <tr>
                            <td><?php echo $plato["idPlato"]; ?></td>
                            <td><a href="RegistroPlato.php?idPlato=<?php echo $plato["idPlato"]; ?>"><?php echo $plato["descripcion"]; ?></a></td>
                            <td><?php echo $plato["precio"]; ?></td>
                            <td><a href="../../../Controller/MantenimientoPlatoController.php?submit=Eliminar&idPlato=<?php echo $plato["idPlato"]; ?>" data-role="button" data-icon="delete" data-iconpos="notext" data-ajax="false">Delete</a></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <a href="RegistroPlato.php?accion=nuevo"><button>Nuevo Plato</button></a>
            </div>
            <div data-role="footer" data-fullscreen="true">
                <h4>Copyright SIS-REST &copy; 2014</h4>
            </div>
        </div>
                
        <div data-role="dialog" id="dialogo">
            <div data-role="header">
                <h1>Mensaje</h1>
            </div>
            <div data-role="content">
                <?php if($_GET["mensaje"] == "nuevo") { ?>
                    <?php if($_GET["rpta"] == "correcto") {?>
                    <p>Plato Registrado correctamente</p>
                    <p>Código Plato: <?php echo $_GET["id"]; ?></p>
                    <?php }?>
                    <?php if($_GET["rpta"] == "incorrecto") {?>
                    <p>No fue posible registrar el plato. Verifique el tamaño del archivo</p>
                    <?php } ?>
                <?php } ?>
                
                <?php if($_GET["mensaje"] == "editar") { ?>
                    <?php if($_GET["rpta"] == "correcto") {?>
                    <p>Plato Modificado correctamente</p>
                    <p>Código Plato: <?php echo $_GET["id"]; ?></p>
                    <?php }?>
                    <?php if($_GET["rpta"] == "incorrecto") {?>
                    <p>No fue posible modificar el plato. Verifique el tamaño del archivo</p>
                    <p>Código Plato: <?php echo $_GET["id"]; ?></p>
                    <?php } ?>
                <?php } ?>
                
                <?php if($_GET["mensaje"] == "eliminar") { ?>
                    <?php if($_GET["rpta"] == "correcto") {?>
                    <p>Plato Eliminado correctamente</p>
                    <p>Código Plato: <?php echo $_GET["id"]; ?></p>
                    <?php }?>
                    <?php if($_GET["rpta"] == "incorrecto") {?>
                    <p>No fue posible eliminar el plato</p>
                    <p>Código Plato: <?php echo $_GET["id"]; ?></p>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>​
    </body>
</html>