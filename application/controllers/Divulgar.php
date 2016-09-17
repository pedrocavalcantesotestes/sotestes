<?php

class Divulgar extends CI_Controller {

    public function index() {
        if (isset($_POST['nomeId'])) {

            $aplicativo = Aplicativo::get($_POST['nomeId']);
            $aplicativo->setStatus('divulgado');
            $aplicativo->salvar();

            return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(200)
                            ->set_output(json_encode(array(
                                "url" => base_url("/home/divulgar/")
            )));
            exit;
        }
        $this->load->view(Cliente::getCliente()->getTema() . "/header", array(
            "tipo" => "chamada",
            "facebook" => array(
                "url" => "",
                "titulo" => "",
                "descricao" => "",
                "imagem" => ""
            ),
            "titulo" => "Divulgação - " . Cliente::getCliente()->getTitulo()
        ));
        $this->load->view(Cliente::getCliente()->getTema() . "/divulgar");
        $this->load->view(Cliente::getCliente()->getTema() . "/footer");
    }

    public function getPaginas() {
        return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode(Cliente::getCliente()->getPaginas()));
    }

    public function getAplicativo($id) {
        $app = Aplicativo::get($id);
        return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode(array(
                            "titulo" => $app->getTitulo(),
                            "texto" => $app->getTexto(),
                            "url" => $app->getURL()
        )));
    }

}
