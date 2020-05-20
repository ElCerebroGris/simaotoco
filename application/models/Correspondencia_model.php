<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Correspondencia_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();
    }

    public function listar()
    {

        $this->db->join('usuario', 'usuario.usuario_id=correspondencia.usuario_id');
        $this->db->join('membro', 'membro.membro_id=usuario.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['documentos'] = $this->db->get('correspondencia')->result();

        for ($x = 0; $x < count($dados['documentos']); ++$x) {
            $tipo = $dados['documentos'][$x]->destino_tipo;
            $destino = $dados['documentos'][$x]->destino;
            switch ($tipo) {
                case 2:
                    $this->db->where('paroquia_id', $destino);
                    $dados['paroquias'] = $this->db->get('paroquia')->result();
                    $dados['documentos'][$x]->destino_descricao = $dados['paroquias'][0]->descricao_paroquia;
                    break;
                default:
                    $dados['documentos'][$x]->destino_descricao = 'Todos';
            }
        }

        return $dados['documentos'];

    }

    public function add()
    {
        $destinos = $this->input->post('destinos');
        $data['obs'] = $this->input->post('obs');
        $data['destino_tipo'] = $this->input->post('destino_tipo');
        $data['usuario_id'] = $this->session->userdata('id_usuario');

        if ($this->do_upload()) {
            $data['doc_url'] = $this->session->userdata('ficheiro');

            $this->db->trans_start();
            foreach ($destinos as $key) {
                $data['destino'] = $key;
                if (!$this->db->insert('correspondencia', $data)) {
                    return false;
                }
            }
            $this->db->trans_complete();

            $this->session->unset_userdata('ficheiro');
            return true;
        }
        unlink('./docs/' . $this->session->userdata('ficheiro'));
        return false;
    }

    public function do_upload()
    {
        if (!file_exists("./docs/")) {
            mkdir('./docs/');
        }
        // load codeigniter helpers
        $this->load->helper(array('form', 'url'));

        $config['upload_path'] = './docs/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = time();

        //$this->load->library('upload', $config);

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('doc')) {
            //echo $this->upload->display_errors('<p>', '</p>');
        } else {
            $name = $this->upload->data('file_name');
            $this->session->set_userdata('ficheiro', $name);
            return true;
        }
    }

}
