<?php 
    class Persona extends CI_Model {
        private $tabla = 'personas';
        
        public function agregar($persona) {
            $this->db->insert($this->tabla, $persona);
        }

        public function obtener_datos() {
            $this->db->select('*');
            $this->db->from($this->tabla);
            return $this->db->get()->result();
        }

        public function eliminar($id_persona) {
            $this->db->where('id', $id_persona);
            $this->db->delete($this->tabla);
        }

        public function editar($persona, $id_persona) {
            $this->db->where('id', $id_persona);
            $this->db->update($this->tabla, $persona);
        }
    }
    
?>