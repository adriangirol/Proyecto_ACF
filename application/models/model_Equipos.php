<?php
/**
 * Modelo de nuestra tienda el cual interactuara con la base de datos
 * tienda_online , sera el encargado de todas las operaciones con ella.
 */
class model_Equipos extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /**
     *
     * @return array de categorias, devuelve toda las categorias existentes
     */
    public function TraerEquipos(){
        $query = $this->db->query('SELECT * FROM Equipo ');
        return $query->result_array();
    }

    public function TraerJugadoresEquipo($id){
      $query = $this->db->query('SELECT j.ID,j.Nombre FROM Jugador j ,equipo e WHERE j.Equipo_Id_Equipo = "'.$id.'" AND e.Id_Equipo=j.ID');
      return $query->result_array();
    }
    public function EquiposCombo() {
      // armamos la consulta
      $query = $this->db->query('SELECT Id_Equipo,Equipo FROM equipo ORDER BY Id_Equipo');

      // si hay resultados
      if ($query->num_rows() > 0) {
          // almacenamos en una matriz bidimensional
          foreach ($query->result() as $row)
              $arrDatos[htmlspecialchars($row->Id_Equipo, ENT_QUOTES)] = htmlspecialchars($row->Equipo, ENT_QUOTES);

          $query->free_result();
          return $arrDatos;
      }
  }
  public function EquipoPorId($id){
    $query = $this->db->query('SELECT Equipo FROM Equipo  WHERE Id_Equipo="'.$id.'"');
    return $query->row();
  }
}
