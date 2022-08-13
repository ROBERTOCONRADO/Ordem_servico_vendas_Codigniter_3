<?php 
defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller {
    publi __contruct() {
        parent::__contruct();
        //Definir se há sessão
    }
    public function index() {
        $data = array(
            'usuarios' => $this->ion_auth->users()->result(); // get all users
        );
    }

}