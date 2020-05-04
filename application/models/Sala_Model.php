<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sala_Model extends CI_Model {

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
        $data['nome'] = $this->input->post('nome');
        $data['capacidade'] = $this->input->post('capacidade');
        $data['sala_descricao'] = $this->input->post('descricao');
        
        $this->load->model('Log_Model', 'log_model');
        $sms = 'adicionou a sala ' .$data['nome'] . ' no sistema';
        $this->log_model->adicionar('Adicionar', $sms);

        return $this->db->insert('sala_de_aula', $data);
    }

}
