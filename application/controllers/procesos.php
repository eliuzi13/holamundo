<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Procesos extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('procesos_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['procesos'] = $this->procesos_model->buscarTodos();
 
                //crear el menu
           
               $menuItens = array();
                
                foreach( $data['procesos'] as $row)
                {
                    $row = (object) $row;
                    $menuItens[$row->proceso_padre_id][$row->proceso_id] = array('link' => $row->url,'text' => $row->descripcion);
                }
                
                //llamar al crear menu
                $this->create_menu($menuItens);
                
                 $data['title'] = 'Creando menu dinamico';

                 $this->load->view('templates/header', $data);
                 $this->load->view('pages/about', $data); //about tiene la plantilla de pruebas
                 $this->load->view('templates/footer', $data);
                 
                 
        }
        
        public function create_menu(array $arrayItem, $id_parent = 0, $level = 0)
        {
            echo str_repeat("t" , $level ),'<ul>',PHP_EOL;
            foreach( $arrayItem[$id_parent] as $id_item => $item)
            {
                echo str_repeat("t" , $level + 1 ),'<li><a href="',$item['link'],'">',$item['text'],'</a>',PHP_EOL;
                if(isset( $arrayItem[$id_item] ) ){
                    create_menu($arrayItem , $id_item , $level + 2);
                }
                echo str_repeat("t" , $level + 1 ),'</li>',PHP_EOL;
            }
            echo str_repeat("t" , $level ),'</ul>',PHP_EOL;
        }
}
?>