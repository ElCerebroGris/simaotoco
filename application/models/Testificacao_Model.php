<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class testificacao_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function ver($id) {
        $this->db->where('testificacao_id', $id);
        
        $this->db->join('membro', 'membro.membro_id=testificacao.membro_id');
        $this->db->join('categoria', 'categoria.categoria_id=membro.categoria_id');
        $this->db->join('funcao', 'funcao.funcao_id=membro.funcao_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('usuario', 'usuario.usuario_id=testificacao.usuario_id');
        $dados['documentos'] = $this->db->get('testificacao')->result();

        for ($c = 0; $c < count($dados['documentos']); $c++) {
            $tipo = $dados['documentos'][$c]->origem_tipo;
            $origem_ref = $dados['documentos'][$c]->origem_referencia;
            $dado = $this->getDado($tipo, $origem_ref);
            $dados['documentos'][$c]->origem_descricao = $dado;

            $tipo = $dados['documentos'][$c]->destino_tipo;
            $destino_ref = $dados['documentos'][$c]->destino_referencia;
            $dado = $this->getDado($tipo, $destino_ref);
            $dados['documentos'][$c]->destino_descricao = $dado;

        }
        return $dados['documentos'][0];

    }

    function listar() {
        $this->db->join('membro', 'membro.membro_id=testificacao.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('usuario', 'usuario.usuario_id=testificacao.usuario_id');
        $dados['documentos'] = $this->db->get('testificacao')->result();

        for ($c = 0; $c < count($dados['documentos']); $c++) {
            $tipo = $dados['documentos'][$c]->origem_tipo;
            $origem_ref = $dados['documentos'][$c]->origem_referencia;
            $dado = $this->getDado($tipo, $origem_ref);
            $dados['documentos'][$c]->origem_descricao = $dado;

            $tipo = $dados['documentos'][$c]->destino_tipo;
            $destino_ref = $dados['documentos'][$c]->destino_referencia;
            $dado = $this->getDado($tipo, $destino_ref);
            $dados['documentos'][$c]->destino_descricao = $dado;

        }

        return $dados['documentos'];

    }

    public function getDado($tipo, $referencia)
    {
        $dado = 'Vazio';

        switch ($tipo) {
            case 'PAROQUIA':
                $this->db->where('paroquia_id', $referencia);
                $dados['paroquias'] = $this->db->get('paroquia')->result();
                $dado = $dados['paroquias'][0]->descricao_paroquia;
                break;
            case 'PROVINCIA ECLESIASTICA':
                $this->db->where('provincia_eclesiastica_id', $referencia);
                $dados['provincia_eclesiastica'] = $this->db->get('provincia_eclesiastica')->result();
                $dado = $dados['provincia_eclesiastica'][0]->descricao_provincia_eclesiastica;
                break;
            case 'IGREJA NACIONAL':
                $this->db->where('igreja_nacional_id', $referencia);
                $dados['igreja_nacional'] = $this->db->get('igreja_nacional')->result();
                $dado = $dados['igreja_nacional'][0]->descricao_igreja_nacional;
                break;
        }
        return $dado;
    }

}
