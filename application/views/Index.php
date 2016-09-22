<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

        <!-- Tema opcional -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

        <!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <title>Club Amistad</title>

        <style type="text/css">


            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            #exTab1 .tab-content {
                color : white;
                background-color: #428bca;
                padding : 5px 15px;
            }

            #exTab2 h3 {
                color : white;
                background-color: #428bca;
                padding : 5px 15px;
            }

            /* remove border radius for the tab */

            #exTab1 .nav-pills > li > a {
                border-radius: 0;
            }

            /* change border radius for the tab , apply corners on top*/

            #exTab3 .nav-pills > li > a {
                border-radius: 4px 4px 0 0 ;
            }

            #exTab3 .tab-content {
                color : white;
                background-color: #428bca;
                padding : 5px 15px;
            }
            .tabla{
                display: table;
                border: 3px solid #49ACE5;
                width: 720px;
                text-align: center;
                font-size: 45px;
                font-family: LuckiestGuy;
                color: #143040;
            }

            .fila{
                border: 3px solid #49ACE5;
                display: table-row;
                min-height: 72px;
                max-height: 72px;
            }

            .celda{
                display: table-cell;
                border: 3px solid #49ACE5;
                min-width: 72px;
                max-width: 72px;
                cursor:hand;
            }

            .equiporojo{
                min-height: 72px;
                max-height: 72px;
                background-image: url("<?php base_url()?>/asset/img/Rojo.jpg");
                /*background-color: red;*/
                background-repeat: no-repeat;
                background-position: center;
                cursor: hand;
            }

            .equipoverde{	
                min-height: 72px;
                max-height: 72px;
                background-image: url("<?php base_url()?>/asset/img/verde.jpg");
                /*                background-color: green;*/
                background-repeat: no-repeat;
                background-position: center;
                cursor:hand;
            }

            .vacio {
                min-height: 72px;
                max-height: 72px;
                /*background-image: url(".<?php base_url()?>/asset/img/verde.jpg");*/
                background-color: white;
                background-repeat: no-repeat;
                background-position: center; 
                cursor:hand;
                color: white;
            }





        </style>
    </head>
    <body>

        <div id="container">
            <h1>Gestión de Club la Amistad</h1>
            <div id="body">
                <div class="btn-group">
                    <?php echo anchor('Jugadores/ListaJugadores', 'Jugadores', array('class' => 'btn btn-default')); ?>
                    <?php echo anchor('Equipos/ListaEquipos', 'Equipos', array('class' => 'btn btn-default')); ?>
                    <?php echo anchor('Entrenamiento/NuevoEntrenamiento/0', 'Nuevo Entrenamiento', array('class' => 'btn btn-default')); ?>
                    <?php //echo anchor('Estrategia/Campo/', 'Estrategias', array('class' => 'btn btn-default')); ?>
                </div>
                <br>
                <br>
                <?php
                if (isset($cuerpo)) {
                    echo $cuerpo;
                } else {
                    echo "hola";
                }
                ?>


                <p class="footer"><strong>
                        <?php
                        $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        echo $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
                        ?>
                    </strong> </p>
            </div>
        </div>
    </body>
    <script>
        function Detalle($controlador, $funcion, $id) {
            var URL = "http://localhost/Amistad/index.php/" + $controlador + "/" + $funcion + "/" + $id;
            window.open(URL, "_self");
        }

        function TacharCelda(idx) {

            //Añade el # al id
            var id = "";
            if (idx.toString().length == 2)
                id = "#" + idx.toString();
            else if (idx.toString().length == 1)//Cuando es 1, 2, 3...
                id = "#0" + idx.toString();


           if ($(id).hasClass('vacio')) {
                $(id).removeClass('vacio');
                $(id).addClass('equipoverde');
            } else if ($(id).hasClass('equipoverde')) {
                $(id).removeClass("equipoverde");
                $(id).addClass('equiporojo');

            } else if ($(id).hasClass('equiporojo')) {
                $(id).addClass('vacio');
                 
            }

        }

        
    </script>
</script>
</html>
