<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller {

    public function index()
    {
        session_start();
        if(!isset($_SESSION['user'])){
            redirect(base_url('cuenta/login'));
        }
    }

    public function add_usuario(){
        $this->load->model('cuenta_model');
        $this->load->view('registro');
    }

    public function editar_usuario($id=0){
        $this->load->model('Usuario_model');
        $this->load->view('editar_usuario',['id'=>$id]);
    }

    function borrar_usuario($id=0){
        $this->load->model('Usuario_model');
        Usuario_model::borrar($id);
        redirect('main');
    }

    public function registro()
    {
        $this->load->model('cuenta_model');
        // cedula, correo, nombre, apellido, fecha de nacimiento y grupo ciclístico a que pertenece
        $this->load->view('registro');
    }

    public function login()
    {
        $this->load->model('cuenta_model');
        $this->load->view('login');
    }

    public function logoff()
    {
        session_start();
        session_destroy();
        redirect(base_url(''));
    }

    public function contacto()
    {
        $this->load->model('cuenta_model');
        $this->load->view('contacto');
    }

    public function nuevo_anuncio(){
        $this->load->model('anuncios_model');
        $this->load->view('agregar_anuncio');
    }
}

/* End of file Controllername.php */
