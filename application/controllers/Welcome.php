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
        $this->dados['membros'] = $this->db->get('membro')->result();  
        $this->dados['tribos'] = $this->db->get('tribo')->result();
        $this->dados['igrejas'] = $this->db->get('igreja_nacional')->result();    
        
        $this->load->view('dashboard', $this->dados);
    }
    
    public function entrar() {
        $this->load->view('login');
    }

}
