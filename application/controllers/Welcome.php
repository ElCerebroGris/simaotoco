<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function nivel_usuario() {
        if ($this->session->userdata('nivel') == 0) {
            redirect('professor');
        } else {
            redirect('exame/exames');
        }
    }
    
    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();        
        redirect('welcome/dashboard');
    }
    
    public function dashboard() {
        $this->verificar_acesso();
        $dados['membros'] = $this->db->get('membro')->result();  
        $dados['usuarios'] = $this->db->get('usuario')->result();  
        
        $this->load->view('dashboard', $dados);
    }
    
    public function entrar() {
        $this->load->view('login');
    }

}
