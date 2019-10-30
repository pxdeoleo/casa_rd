<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Propiedad_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    static function guardar_propiedad($propiedad){
        $CI =& get_instance();
        
        if (isset($propiedad['id']) && $propiedad['id'] > 0) {
            $CI->db->where('id', $propiedad['id']);
            $CI->db->update('propiedades', $propiedad);
        }else{
            $CI->db->insert('propiedades', $propiedad);
        }
    }

    public function propiedades(){
        $CI =& get_instance();

        $propiedades = $CI->db
        ->order_by('fecha', 'DESC')
        ->get('propiedades')
        ->result_array();
        
        return $propiedades;
    }
    
    public function propiedades_dest(){
        $CI =& get_instance();

        $propiedades = $CI->db
        ->order_by('fecha DESC, visitas DESC')
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

        $CI->db
        ->set('visitas', 'visitas+1', FALSE)
        ->where('id', $id_propiedad)
        ->update('propiedades');

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
        ->query("SELECT categorias.id as id, categorias.nombre as nombre, COUNT(*) as contador FROM propiedades
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

    public function propiedades_x_usuario($id_usuario){
        $CI =& get_instance();

        $propiedades = $CI->db
        ->order_by('fecha', 'DESC')
        ->where('usuario_id', $id_usuario)
        ->get('propiedades')
        ->result_array();
        
        return $propiedades;
    }

    public function nuevo_filtro(){
        $filtro = new stdclass();
        $filtro->keyword = "";
        $filtro->ciudad="";
        $filtro->hab = "";
        $filtro->banos = "";
        $filtro->minArea = 0;
        $filtro->maxArea = 0;
        $filtro->minPrecio= 0;
        $filtro->maxPrecio= 0;   
        $filtro->categoria = 0;
    }
    public function filtrarPropiedades($filtro){
        $CI =& get_instance();
        $sql = "ciudad like '".$filtro->ciudad."' and hab like '".$filtro->hab."' and banos like '".
        $filtro->banos."' and id_categoria like '".$filtro->categoria."' and (nombre like '%".$filtro->keyword.
        "%' or descripcion like '%".$filtro->keyword."%' or sector like '%".$filtro->keyword."%'
        or provincia like '%".$filtro->keyword."%') and area between '".$filtro->minArea."' and
        '".$filtro->maxArea."' and precio between '".$filtro->minPrecio."' and '".$filtro->maxPrecio."'";
        $propiedades = $CI->db
        ->where($sql)
        ->get('propiedades')
        ->result_array();
        return $propiedades;
    }
    public function sendMail($mailcontent){
    $headers = 'From: Casas RD casarepdom@gmail.com' . "\r\n" .
    'Reply-To: '. $mailcontent->reply . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" . 
    'Content-type: text/html; charset=iso-8859-1';
    $title =  'Nuevo Mensaje Acerca de '.$mailcontent->propiedad;
    $body = '<html><head> <title>Nuevo Mensaje Acerca de '.$mailcontent->propiedad.'</title>
    </head>
    <body>
      <p style="font-size: 18px; color:black;">Tienes un nuevo mensaje acerca de tu anuncio <strong>'.
      $mailcontent->propiedad.'</strong> con el tema de <strong>'.$mailcontent->subject.' </strong>
      de parte de <strong>'.$mailcontent->nombre.'</strong> que dice lo siguiente:</p>
      <p style="font-size: 16px;  color:black;">'.$mailcontent->mensaje.'</p>
    </body>
    </html>';
    mail($mailcontent->recipient,$title,$body,$headers);
    }
    public function showCard($value,$tipo){
        $base = base_url('base');
        if ($value['id_categoria'] == 1) {
            $tipo = '<img src="'.$base.'/img/icons/flat.png" alt="Apartamento">';
        }elseif ($value['id_categoria'] == 2) {
            $tipo = '<img src="'.$base.'/img/icons/house2.png" alt="Casa">';
        }
        $link = base_url('propiedades/ver/'.$value['id']);
echo<<<PROPIEDAD
                    <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{$link}"> <img src="{$base}/img/bg-img/feature1.jpg" alt=""></a>

                            <div class="tag">
                                <span>Disponible</span>
                            </div>
                            <div class="list-price">
                                <p>{$value['precio']}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$value['nombre']}</h5>
                            <p class="location"><img src="{$base}/img/icons/location.png" alt="">{$value['direccion']}</p>
                            <p>{$value['descripcion']}</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    {$tipo}
                                </div>
                                <span>{$value['hab']} dorm.</span>
                                <div class="bathroom">
                                    <img src="{$base}/img/icons/bathtub.png" alt="">
                                    <span>{$value['banos']}</span>
                                </div>
                                <div class="garage">
                                    <img src="{$base}/img/icons/garage.png" alt="">
                                    <span>{$value['par']}</span>
                                </div>
                                <div class="space">
                                    <img src="{$base}/img/icons/space.png" alt="">
                                    <span>{$value['area']} m²</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
                    
PROPIEDAD;
    }

}
?>