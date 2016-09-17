<?php

class Destaques extends CI_Controller {

    public function index() {
        $this->load->view(Cliente::getCliente()->getTema() . "/header", array(
            "tipo" => "chamada",
            "facebook" => array(
                "url" => "",
                "titulo" => "",
                "descricao" => "",
                "imagem" => ""
            ),
            "titulo" => "Destaques - " . Cliente::getCliente()->getTitulo()
        ));
        $this->load->view(Cliente::getCliente()->getTema() . "/destaques");
        $this->load->view(Cliente::getCliente()->getTema() . "/footer");
    }

}
