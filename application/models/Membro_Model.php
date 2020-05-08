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
        $data['aluno_nome'] = $this->input->post('nome');
        $data['sobrenome'] = $this->input->post('sobrenome');
        $data['num_bi'] = $this->input->post('num_bi');
        $data['sexo'] = $this->input->post('sexo');
        $data['telefone'] = $this->input->post('telefone');
        $data['telefone2'] = $this->input->post('telefone2');
        $data['email'] = $this->input->post('email');
        $data['estado'] = 1;
        $data['data_criacao'] = date('d/m') . '/20' . date('y');

        if ($this->db->insert('aluno', $data)) {
            $this->db->where('num_bi', $data['num_bi']);
            $dados['alunos'] = $this->db->get('aluno')->result();
            $id_aluno = $dados['alunos'][0]->id_aluno;

            //Adicionar na turma
            $data2['id_turma'] = $this->input->post('id_turma');
            $data2['id_aluno'] = $id_aluno;
            $data2['data_inscricao'] = $data['data_criacao'];
            $this->db->insert('turma_aluno', $data2);

            //Registrar Log
            $this->load->model('Log_Model', 'log_model');
            $sms = 'adicionou o aluno ' . $data['aluno_nome'] . ' no sistema';
            $this->log_model->adicionar('Adicionar', $sms);
            
            $this->load->model('Log_Model', 'log_model');
            $sms = 'adicionou o aluno ' . $data['aluno_nome'] . ' na turma '.$data2['id_turma'];
            $this->log_model->adicionar('Adicionar', $sms);

            return $id_aluno;
        }

        return null;
    }

    function editar() {
        $id_aluno = $this->input->post('id_aluno');

        $data['aluno_nome'] = $this->input->post('nome');
        $data['sobrenome'] = $this->input->post('sobrenome');
        $data['num_bi'] = $this->input->post('num_bi');
        $data['sexo'] = $this->input->post('sexo');
        //$data['trabalhador'] = $this->input->post('trabalhador');
        $data['nivel_academico'] = $this->input->post('nivel_academico');
        $data['residencia'] = $this->input->post('residencia');
        $data['telefone'] = $this->input->post('telefone');
        $data['telefone2'] = $this->input->post('telefone2');
        $data['estado'] = 1;
        $data['email'] = $this->input->post('email');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');

        $this->db->where('id_aluno', $id_aluno);
        if ($this->db->update('aluno', $data)) {
            
            $this->load->model('Log_Model', 'log_model');
            $sms = 'editou o aluno ' . $data['aluno_nome'] . ' no sistema';
            $this->log_model->adicionar('Editar', $sms);
            
            return $id_aluno;
        }

        return null;
    }

    function ver($id) {
        $this->db->where('membro_id', $id);
        $this->db->join('classe', 'classe.classe_id=membro.classe_id');
        $this->db->join('paroquia', 'paroquia.paroquia_id=classe.paroquia_id');
        $this->db->join(
            'provincia_eclesiastica',
            'provincia_eclesiastica.provincia_eclesiastica_id=paroquia.provincia_eclesiastica_id'
        );
        $this->db->join('igreja_nacional',
            'igreja_nacional.igreja_nacional_id=provincia_eclesiastica.igreja_nacional_id');
        $this->db->join('categoria', 'categoria.categoria_id=membro.categoria_id');
        $this->db->join('funcao', 'funcao.funcao_id=membro.funcao_id');
        $this->db->join('area', 'area.area_id=membro.area_id');
        $this->db->join('tribo', 'tribo.tribo_id=area.tribo_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('identificacao', 'identificacao.pessoa_id=pessoa.pessoa_id');
        $this->db->join('nacionalidade', 'nacionalidade.nacionalidade_id=pessoa.nacionalidade_id');
        return ($this->db->get('membro')->result()) ? $this->db->get('membro')->result()[0] : 0;

    }

}
