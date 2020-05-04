<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Turma_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function adicionar() {
        $data['id_curso'] = $this->input->post('id_curso');
        $data['id_usuario'] = $this->input->post('id_usuario');
        $data['id_sala_de_aula'] = $this->input->post('id_sala');
        $data['id_horario'] = $this->input->post('id_horario');
        $data['id_estado'] = 1;
        $data['turma_nome'] = $this->input->post('nome');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');
        
        $inicio = $this->input->post('inicio');
        $fim = $this->input->post('fim');
        
        $data['inicio_ano'] = str_split($inicio, 4)[0];
        $data['inicio_mes'] = str_split($inicio)[5].str_split($inicio)[6];
        $data['inicio_dia'] = str_split($inicio, 2)[4];
        $data['fim_ano'] = str_split($fim, 4)[0];
        $data['fim_mes'] = str_split($fim)[5].str_split($fim)[6];
        $data['fim_dia'] = str_split($fim, 2)[4];
        
        

        $this->load->model('Log_Model', 'log_model');
        $sms = 'adicionou a turma ' . $data['turma_nome'] . ' no sistema';
        $this->log_model->adicionar('Adicionar', $sms);

        return $this->db->insert('turma', $data);
    }
    
    function editar() {
        $id = $this->input->post('id_turma');
        
        $data['id_curso'] = $this->input->post('id_curso');
        $data['id_usuario'] = $this->input->post('id_usuario');
        $data['id_sala_de_aula'] = $this->input->post('id_sala');
        $data['id_horario'] = $this->input->post('id_horario');
        $data['id_estado'] = 1;
        $data['turma_nome'] = $this->input->post('nome');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');
        
        $inicio = $this->input->post('inicio');
        $fim = $this->input->post('fim');
        
        $data['inicio_ano'] = str_split($inicio, 4)[0];
        $data['inicio_mes'] = str_split($inicio)[5].str_split($inicio)[6];
        $data['inicio_dia'] = str_split($inicio, 2)[4];
        $data['fim_ano'] = str_split($fim, 4)[0];
        $data['fim_mes'] = str_split($fim)[5].str_split($fim)[6];
        $data['fim_dia'] = str_split($fim, 2)[4];
        
        

        $this->load->model('Log_Model', 'log_model');
        $sms = 'editou a turma ' . $data['turma_nome'] . ' no sistema';
        $this->log_model->adicionar('Editar', $sms);

        $this->db->where('id_turma', $id);
        return $this->db->update('turma', $data);
    }

    function fichaAluno($id_aluno, $id_turma) {
        $this->db->where('aluno.id_aluno', $id_aluno);
        $this->db->where('turma_aluno.id_turma', $id_turma);
        $this->db->join('turma_aluno', 'turma_aluno.id_aluno=aluno.id_aluno');
        $this->db->join('turma', 'turma.id_turma=turma_aluno.id_turma');
        $this->db->join('horario', 'horario.id_horario=turma.id_horario');
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $dados['aluno'] = $this->db->get('aluno')->result();
        
        $this->db->where('id_aluno', $id_aluno);
        $this->db->join('curso_aluno', 'curso_aluno.id_curso=curso.id_curso');
        $dados['cursos'] = $this->db->get('curso')->result();

        $msg = $this->load->view('pdf/ficha_inscricao', $dados, true);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin-left' => 50]);
        $html = $msg;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

}
