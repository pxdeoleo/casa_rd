<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $this->load->model('propiedad_model');
        $this->load->view('inicio');
    }

}

/* End of file Controllername.php */
