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
        /*
        [sistema_id] => 1
        [sistema_razao_social] => system ordem inc
        [sistema_nome_fantasia] => Sistema Ordem Now
        [sistema_cnpj] => 87.372.921/0001-63
        [sistema_ie] => 
        [sistema_telefone_fixo] => 
        [sistema_telefone_movel] => 
        [sistema_email] => ordemnow@contato.com.br
        [sistema_site_url] => http://localhost/ordem[u]/
        [sistema_cep] => 80429-000
        [sistema_endereco] => Rua Natal
        [sistema_numero] => 800
        [sistema_cidade] => Vitoria da Conquista
        [sistema_estado] => BA
        [sistema_txt_ordem_servico] => 
        [sistema_data_alteracao] => 2022-08-17 12:28:47
        */
        // echo '<pre>'; print_r($data['sistema']);exit();
        $this->load->view('layout/header', $data);
        $this->load->view('sistema/index');
        $this->load->view('layout/footer');
    }
}