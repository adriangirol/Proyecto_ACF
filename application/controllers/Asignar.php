<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar extends CI_Controller {

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
    public function Asignar() {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('model_Equipos', "equipos");
        $this->load->model('model_Jugadores', "jugadores");


        $this->form_validation->set_rules('check[]', 'check[]', 'required');
        $this->form_validation->set_rules('idEntrenamiento', 'idEntrenamiento', 'required');
        if ($this->form_validation->run() === FALSE) {
            $equipo = $this->session->flashdata('equipo');
            $fecha = $this->session->flashdata('fecha');
            $idEntrenamiento = $this->session->flashdata('idEntrenamiento');
            $misJugadores = $this->jugadores->JugadoresPorEquipo($equipo);
            $cuerpo = $this->load->view('AsignarJugadoresAlEntrenamiento', Array('misJugadores' => $misJugadores, 'fecha' => $fecha, 'idEvento' => $misJugadores), true);
            $this->load->view('Index', Array('cuerpo' => $cuerpo));
        } else {
            echo "salida";
            //Si la validación es correcta, cogemos los datos de la variable POST
            //y los enviamos al modelo
            $idJugadoresAsistentes = $this->input->post('check'); //this returns an array so use foreach to extract data
            $idEntrenamiento = $this->input->post("idEntrenamiento");
            foreach ($idJugadoresAsistentes as $key => $value) {
                $entrenamientoJugador['Entrenamiento_ID_Entrenamiento'] = $idEntrenamiento;
                $entrenamientoJugador['Jugador_ID_Jugador'] = $value;
                $this->entrenamiento->AsignarEntrenamientoAJugador($entrenamientoJugador);
                $jugadoresAsistentes[$value]=$this->jugadores->TraerDatosJugador($value);
            }
            print-r($jugadoresAsistentes);
            $cuerpo = $this->load->view('ResumenAsistencia', Array('misJugadores' => $jugadoresAsistentes, 'fecha' => $fecha), true);
            
            $this->load->view('Index', Array('cuerpo' => $cuerpo));
        }
    }

}
