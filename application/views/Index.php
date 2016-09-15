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
        </style>
    </head>
    <body>
        <div id="container">
            <h1>Gestión de Club la Amistad</h1>
            <div id="body">

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li>
                            <?php echo anchor('Jugadores/ListaJugadores', 'Jugadores'); ?>
                        </li>
                        <li>
                            <?php echo anchor('Equipos/ListaEquipos', 'Equipos'); ?>
                        </li>
                        <li>
                            <?php echo anchor('Entrenamiento/NuevoEntrenamiento/0', 'Nuevo Entrenamiento'); ?>
                        </li>

                    </ul>

                </div>
                <?php
                if (isset($cuerpo)) {
                    echo $cuerpo;
                } else {
                    echo "hola";
                }
                ?>


                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            </div>
        </div>
    </body>
    <script>
        function Detalle($controlador, $funcion, $id) {
            var URL = "http://localhost/Amistad/index.php/" + $controlador + "/" + $funcion + "/" + $id;
            window.open(URL, "_self");
        }
    </script>
</html>
