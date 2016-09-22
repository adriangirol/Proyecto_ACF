<?php

/**
 * Modelo de nuestra tienda el cual interactuara con la base de datos
 * tienda_online , sera el encargado de todas las operaciones con ella.
 */
class model_Partido extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     *
     * @return array de categorias, devuelve toda las categorias existentes
     */
    public function NuevoPartido($datos) {

        $this->db->insert('partido', $datos);
        return $this->db->insert_id();
    }
    public function NuevoId(){
        $q=$this->db->query("SELECT COUNT(*)as total FROM partido");
        return $q->row()->total+1;
    }
    public function AsignarPartidoAJugador($datos){
        
        $this->db->insert('jugadorpartido', $datos);
        return $this->db->insert_id();
    }
     public function PartidosPorEquipo($idEquipo){
        
        $query=$this->db->query("SELECT partido.Fecha,partido.Rival,partido.Ida FROM partido WHERE Equipo_ID_equipo = '".$idEquipo."' ORDER BY Fecha ;");
         return $query->result_array();
        
    }
     public function PartidosDelJugador($idJugador){
        $query=$this->db->query("SELECT partido.Fecha "
                                    . "FROM jugadorpartido, partido "
                                        . "WHERE jugadorpartido.Partido_ID=partido.ID "
                                            . "AND Jugador_ID = '".$idJugador."' ORDER BY partido.Fecha ;");
         return $query->result_array();
    }
    

    

}
