<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Propiedad_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function propiedades(){
        $CI =& get_instance();

        $propiedades = $CI->db
        ->order_by('fecha', 'DESC')
        ->get('propiedades')
        ->result_array();
        
        return $propiedades;
    }

    public function propiedad_x_id($id_propiedad){
        $CI =& get_instance();

        $propiedad = $CI->db
        ->where("id", $id_propiedad)
        ->get('propiedades')
        ->result_array();

        return $propiedad;
    }

    public function rango_precio(){
        $CI =& get_instance();

        $rango = $CI->db
        ->select('MAX(precio) as max_precio, MIN(precio) as min_precio')
        ->from('propiedades')
        ->get()
        ->result_array();

        return $rango;
    }

    public function rango_area(){
        $CI =& get_instance();

        $rango = $CI->db
        ->select('MAX(area) as max_area, MIN(area) as min_area')
        ->from('propiedades')
        ->get()
        ->result_array();

        return $rango;
    }

    public function banos()
    {
        $CI =& get_instance();

        $banos = $CI->db
        ->query('SELECT DISTINCT(banos) FROM propiedades')
        ->result_array();
        
        return $banos;
    }

    public function dormitorios()
    {
        $CI =& get_instance();

        $dormitorios = $CI->db
        ->query('SELECT DISTINCT(hab) FROM propiedades')
        ->result_array();
        
        return $dormitorios;
    }

    public function ciudades()
    {
        $CI =& get_instance();

        $ciudades = $CI->db
        ->query("SELECT DISTINCT(ciudad) FROM propiedades")
        ->result_array();
        
        return $ciudades;
    }

    public function cont_tipos()
    {
        $CI =& get_instance();

        $tipos = $CI->db
        ->query("SELECT categorias.nombre as nombre, COUNT(*) as contador FROM propiedades
        JOIN categorias ON categorias.id = propiedades.id_categoria GROUP BY id_categoria")
        ->result_array();

        return $tipos;
    }


    public function ultPropiedades(){
        $CI =& get_instance();

        $propiedades = $CI->db
        ->limit(6)
        ->order_by('fecha', 'DESC')
        ->get('propiedades')
        ->result_array();
        
        return $propiedades;
    }

    // public function guardarNoticia($noticia, $foto){
    //     // if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png"){
    //     date_default_timezone_set ('America/Santo_Domingo');
    //     if(!is_string($foto)){
    //         $CI =& get_instance();
    //         $maxid = $CI->db->query('SELECT MAX(id_noticia) FROM noticias')->result_array()[0]['MAX(id_noticia)'];
            
    //         $ruta="fotos/noticias/";//ruta carpeta donde queremos copiar las imágenes
    //         $uploadfile_temporal=$foto['tmp_name'];
                
    
    //         if($foto["type"]=="image/jpeg") 
    //         {
    //             $uploadfile_nombre = ($maxid+1).'.jpg';
    
    //         }
    //         else if($foto["type"]=="image/pjpeg")
    //         {
    //             $uploadfile_nombre = ($maxid+1).'.jpeg';       
           
    //         }
    //         else if($foto["type"]=="image/gif")
    //         {
    //             $uploadfile_nombre = ($maxid+1).'.gif';       
    
    //         }
    //         else if($foto["type"]=="image/png"){
    //             $uploadfile_nombre = ($maxid+1).'.png';       
    
    //         }
    
        
    //         move_uploaded_file($uploadfile_temporal, $ruta.$uploadfile_nombre);
    //     }else{
    //         $uploadfile_nombre = $foto;
    //     }
        
        
    //     $CI =& get_instance();

    //     if(isset($noticia['id_noticia'])){
    //         $CI->db->replace('noticias', array(
    //             'id_noticia'=>$noticia['id_noticia'],
    //             'asunto'=>$noticia['asunto'],
    //             'contenido'=>$noticia['contenido'],
    //             'foto'=>$uploadfile_nombre,
    //             'fecha'=>date('Y-m-d')
    //         ));
    //     }else{
    //         $CI->db->replace('noticias', array(
    //             'asunto'=>$noticia['asunto'],
    //             'contenido'=>$noticia['contenido'],
    //             'foto'=>$uploadfile_nombre,
    //             'fecha'=>date('Y-m-d')
    //         ));
    //     }

        
        
    // }

    // public function borrar_noticia($id_noticia){
        
    //     $CI =& get_instance();
    //     $CI->db
    //     ->delete('noticias', array('id_noticia' => $id_noticia));
    // }
    

}

/* End of file Noticias_model.php */




?>