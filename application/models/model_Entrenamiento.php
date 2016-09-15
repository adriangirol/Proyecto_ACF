<?php

/**
 * Modelo de nuestra tienda el cual interactuara con la base de datos
 * tienda_online , sera el encargado de todas las operaciones con ella.
 */
class model_Entrenamiento extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     *
     * @return array de categorias, devuelve toda las categorias existentes
     */
    public function NuevoEntrenamiento($datos) {

        $this->db->insert('entrenamiento', $datos);
        return $this->db->insert_id();
    }
    public function NuevoId(){
        $q=$this->db->query("SELECT COUNT(*)as total FROM entrenamiento");
        return $q->row()->total+1;
    }
    public function AsignarEntrenamientoAJugador($datos){
        
        $this->db->insert('asistenciaentrenamiento', $datos);
        return $this->db->insert_id();
    }
    

    

}
