<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Log_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function adicionar($accao, $sms) {
        $data['id_usuario'] = $this->session->userdata('id_usuario');
        $data['data'] = date('d/m') . '/20' . date('y');
        $data['hora'] = date("h:i:sa");
        $data['acao'] = $accao;
        $data['mensagem'] = $sms;

        return $this->db->insert('log', $data);
    }

}
