<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <title>SIS-REST - Reporte Pedidos</title>
        <link rel="stylesheet" type="text/css" href="../../../resources/css/los_patos.min.css" />
        <link rel="stylesheet" type="text/css" href="../../../resources/css/dashborad.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    </head>
    <body>
        <div data-role="page" id="reportePedidos" data-theme="a">
            <div data-role="header">
                <a href="../../home.php" data-icon="home">Home</a>
                <h1>Reporte Pedidos</h1>
            </div>
            <div data-role="content">
                <form id="frmReportePedidos" action="../../Controller/ReporteController.php?submit=Pedidos" method="POST" data-ajax="false">
                    <div data-role="fieldcontain">
                        <label for="dtFechaInicio">Fecha Inicio:</label>
                        <input type="date" name="fechaInicio" id="dtFechaInicio" value="" required />
                    </div>
                    <div data-role="fieldcontain">
                        <label for="dtFechaFin">Fecha Fin:</label>
                        <input type="date" name="fechaFin" id="dtFechaFin" value="" required />
                    </div>
                    <div data-role="fieldcontain">
                        <input type="submit" name="submit" value="Reportar" data-icon="search" />
                    </div>
                </form>
                <script type="text/javascript">
                   $("#frmReportePedidos").submit(function() {
                        var fechaInicio = $("#dtFechaInicio").val();
                        var fechaFin = $("#dtFechaFin").val();
                        if(fechaInicio > fechaFin) {
                            alert("La fecha Fin debe ser posterior");
                            return false;
                        }
                    });
                </script>
            </div>
            <div data-role="footer" data-fullscreen="true">
                <h4>Copyright SIS-REST &copy; 2014</h4>
            </div>
        </div>
    </body>
</html>