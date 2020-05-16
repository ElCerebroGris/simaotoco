<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Membro_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function adicionar() {
    }

    function editar() {
        
    }

    function ver($id) {
        $this->db->where('membro_id', $id);
        $this->db->join('classe', 'classe.classe_id=membro.classe_id');
        $this->db->join('paroquia', 'paroquia.paroquia_id=classe.paroquia_id');
        $this->db->join('provincia_eclesiastica', 
        'provincia_eclesiastica.provincia_eclesiastica_id=paroquia.provincia_eclesiastica_id');
        $this->db->join('igreja_nacional', 
        'igreja_nacional.igreja_nacional_id=provincia_eclesiastica.igreja_nacional_id');

        $this->db->join('funcao', 'funcao.funcao_id=membro.funcao_id');
        $this->db->join('area', 'area.area_id=membro.area_id');
        $this->db->join('tribo', 'tribo.tribo_id=area.tribo_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('categoria', 'categoria.categoria_id=membro.categoria_id');
        $this->db->join('identificacao', 'identificacao.pessoa_id=pessoa.pessoa_id');
        $this->db->join('nacionalidade', 'nacionalidade.nacionalidade_id=pessoa.nacionalidade_id');
        $membro = $this->db->get('membro')->result();
        return ($membro) ? $membro[0] : 0;
    }



}
