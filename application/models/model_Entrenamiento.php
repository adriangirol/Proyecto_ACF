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
    public function EntrenamientosPorEquipo($idEquipo){
        
        $query=$this->db->query("SELECT entrenamiento.Fecha_Entrenamiento FROM entrenamiento WHERE ID_equipo = '".$idEquipo."' ORDER BY Fecha_Entrenamiento ;");
         return $query->result_array();
        
    }
    public function EntrenamientosDelJugador($idJugador){
        $query=$this->db->query("SELECT entrenamiento.Fecha_Entrenamiento "
                                    . "FROM asistenciaentrenamiento, entrenamiento "
                                        . "WHERE asistenciaentrenamiento.Entrenamiento_ID_Entrenamiento=entrenamiento.ID_Entrenamiento "
                                            . "AND Jugador_ID_Jugador = '".$idJugador."' ORDER BY entrenamiento.Fecha_Entrenamiento ;");
         return $query->result_array();
    }

    

}
