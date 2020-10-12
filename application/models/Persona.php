<?php 
    class Persona extends CI_Model {

        public function agregar($persona) {
            $this->db->insert('personas', $persona);
        }//end agregar

        public function seleccionar_todo() {
            $this->db->select('*');
            $this->db->from('personas');
            return $this->db->get()->result();
        }//end seleccionar_todo

        public function eliminar($id_persona) {
            $this->db->where('id', $id_persona);
            $this->db->delete('personas');
        }//end eliminar

        public function actualizar($persona, $id_persona) {
            $this->db->where('id', $id_persona);
            $this->db->update('personas', $persona);
        }//end actualizar
    }//end Class Persona
?>