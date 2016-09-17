<?php

class App extends CI_Controller {

    public function index($nome) {
        if (ENVIRONMENT == 'testing') {
            $this->output->enable_profiler(TRUE);
        }

        $app = Aplicativo::get($nome);
   
        if ($app == false) {
            redirect("/");
            exit;
        }
        $this->load->view(Cliente::getCliente()->getTema()."/header", array(
            "tipo" => "chamada",
            "facebook" => array(
                "url" => $app->getURL(),
                "titulo" => $app->getTitulo(),
                "descricao" => $app->getTexto(),
                "imagem" => $app->getImagemInterna()
            ),
            "titulo" => $app->getTitulo() . " - ".Cliente::getCliente()->getTitulo()
        ));
        $this->load->view(Cliente::getCliente()->getTema()."/chamada", array(
            "imagem" => $app->getImagemInterna(),
            "titulo" => $app->getTitulo(),
            "texto" => $app->getTexto(),
            "app" => $app
        ));
        $this->load->view(Cliente::getCliente()->getTema()."/footer");
    }

}
