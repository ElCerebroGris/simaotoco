<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        $this->db->order_by('log_id DESC');
        $this->db->join('usuario', 'usuario.usuario_id=log.usuario_id');
        $dados['logs'] = $this->db->get('log')->result();  
        
        $this->load->view('log/listar', $dados);
    }
}
