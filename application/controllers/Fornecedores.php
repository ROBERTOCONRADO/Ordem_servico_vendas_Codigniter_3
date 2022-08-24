<?php 
defined('BASEPATH') OR exit('Ação não permitida!');

class Clientes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou!');
            redirect('login');
        }
    }
    public function index() {
        $data = array(

            'titulo' => 'Fornecedores cadastrados',

            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'fornecedores' => $this->core_model->get_all('fornecedores'),
        );
        // echo '<pre>';print_r($data['fornecedores']);exit();
        
        $this->load->view('layout/header', $data);
        $this->load->view('fornecedores/index');
        $this->load->view('layout/footer');
    }
}    