<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Procesos_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function buscarProcesosPadre()
        {
            $query = $this->db->query('SELECT * FROM procesos WHERE estatus=1 and proceso_padre_id = 0 ORDER BY proceso_id asc');
            return $query->result_array();
        }
        public function buscarProcesosHijo($padre)
        {
            $query = $this->db->query('SELECT * FROM procesos WHERE estatus=1 and proceso_padre_id <> 0 and proceso_padre_id='. $padre .' ORDER BY proceso_id asc');
            return $query->result_array();
        }
          
 }
 
?>
