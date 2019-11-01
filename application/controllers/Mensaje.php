<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mensaje extends CI_Controller {

    public function index()
    {
        $this->load->model('mensaje_model');
        $this->load->view('mensajes');
    }

    public function mensajes()
    {
        $this->load->model('mensaje_model');
        $this->load->model('propiedad_model');
        $this->load->model('cuenta_model');
        $this->load->view('mensajes');
    }

    public function borrar_mensaje($id=0){
        $this->load->model('mensaje_model');
        mensaje_model::borrar($id);
        
        redirect('mensaje/mensajes');
    }

    public function editar_menssaje($id=0){
        $this->load->model('mensaje_model');
        $this->load->view('mensajes',['id'=>$id]);
    }

}

/* End of file Controllername.php */
?>