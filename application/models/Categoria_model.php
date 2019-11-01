<?php

class Categoria_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_categorias(){
        $CI =& get_instance();

        $categorias = $CI->db
        ->get('categorias')
        ->result_array();

        return $categorias;
    }



}