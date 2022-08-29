<?php 
defined('BASEPATH') OR exit('Ação não permitida!');

class Vendedores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou!');
            redirect('login');
        }
    }
    public function index() {
        $data = array(

            'titulo' => 'Vendedores cadastrados',

            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'vendedores' => $this->core_model->get_all('vendedores'),
        );
        // echo '<pre>';print_r($data['vendedores']);exit();
        
        $this->load->view('layout/header', $data);
        $this->load->view('vendedores/index');
        $this->load->view('layout/footer');
    }
    public function edit($vendedor_id = NULL) {
        if(!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)))  {
            $this->session->set_flashdata('error', 'Vendedor não encontrado!');
            redirect('vendedores');
        }else {
            $this->form_validation->set_rules('vendedor_nome_completo', '', 'trim|required|min_length[4]|max_length[200]');
            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|required|exact_length[18]|callback_valida_cpf');
            $this->form_validation->set_rules('vendedor_rg', '', 'trim|required|max_length[20]|callback_check_vendedor_rg');
            $this->form_validation->set_rules('vendedor_email', '', 'trim|required|valid_email|max_length[50]|callback_check_email');
            $this->form_validation->set_rules('vendedor_telefone', '', 'trim|required|max_length[14]|callback_check_telefone');
            $this->form_validation->set_rules('vendedor_celular', '', 'trim|required|max_length[15]|callback_check_celular');
            $this->form_validation->set_rules('vendedor_cep', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('vendedor_endereco', '', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('vendedor_numero_endereco', '', 'trim|max_length[20]');
            $this->form_validation->set_rules('vendedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('vendedor_cidade', '', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('vendedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs', '', 'max_length[500]');

            if($this->form_validation->run()) {
                $data = elements(
                    array(
                        'vendedor_codigo',
                        'vendedor_nome_completo',
                        'vendedor_cpf',
                        'vendedor_rg',
                        'vendedor_email',
                        'vendedor_telefone', 
                        'vendedor_celular',
                        'vendedor_endereco',
                        'vendedor_numero_endereco',
                        'vendedor_complemento',
                        'vendedor_bairro',
                        'vendedor_cep',
                        'vendedor_cidade',
                        'vendedor_estado',
                        'vendedor_ativo',
                        'vendedor_obs',
                    ), $this->input->post()
                );
                
                $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));
    
                $data = html_escape($data);
    
                $this->core_model->update('vendedores', $data, array('vendedor_id' => $vendedor_id));
    
                redirect('vendedores');
    
                // echo '<pre>';print_r($data);exit();
            }else {
                $data = array(
                    'titulo' => 'Atualizar vendedor',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'vendedor' => $this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),
                );
    
                $this->load->view('layout/header', $data);
                $this->load->view('vendedores/edit');
                $this->load->view('layout/footer');
            }  
        }
    }
}    