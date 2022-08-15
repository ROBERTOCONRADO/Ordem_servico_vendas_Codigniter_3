<?php 
defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller {
    public function __contruct() {
        parent::__contruct();
        //Definir se há sessão
    }
    public function index() {
        $data = array(

            'titulo' => 'Usuários cadastrados',

            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'usuarios' => $this->ion_auth->users()->result(), // get all users
        );
        // echo '<pre>';
        // print_r($data['usuarios']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }
    public function edit($usuario_id = NULL) {
            if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
                $this->session->set_flashdata('error', 'Usuário não encontrado');
                redirect('usuarios');
            } else {
    //          [first_name] => Admin
    //          [last_name] => istrator
    //          [email] => admin@admin.com
    //          [username] => administrator
    //          [active] => 1
    //          [perfil_usuario] => 1
    //          [password] => 
    //          [usuario_id] => 1

                // echo '<pre>';
                // print_r($this->input->post());
                // exit();

                $this->form_validation->set_rules('first_name', '', 'trim|required');
                $this->form_validation->set_rules('last_name', '', 'trim|required');
                $this->form_validation->set_rules('email', '', 'trim|required|valid_email|callback_email_check');
                $this->form_validation->set_rules('username', '', 'trim|required|callback_username_check');
                $this->form_validation->set_rules('password', 'senha', 'min_length[5]|max_length[255]');
                $this->form_validation->set_rules('confirm_password', 'confirme', 'matches[password]');
                if($this->form_validation->run()) {
                    $data = elements(
                        array(
                            'first_name',
                            'last_name',
                            'email',
                            'username',
                            'active',
                            'password',
                            'password',
                        ), $this->input->post()
                    );
                    $data = $this->security->xss_clean($data);

                    //verifica se foi passado o password
                    $password = $this->input->post('password');
                    if (!$password) {
                        unset($data['password']);
                    }

                    if($this->core_model->update('users', $data, array('id' => $usuario_id))) {
                        // [perfil_usuario] => 1
                        $perfil_usuario_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                        $perfil_usuario_post = $this->input->post('perfil_usuario');
                        if($perfil_usuario_post != $perfil_usuario_db->id) {
                            $this->ion_auth->remove_from_group(1, $user_id);
                        }
                    }

                    echo '<pre>';
                    print_r($data);
                    exit();

                }else {
                    $data = array(
                        'titulo' => 'Editar usuário',
                        'usuario' => $this->ion_auth->user($usuario_id)->row(),
                        'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                        );
                        
                        $this->load->view('layout/header', $data);
                        $this->load->view('usuarios/edit');
                        $this->load->view('layout/footer');
                }
  
            }
    }
    public function email_check($email) {
        $usuario_id = $this->input->post('usuario_id');
        if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('email_check', 'Esse email já existe.');
            return FALSE;
        }else {
            return TRUE;
        }
    }
    public function username_check($username) {
        $usuario_id = $this->input->post('usuario_id');
        if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('username_check', 'Esse usuário já existe.');
            return FALSE;
        }else {
            return TRUE;
        }
    }

}