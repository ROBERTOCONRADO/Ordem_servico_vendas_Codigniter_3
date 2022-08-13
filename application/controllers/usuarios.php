<?php 
defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller {
    public function __contruct() {
        parent::__contruct();
        //Definir se há sessão
    }
    public function index() {
        $data = array(
            'usuarios' => $this->ion_auth->users()->result(), // get all users
        );
        // echo '<pre>';
        // print_r($data['usuarios']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

}