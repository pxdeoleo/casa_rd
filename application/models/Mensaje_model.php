<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mensaje_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    static function guardar_mensaje($mensaje){
        
        $CI =& get_instance();
        if (isset($mensaje['id']) && $mensaje['id'] > 0) {
            $CI->db->where('id',$mensaje['id']);
            $CI->db->update('mensaje', $mensaje);
        }else{
            $CI->db->insert('mensaje', $mensaje);
        }
    }

    static function mensaje_x_id($id){
        
        $CI =& get_instance();
        $mensaje = $CI->db
        ->where('id',$id)
        ->get('mensaje')
        ->result_array();

        return $mensaje;
    }

    static function listado_mensaje(){
        
        $CI =& get_instance();
        $rs = $CI->db->get('mensaje')->result();

        return $rs;
    }

    static function borrar($id){
        
        $CI =& get_instance();
        $sql = "delete from mensaje where id=?";
        $CI->db->query($sql, [$id]);
    }
    

}

/* End of file ModelName.php */

?>