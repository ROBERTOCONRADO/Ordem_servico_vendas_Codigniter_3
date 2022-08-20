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

    public function index() {
        $data = array(
            'titulo' => 'Editar informações do sistema',
            'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),
        );

        $this->form_validation->set_rules('sistema_razao_social', 'Razão social', 'required|min_length[5]|max_length[145]');
        $this->form_validation->set_rules('sistema_nome_fantasia', 'Nome fantasia', 'required|min_length[5]|max_length[145]');
        $this->form_validation->set_rules('sistema_cnpj', 'CNPJ', 'required|exact_length[18]');
        $this->form_validation->set_rules('sistema_ie', '', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_fixo', '', 'max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_movel', '', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_email', '', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('sistema_site_url', 'URL do site', 'required|valid_url|max_length[100]');
        $this->form_validation->set_rules('sistema_cep', 'CEP', 'required|exact_length[9]');
        $this->form_validation->set_rules('sistema_endereco', '', 'required|max_length[145]');
        $this->form_validation->set_rules('sistema_numero', '', 'max_length[25]');
        $this->form_validation->set_rules('sistema_cidade', '', 'required|max_length[45]');
        $this->form_validation->set_rules('sistema_estado', '', 'required|exact_length[2]');
        $this->form_validation->set_rules('sistema_txt_ordem_servico', '', 'required|max_length[500]');

        if($this->form_validation->run()) {
            
            //   echo '<pre>'; print_r($this->input->post());exit();
            $data = elements(
                array(
                    'sistema_razao_social',
                    'sistema_nome_fantasia',
                    'sistema_cnpj',
                    'sistema_ie',
                    'sistema_telefone_fixo',
                    'sistema_telefone_movel',
                    'sistema_email',
                    'sistema_site_url',
                    'sistema_cep',
                    'sistema_endereco',
                    'sistema_numero',
                    'sistema_cidade',
                    'sistema_estado',
                    'sistema_txt_ordem_servico',
                ), $this->input->post()
            );
        }else {
            $this->load->view('layout/header', $data);
            $this->load->view('sistema/index');
            $this->load->view('layout/footer');
        }
        /*
        [sistema_razao_social] => system ordem inc
        [sistema_nome_fantasia] => Sistema Ordem Now
        [sistema_cnpj] => 87.372.921/0001-63
        [sistema_ie] => 240.32747-31
        [sistema_telefone_fixo] => 4133333333
        [sistema_telefone_movel] => 4199999999
        [sistema_site_url] => http://localhost/ordem[u]/
        [sistema_email] => ordemnow@contato.com.br
        [sistema_cidade] => Vitoria da Conquista
        [sistema_estado] => BA
        [sistema_cep] => 80429-000
        [sistema_endereco] => Rua Natal
        [sistema_numero] => 800
        [sistema_txt_ordem_servico] => Testando
        */
    }
}