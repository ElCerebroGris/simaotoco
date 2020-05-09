<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Membro_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function adicionar() {
    }

    function editar() {
        
    }

    function ver($id) {
        $this->db->where('membro_id', $id);
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('identificacao', 'identificacao.pessoa_id=pessoa.pessoa_id');
        $this->db->join('nacionalidade', 'nacionalidade.nacionalidade_id=pessoa.nacionalidade_id');
        $dados['membros'] = $this->db->get('membro')->result();
        return ($dados['membros']) ? $dados['membros'][0] : 0;

    }



}
