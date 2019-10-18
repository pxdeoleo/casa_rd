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
        $this->load->view('propiedad',['id_propiedad',$id_propiedad]);
    }

    public function agregar(){
        $this->load->model('propiedad_model');
        $this->load->view('add_propiedad');
    }

}

/* End of file Controllername.php */
