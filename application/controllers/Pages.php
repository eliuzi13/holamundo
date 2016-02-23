<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Pages extends CI_Controller
{
    public function view($page='about')//aqui se envia la pagina estatica que se quiere mostrar.. ejemplo: home o about
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        
             $this->load->model('procesos_model');
           $data['procesos'] = $this->procesos_model->buscarProcesosPadre();
           
  //         print_r($data['procesos'] );
           
//         $menu[]=array('colores'=>array('rojo','azul','verde'));
//                $menu[]=array('animales'=>array('perro','gato','conejo'));
//                $menu[]=array('algo'=>array());
            
//                $menu[]=array();
                
         foreach( $data['procesos'] as $row)
        {
            $row = (object) $row;
           // $menu[$row->proceso_id][$row->proceso_padre_id] = array('link' => $row->url,'text' => $row->descripcion, 'proceso'=>$row->proceso_padre_id);
            
            //llamar subprocesos del proceso
            $datos = $this->procesos_model->buscarProcesosHijo($row->proceso_id);
            
            
            $menu[] = array($row->descripcion.'|'.$row->icono => $datos);
          
        }       
               
       // print_r($menu);
                
         $data['menu'] = $menu;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        
    }
}
?>
