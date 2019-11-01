<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    static function guardar_usuario($usuario){
        $CI =& get_instance();
        
        if (isset($usuario['id']) && $usuario['id'] >0) {
            $CI->db->where('id', $usuario['id']);
            $CI->db->update('usuarios', $usuario);
        }else{
            if (is_uploaded_file($_FILES["foto"]["tmp_name"])){
                if ($_FILES["foto"]["type"]=="image/jpeg" || $_FILES["foto"]["type"]=="image/pjpeg"
                || $_FILES["foto"]["type"]=="image/gif" || $_FILES["foto"]["type"]=="image/bmp" 
                || $_FILES["foto"]["type"]=="image/png"){
                    
                $usuario['foto'] = file_get_contents($_FILES["foto"]["tmp_name"]);
                     
                }
            }
            $CI->db->insert('usuarios', $usuario);
        }
    }

    static function usuario_x_id($id){
        $CI =& get_instance();
        
        $usuario = $CI->db
        ->where('id',$id)
        ->get('usuarios')
        ->result_array();

        return $usuario;
    }

    static function listado_usuario(){
        $CI =& get_instance();
        
        $rs = $CI->db->get('usuarios')->result();
        return $rs;
    }

    static function borrar($id){
        $CI =& get_instance();
        $sql = "delete from usuarios where id=?";
        $CI->db->query($sql, [$id]);
    }

    static function guardar($usuario){ 
        $CI =& get_instance();
        
        if(isset($usuario['id_usuario']) && $usuario['id_usuario'] > 0){
            $CI->db->where('id_usuario',$usuario['id_usuario']);
            $CI->db->update('usuarios',$usuario);
            
        }else{ 
            $CI->db->insert('usuarios',$usuario);
            
        }
    }

    static function inicio_sesion($usr, $psw){
        $CI =& get_instance();
        $rs = $CI->db
        ->where(array(
            'user'=>$usr,
            'pass'=>$psw))
        ->get('usuarios')
        ->result_array();
        var_dump($rs);
        if(count($rs)>0){
            return array(true, $rs[0]['id']);
        } else {
            return false;
        }
    }
    
}

/* End of file Noticias_model.php */




?>