<?php

class Home extends CI_Controller {

    public function index() {

        $this->load->view(Cliente::getCliente()->getTema()."/header", array(
            "tipo" => "chamada",
            "facebook" => array(
                "url" => "",
                "titulo" => "",
                "descricao" => "",
                "imagem" => ""
            ),
            "titulo" => Cliente::getCliente()->getTitulo() . " - Sua diversão garantida"
        ));
        $this->load->view(Cliente::getCliente()->getTema()."/index");
        $this->load->view(Cliente::getCliente()->getTema()."/footer");
    }

    public function get($page = 0) {
        $apps = Aplicativo::getListaDeAplicativos(array(
                    "limit" => 15,
                    "offset" => $page
        ));
        
        $array_apps = array();
        foreach ($apps as $app) {
            $array_apps[] = array(
                "titulo" => $app->getTitulo(),
                "imagem" => $app->getImagemChamada(),
                "url" => $app->getURL()
            );
        }

        return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($array_apps));
    }

    public function votar() {
        $person = $_POST['person'];
        $teste = $_POST['teste'];
        $result = $_POST['result'];

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $send = '';

        $javotou = Votos::jaVotou($teste, $result);

        if(!$javotou) {
            file_put_contents(STORAGE_ONLINE . "votos/".$teste."/".$result."/".$person."/".$ip, $send);
            return true;
        }
    }

}
