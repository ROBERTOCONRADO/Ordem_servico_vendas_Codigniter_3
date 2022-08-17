<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Sistema extends CI_Controller {
    public function __contruct() {
        parent::__contruct();

        if(!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou!');
            redirect('login');
        }
    }
}