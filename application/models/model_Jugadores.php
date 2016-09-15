<?php
/**
 * Modelo de nuestra tienda el cual interactuara con la base de datos
 * tienda_online , sera el encargado de todas las operaciones con ella.
 */
class model_Jugadores extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /**
     *
     * @return array de categorias, devuelve toda las categorias existentes
     */
    public function TraerJugadores(){
        $query = $this->db->query('SELECT * FROM Jugador ');
        return $query->result_array();
    }

    public function TraerDatoJugador($id){
      $query = $this->db->query('SELECT j.ID,j.Nombre, c.Nombre as Categoria, e.Equipo as Equipo FROM Jugador j,categoria c ,equipo e WHERE j.ID = "'.$id.'" AND c.ID = j.Categoria_ID AND e.Id_Equipo=j.Equipo_Id_Equipo;');
      return $query->result_array();
    }

    public function PosicionesJugador($id){
      $query = $this->db->query('SELECT p.Nombre as Posicion FROM Jugador j,posicion p, posicionesjugador pj WHERE j.ID = "'.$id.'" AND j.ID = pj.Jugador_ID AND pj.Posicion_ID = p.ID');
      return $query->result_array();
    }
    public function JugadoresPorEquipo($equipo){
      $query = $this->db->query('SELECT j.Nombre, j.ID FROM Jugador j WHERE Equipo_Id_Equipo="'.$equipo.'"');
      return $query->result_array();
    }

}
