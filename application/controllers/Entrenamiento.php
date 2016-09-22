<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entrenamiento extends CI_Controller {

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
    public function NuevoEntrenamiento($equipo) {
        //$this->Autenticacion();
        $this->load->helper('url');
        $this->load->model('model_Entrenamiento', "entrenamiento");
        $this->load->model('model_Equipos', "equipos");
        $this->load->model('model_Jugadores', "jugadores");
        $this->load->library('form_validation');
        $this->load->helper('form');
        $idNuevoEntrenamiento="";
        //Entrada por Nuevo Entrenamiento
        if ($equipo == 0) {
            $this->form_validation->set_rules('fecha', 'fecha', 'required');

            if ($this->form_validation->run() === FALSE) {

                $datos['equipos'] = $this->equipos->EquiposCombo();
                $cuerpo = $this->load->view('NuevoEntrenamientoCompleto', $datos, true);
                $this->load->view('Index', Array('cuerpo' => $cuerpo));
            } else {
                //Si la validación es correcta, cogemos los datos de la variable POST
                //y los enviamos al modelo
                $equipo = $this->input->post('idEquipo');
                $fecha = $this->input->post('fecha');
                $miEntreno['ID_Entrenamiento'] = $this->entrenamiento->NuevoId();
                $miEntreno['Fecha_Entrenamiento'] = $fecha = $this->input->post('fecha');
                $miEntreno['ID_equipo'] = $equipo;
                $idNuevoEntrenamiento = $miEntreno['ID_Entrenamiento'];
                $this->entrenamiento->NuevoEntrenamiento($miEntreno);
            }
            //Entrada por Equipos
        } else {
            $this->form_validation->set_rules('fecha', 'fecha', 'required');
            if ($this->form_validation->run() === FALSE) {
                $datos["equipo"] = $this->equipos->EquipoPorId($equipo)->Equipo;
                $datos['idequipo'] = $equipo;
                $cuerpo = $this->load->view('NuevoEntrenamiento', $datos, true);
                $this->load->view('Index', Array('cuerpo' => $cuerpo));
            } else {
                //Si la validación es correcta, cogemos los datos de la variable POST
                //y los enviamos al modelo
                $miEntreno['ID_Entrenamiento'] = $this->entrenamiento->NuevoId();
                $miEntreno['Fecha_Entrenamiento'] = $fecha = $this->input->post('fecha');
                $miEntreno['ID_equipo'] = $equipo = $this->input->post('idEquipo');
                $idNuevoEntrenamiento = $miEntreno['ID_Entrenamiento'];
                $this->entrenamiento->NuevoEntrenamiento($miEntreno);
                
            }
        }
        if($idNuevoEntrenamiento!=""){
        $this->session->set_flashdata('equipo', $equipo);
        $this->session->set_flashdata('fecha', $fecha);
        $this->session->set_flashdata('idEntrenamiento', $idNuevoEntrenamiento);
        redirect("/Asignar/AsignarEntrenamiento/", location, 301);
        }
    }

    public function DetalleEquipo($id) {
        $this->load->helper('url');
        $this->load->model('model_Equipos', "equipos");
        $this->load->model('model_Jugadores', "jugadores");
        $miEquipo = $this->equipos->TraerJugadoresEquipo($id);
        print_r($miEquipo);
        foreach ($miEquipo as $idx => $jugador) {
            $miEquipo[$idx]['info'] = $this->jugadores->PosicionesJugador($jugador['ID']);
        }
        $cuerpo = $this->load->view('DetalleEquipo', Array('miEquipo' => $miEquipo), true);
        $this->load->view('Index', Array('cuerpo' => $cuerpo));
    }

}
