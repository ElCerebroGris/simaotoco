<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class log_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function adicionar($descricao) {
        $data['usuario_id'] = $this->session->userdata('id_usuario');
        $data['descricao_log'] = $descricao;

        return $this->db->insert('log', $data);
    }

}
