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
            $idP = $CI->db->query("select id from propiedades order by id desc limit 1;")->result_array();
            $datos = array();
            for($i = 0; $i < count($_FILES["foto"]["tmp_name"]); $i++){
                if (is_uploaded_file($_FILES["foto"]["tmp_name"][$i])){
                    if ($_FILES["foto"]["type"][$i]=="image/jpeg" || $_FILES["foto"]["type"][$i]=="image/pjpeg"
                    || $_FILES["foto"]["type"][$i]=="image/gif" || $_FILES["foto"]["type"][$i]=="image/bmp" 
                    || $_FILES["foto"]["type"][$i]=="image/png"){
                        $datos[] = array(
                            'foto' => file_get_contents($_FILES["foto"]["tmp_name"][$i]),
                            'id_propiedad' => $idP[0]['id']
                        ); 
                    }
                }
            }
            $CI ->db->insert_batch('imagenes_propiedad', $datos);
        }
    }

    public function imagen_x_id($id_propiedad){
        $CI =& get_instance();

        $propiedad = $CI->db
        ->query("SELECT * FROM IMAGENES_PROPIEDAD WHERE ID_PROPIEDAD = $id_propiedad LIMIT 1")
        ->result_array();

        return $propiedad;
    }

    public function imagenes_x_id($id_propiedad){
        $CI =& get_instance();

        $propiedad = $CI->db
        ->where("id_propiedad", $id_propiedad)
        ->get('imagenes_propiedad')
        ->result_array();

        return $propiedad;
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

    public function borrar_prop($id){
        $CI =& get_instance();

        $CI->db
        ->query('DELETE FROM propiedades WHERE id='.$id);

        $CI->db
        ->query('DELETE FROM imagenes_propiedad WHERE id_propiedad='.$id);
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
        "%' or descripcion like '%".$filtro->keyword."%' or sector like '%".$filtro->keyword."%') and area between '".$filtro->minArea."' and
        '".$filtro->maxArea."' and precio between '".$filtro->minPrecio."' and '".$filtro->maxPrecio."'";
        $propiedades = $CI->db
        ->where($sql)
        ->get('propiedades')
        ->result_array();
        return $propiedades;
    }

    public function insertMessage($mailcontent){
        $CI =& get_instance();
        $mensaje= new stdClass();
        $mensaje->nombre = $mailcontent->nombre;
        $mensaje->de = $mailcontent->reply;
        $mensaje->para = $mailcontent->recipient;
        $mensaje->tema = $mailcontent->subject;
        $mensaje->mensaje = $mailcontent->mensaje;
        $CI->db->insert('mensaje',$mensaje);
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
      <p style="font-size: 18px; color:black;">Tienes un nuevo mensaje '.$mailcontent->about.' anuncio <strong>'.
      $mailcontent->propiedad.'</strong> con el tema de <strong>'.$mailcontent->subject.' </strong>
      de parte del '.$mailcontent->from.' <strong>'.$mailcontent->nombre.'</strong> que dice lo siguiente:</p>
      <p style="font-size: 16px;  color:black;">'.$mailcontent->mensaje.'</p>
    </body>
    </html>';
    mail($mailcontent->recipient,$title,$body,$headers);
    $this->propiedad_model->insertMessage($mailcontent);

    }
    public function showCard($value,$tipo){
        $base = base_url('base');
        $img = $this->propiedad_model->imagen_x_id($value['id']);
        $imagen = 'data:image/jpeg;base64,'.base64_encode( $img[0]['foto']);//'.$imagen.'
        if ($value['id_categoria'] != 2) {
            $tipo = '<img src="'.$base.'/img/icons/flat.png" alt="Apartamento">';
        }else {
            $tipo = '<img src="'.$base.'/img/icons/house2.png" alt="Casa">';
        }
        $link = base_url('propiedades/ver/'.$value['id']);
        $precio = number_format($value['precio'], 2);
        $descripcion = substr($value['descripcion'], 0, 90) . " [...]";
        echo<<<PROPIEDAD
                    <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{$link}"> <img style="height:250px; object-fit:cover; overflow:hidden;"  src="$imagen" alt=""></a>
                            <div class="tag">
                                <span>Disponible</span>
                            </div>
                            <div class="list-price">
                                <p>{$value['moneda']} {$precio}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$value['nombre']}</h5>
                            <p class="location"><img src="{$base}/img/icons/location.png" alt="">{$value['direccion']}</p>
                            <p>{$descripcion}</p>
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