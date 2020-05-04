<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Horario_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function listar() {
        $turmas = array(
            array("Volvo", 22, 18),
            array("BMW", 15, 13),
            array("Saab", 5, 2),
            array("Land Rover", 17, 15)
        );
        return $turmas;
    }

    function adicionar() {
        $data['horario_descricao'] = $this->input->post('descricao');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');
        
        $this->load->model('Log_Model', 'log_model');
        $sms = 'adicionou o horario ' .$data['horario_descricao'] . ' no sistema';
        $this->log_model->adicionar('Adicionar', $sms);

        return $this->db->insert('horario', $data);
    }

}
