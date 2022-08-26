<?php 
defined('BASEPATH') OR exit('Ação não permitida!');

class Fornecedores extends CI_Controller {
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

    public function edit($fornecedor_id = NULL) {
        if(!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)))  {
            $this->session->set_flashdata('error', 'Fornecedor não encontrado!');
            redirect('fornecedores');
        }else {
            $this->form_validation->set_rules('fornecedor_nome', '', 'trim|required|min_length[4]|max_length[45]');
            $this->form_validation->set_rules('fornecedor_sobrenome', '', 'trim|required|min_length[4]|max_length[150]');
            $this->form_validation->set_rules('fornecedor_data_nascimento', '', 'required');

            $fornecedor_tipo = $this->input->post('fornecedor_tipo');
            if ($fornecedor_tipo == 1) {
                $this->form_validation->set_rules('fornecedor_cpf', '', 'trim|required|exact_length[14]|callback_valida_cpf');
            }else {
                $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|exact_length[18]|callback_valida_cnpj');
            }

            $this->form_validation->set_rules('fornecedor_rg_ie', '', 'trim|required|max_length[20]|callback_check_rg_ie');

            $this->form_validation->set_rules('fornecedor_email', '', 'trim|required|valid_email|max_length[50]|callback_check_email');


            if(!empty($this->input->post('fornecedor_telefone'))){
                $this->form_validation->set_rules('fornecedor_telefone', '', 'trim|max_length[14]|callback_check_telefone');
            }  
            if(!empty($this->input->post('fornecedor_telefone'))){
                $this->form_validation->set_rules('fornecedor_celular', '', 'trim|required|max_length[15]|callback_check_celular');
            }
            
            $this->form_validation->set_rules('fornecedor_cep', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('fornecedor_endereco', '', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|max_length[20]');
            $this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('fornecedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('fornecedor_obs', '', 'max_length[500]');

            if() {

            }else {
                
            }





            $data = array(
                'titulo' => 'Atualizar fornecedor',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
                'fornecedor' => $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('fornecedores/edit');
            $this->load->view('layout/footer');
        }
    }

}    