<?php

class plantilla{

    public static $intancia;

    public static function aplicar($base=null){

        self::$intancia = new plantilla($base);
    }

    public function __construct($base)
    {
        $CI =& get_instance();
        if($base===null){
            $CI->load->view('plantilla/encabezado');       
        }else{
            $data['ruta'] = $base;
            $CI->load->view('plantilla/encabezado', $data);
        }
        
    }
    
}
?>