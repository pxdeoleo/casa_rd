<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Propiedades extends CI_Controller {

    public function index()
    {
        $this->load->model('propiedad_model');
        $this->load->view('propiedades');
    }

    public function ver($id_propiedad){
        $this->load->model('propiedad_model');
        $this->load->model('cuenta_model');
        $this->load->view('propiedad',['id_propiedad',$id_propiedad]);
    }

    public function agregar()
    {
        $this->load->helper('componentes_helper');
        $this->load->model('categoria_model');
        $this->load->model('propiedad_model');
        $this->load->view('agregar_propiedad');
    }

    public function editar($id=0){
        $this->load->model('propiedad_model');
        $this->load->model('categoria_model');
        $this->load->view('editar_propiedad',['id'=>$id]);
    }
    
    public function borrar($id=0){
        $this->load->model('propiedad_model');
        $this->propiedad_model->borrar_prop($id);
        redirect('propiedades/mis_propiedades');
    }

    function mis_propiedades(){
        $this->load->model('propiedad_model');
        $this->load->view('mis_propiedades');
    }

}

/* End of file Controllername.php */
