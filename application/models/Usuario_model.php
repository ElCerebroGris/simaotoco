<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function adicionar() {
        $data['nome_completo'] = $this->input->post('nome');
        $data['nome_usuario'] = $this->input->post('nome_usuario');
        $data['id_nivel_usuario'] = $this->input->post('nivel');
        $data['senha'] = $this->input->post('senha');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');
        
        $this->load->model('Log_Model', 'log_model');
        $sms = 'adicionou o usuario ' .$data['nome_usuario'] . ' no sistema';
        $this->log_model->adicionar('Adicionar', $sms);

        return $this->db->insert('usuario', $data);
    }

}
