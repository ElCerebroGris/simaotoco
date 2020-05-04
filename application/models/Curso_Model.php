<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Curso_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function relatorio_mensal($inicio, $fim) {

        $ano1 = str_split($inicio, 4)[0];
        $mes1 = str_split($inicio)[5].str_split($inicio)[6];
        $dia1 = str_split($inicio, 2)[4];
        $ano2 = str_split($fim, 4)[0];
        $mes2 = str_split($fim)[5].str_split($fim)[6];
        $dia2 = str_split($fim, 2)[4];
        
        $dados['inicio'] = $dia1.'-'.$mes1.'-'.$ano1;
        $dados['fim'] = $dia2.'-'.$mes2.'-'.$ano2;

        $this->db->where('turma.fim_dia <=', $dia2);
        $this->db->where('turma.fim_mes <=', $mes2);
        $this->db->where('turma.fim_ano <=', $ano2);
        $this->db->where('turma.inicio_dia >=', $dia1);
        $this->db->where('turma.inicio_mes >=', $mes1);
        $this->db->where('turma.inicio_ano >=', $ano1);
        $this->db->join('turma', 'turma.id_curso=curso.id_curso');
        $this->db->join('turma_aluno', 'turma_aluno.id_turma=turma.id_turma');
        $dados['cursos'] = $this->db->get('curso')->result();

        for ($x = 0; $x < count($dados['cursos']); ++$x) {
            $id = $dados['cursos'][$x]->id_curso;

            //Todos os alunos
            $this->db->where('turma.id_curso', $id);
            $this->db->where('turma.fim_dia <=', $dia2);
            $this->db->where('turma.fim_mes <=', $mes2);
            $this->db->where('turma.fim_ano <=', $ano2);
            $this->db->where('turma.inicio_dia >=', $dia1);
            $this->db->where('turma.inicio_mes >=', $mes1);
            $this->db->where('turma.inicio_ano >=', $ano1);
            $this->db->join('turma_aluno', 'turma_aluno.id_aluno=aluno.id_aluno');
            $this->db->join('turma', 'turma.id_turma=turma_aluno.id_turma');
            $this->db->group_by('aluno.id_aluno');
            $dados['aluno'] = $this->db->get('aluno')->result();
            $dados['cursos'][$x]->quant = count($dados['aluno']);

            //Só os alunos Masculino
            $this->db->where('aluno.sexo', 'M');
            $this->db->where('turma.id_curso', $id);
            $this->db->where('turma.fim_dia <=', $dia2);
            $this->db->where('turma.fim_mes <=', $mes2);
            $this->db->where('turma.fim_ano <=', $ano2);
            $this->db->where('turma.inicio_dia >=', $dia1);
            $this->db->where('turma.inicio_mes >=', $mes1);
            $this->db->where('turma.inicio_ano >=', $ano1);
            $this->db->group_by('aluno.id_aluno');
            $this->db->join('turma_aluno', 'turma_aluno.id_aluno=aluno.id_aluno');
            $this->db->join('turma', 'turma.id_turma=turma_aluno.id_turma');
            $dados['aluno'] = $this->db->get('aluno')->result();
            $dados['cursos'][$x]->quantM = count($dados['aluno']);

            //Só os alunos Femeninos
            $this->db->where('aluno.sexo', 'F');
            $this->db->where('turma.id_curso', $id);
            $this->db->where('turma.fim_dia <=', $dia2);
            $this->db->where('turma.fim_mes <=', $mes2);
            $this->db->where('turma.fim_ano <=', $ano2);
            $this->db->where('turma.inicio_dia >=', $dia1);
            $this->db->where('turma.inicio_mes >=', $mes1);
            $this->db->where('turma.inicio_ano >=', $ano1);
            $this->db->group_by('aluno.id_aluno');
            $this->db->join('turma_aluno', 'turma_aluno.id_aluno=aluno.id_aluno');
            $this->db->join('turma', 'turma.id_turma=turma_aluno.id_turma');
            $dados['aluno'] = $this->db->get('aluno')->result();
            $dados['cursos'][$x]->quantF = count($dados['aluno']);
        }

        $msg = $this->load->view('pdf/relatorio_mensal', $dados, true);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin-left' => 50]);
        $html = $msg;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function mapa_mensal($mes, $ano) {
        $dados = array();
        $msg = $this->load->view('pdf/relatorio_mensal', $dados, true);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin-left' => 50]);
        $html = $msg;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function adicionar() {
        $data['curso_nome'] = $this->input->post('nome');
        $data['curso_codigo'] = $this->input->post('codigo');
        $data['curso_preco'] = $this->input->post('preco');
        //$data['duracao'] = $this->input->post('duracao');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');

        $this->load->model('Log_Model', 'log_model');
        $sms = 'adicionou o curso ' . $data['curso_nome'] . ' no sistema';
        $this->log_model->adicionar('Adicionar', $sms);

        return $this->db->insert('curso', $data);
    }

}
