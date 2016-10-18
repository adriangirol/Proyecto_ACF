<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function ListaEquipos()
	{
        if ($this->session->userdata('logged_in')){
         
          $this->load->helper('url');
          $this->load->model('model_Equipos', "equipos");
          $misEquipos =  $this->equipos->TraerEquipos();
	  $cuerpo=$this->load->view('ListaEquipos',Array('misEquipos' => $misEquipos),true);
	  $this->load->view('Index',Array('cuerpo' => $cuerpo));   
        }
        else 
         {
             $this->load->view('errors/error_general', Array('heading' => "<h1> SIN PERMISOS</h1>", 'message' => '<p> Usted no posee permisos para accerder aqui.</p>'));
         }
	}

	public function DetalleEquipo($id)
	{
            if ($this->session->userdata('logged_in'))
                {
                    $this->load->helper('url');
                    $this->load->model('model_Equipos', "equipos");
                    $this->load->model('model_Jugadores', "jugadores");
                    $miEquipo =  $this->equipos->TraerJugadoresEquipo($id);
                    print_r($miEquipo);
                    foreach ($miEquipo as $idx=>$jugador){
                                    $miEquipo[$idx]['info']=$this->jugadores->PosicionesJugador($jugador['ID']);
                    }
                    $cuerpo=$this->load->view('DetalleEquipo',Array('miEquipo' => $miEquipo),true);
                    $this->load->view('Index',Array('cuerpo' => $cuerpo));
                }
            else 
                {
                 $this->load->view('errors/error_general', Array('heading' => "<h1> SIN PERMISOS</h1>", 'message' => '<p> Usted no posee permisos para accerder aqui.</p>'));
                }
	}
}
