<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function VerSeguimientoPorEquipo($idEquipo) {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('url');
            $this->load->model('model_Entrenamiento', 'entrenamiento');
            $this->load->model('model_Jugadores', 'jugadores');
            $this->load->model('model_Partido', "partido");
            $Jugadores = [];
            $fechaEntrenamientos = [];
            $fechaPartidos = [];
            $entrenamientos = $this->entrenamiento->EntrenamientosPorEquipo($idEquipo);
            $partidos = $this->partido->PartidosPorEquipo($idEquipo);
            foreach ($entrenamientos as $idx => $entrenamiento) {

                $fechaEntrenamientos[$idx] = $entrenamiento['Fecha_Entrenamiento'];
            }
            foreach ($partidos as $idx => $partido) {

                $fechaPartidos[$idx] = $partido['Fecha'];
            }

            $jugadores = $this->jugadores->JugadoresPorEquipo($idEquipo);

            foreach ($jugadores as $idx => $jugador) {

                $Jugadores[$idx]['Nombre'] = $jugador['Nombre'];
                $entrenamientosDelJugador = $this->entrenamiento->EntrenamientosDelJugador($jugador['ID']);
                $partidosDelJugador = $this->partido->PartidosDelJugador($jugador['ID']);
                foreach ($entrenamientosDelJugador as $idx2 => $entrenamientoJugador) {

                    $Jugadores[$idx]['Entrenamientos'][$idx2] = $entrenamientoJugador['Fecha_Entrenamiento'];
                }
                foreach ($partidosDelJugador as $idx2 => $partidoDelJugador) {

                    $Jugadores[$idx]['Partidos'][$idx2] = $partidoDelJugador['Fecha'];
                }
            }
//        echo "<pre>";
//        echo "Entrenamientos :";
//            print_r($fechaEntrenamientos);
//        echo "Jugadores :";
//            print_r($Jugadores);
//        echo "Partidos :";
//            print_r($partidos);
//        echo "</pre>";
            $cuerpo = $this->load->view('SeguimientoEquipo', Array('entrenamientos' => $fechaEntrenamientos, 'Jugadores' => $Jugadores, 'partidos' => $partidos), true);
            $this->load->view('Index', Array('cuerpo' => $cuerpo));
        } else {
            $this->load->view('errors/error_general', Array('heading' => "<h1> SIN PERMISOS</h1>", 'message' => '<p> Usted no posee permisos para accerder aqui.</p>'));
        }
    }

}
