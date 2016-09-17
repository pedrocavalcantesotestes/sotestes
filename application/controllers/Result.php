<?php

class Result extends CI_Controller {

    public function index($nomeAPP, $nomeResult, $share = '') {
        session_start();

        $this->load->helper('cookie');
        $resultado = new Resultado();
        $resultado = $resultado->get($nomeAPP, $nomeResult);
  
        if ($resultado === FALSE) {
            redirect("/a/{$nomeAPP}");
            exit;
        }

        if (isset($_COOKIE["acessar_{$resultado->getId()}"]) || $resultado->getAplicativo()->getVotar()[0] == "votar") {
            $this->load->view(Cliente::getCliente()->getTema()."/header", array(
                "tipo" => "resultado",
                "facebook" => array(
                    "url" => $resultado->getURL(),
                    "titulo" => $resultado->getTitulo(),
                    "descricao" => $resultado->getTexto(),
                    "imagem" => $resultado->getImagemResultado()
                ),
                "titulo" => $resultado->getTitulo() . " - " . Cliente::getCliente()->getTitulo()
            ));
            $this->load->view(Cliente::getCliente()->getTema()."/chamada", array(
                "imagem" => $resultado->getImagemResultado(),
                "titulo" => $resultado->getTitulo(),
                "texto" => $resultado->getTexto(),
                "resultado" => $resultado
            ));
        } else {
            $this->load->view(Cliente::getCliente()->getTema()."/header", array(
                "tipo" => "chamada",
                "facebook" => array(
                    "url" => $resultado->getURL(),
                    "titulo" => $resultado->getAplicativo()->getTituloCompartilhamento(),
                    "descricao" => $resultado->getAplicativo()->getTextoCompartilhamento(),
                    "imagem" => $resultado->getImagemResultado()
                ),
                "titulo" => "{$resultado->getUsuario()->getNome()} - " . $resultado->getAplicativo()->getTitulo() . " - " . Cliente::getCliente()->getTitulo()
            ));
            $this->load->view(Cliente::getCliente()->getTema()."/chamada", array(
                "imagem" => $resultado->getAplicativo()->getImagemInterna(),
                "titulo" => $resultado->getAplicativo()->getTitulo(),
                "texto" => $resultado->getAplicativo()->getTexto(),
                "app" => $resultado->getAplicativo(),
                "resultado" => $resultado,
                'share' => "sim"
            ));
        }
        $this->load->view(Cliente::getCliente()->getTema()."/footer");
    }

    public function gerar($nome) {

        $app = Aplicativo::get($nome);

        $usuario = new Usuario();
        $usuario->setUsuarioFromJSON($_POST['usuario']);
        if (isset($_POST['amigo'])) {
            if (isset(json_decode($_POST['usuario'])->friends) && count(json_decode($_POST['usuario'])->friends->data) > 0) {
                $existe = false;
                foreach (json_decode($_POST['usuario'])->friends->data as $amigo) {
                    if ($amigo->id == $_POST['amigo']) {
                        $usuario->setAmigo($amigo->id, $amigo->name, $amigo->picture->data->url, $amigo->gender);
                        $existe = true;
                    }
                }
                if($existe == false)
                    $usuario->setAmigo('499717083554615', 'FbTests', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpf1/v/t1.0-1/c21.26.160.160/p200x200/13906802_499717713554552_1953069283599884270_n.png?oh=eb4ed80ece7e4f2f87aa779761dc8846&oe=5851F54E&__gda__=1478493208_02b228563931225a61bd0124d1593401', 'male');
            }
        }
        if (isset($_POST['amigo2'])) {
            if (isset(json_decode($_POST['usuario'])->friends) && count(json_decode($_POST['usuario'])->friends->data) > 0) {
                $existe = false;
                foreach (json_decode($_POST['usuario'])->friends->data as $amigo) {
                    if ($amigo->id == $_POST['amigo2']) {
                        $usuario->setAmigo2($amigo->id, $amigo->name, $amigo->picture->data->url, $amigo->gender);
                        $existe = true;
                    }
                }
                if($existe == false)
                    $usuario->setAmigo2('499717083554615', 'FbTests', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpf1/v/t1.0-1/c21.26.160.160/p200x200/13906802_499717713554552_1953069283599884270_n.png?oh=eb4ed80ece7e4f2f87aa779761dc8846&oe=5851F54E&__gda__=1478493208_02b228563931225a61bd0124d1593401', 'male');
            }
        }
        if (isset($_POST['amigo3'])) {
            if (isset(json_decode($_POST['usuario'])->friends) && count(json_decode($_POST['usuario'])->friends->data) > 0) {
                $existe = false;
                foreach (json_decode($_POST['usuario'])->friends->data as $amigo) {
                    if ($amigo->id == $_POST['amigo3']) {
                        $usuario->setAmigo3($amigo->id, $amigo->name, $amigo->picture->data->url, $amigo->gender);
                        $existe = true;
                    }
                }
                if($existe == false)
                    $usuario->setAmigo3('499717083554615', 'Gêmeos', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xaf1/v/t1.0-1/p160x160/11760222_1619598314975587_6763040518143120843_n.png?oh=68d04a778b67093e2c22246190852a1e&oe=5816E74C&__gda__=1481903751_a46458bd34e6f523090b574c354af389', 'male');
            }
        }
        if (isset($_POST['amigo4'])) {
            if (isset(json_decode($_POST['usuario'])->friends) && count(json_decode($_POST['usuario'])->friends->data) > 0) {
                $existe = false;
                foreach (json_decode($_POST['usuario'])->friends->data as $amigo) {
                    if ($amigo->id == $_POST['amigo4']) {
                        $usuario->setAmigo4($amigo->id, $amigo->name, $amigo->picture->data->url, $amigo->gender);
                        $existe = true;
                    }
                }
                if($existe == false)
                    $usuario->setAmigo4('499717083554615', 'Escorpião', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p160x160/11202860_1079789598717108_6533744607815079325_n.png?oh=dc26b6d3379114fdaa16d83c27bfcd46&oe=58200D4D&__gda__=1478567858_2621143a3eceb7e9e5ebf4928c49f520', 'male');
            }
        }
        if (isset($_POST['amigo5'])) {
            if (isset(json_decode($_POST['usuario'])->friends) && count(json_decode($_POST['usuario'])->friends->data) > 0) {
                $existe = false;
                foreach (json_decode($_POST['usuario'])->friends->data as $amigo) {
                    if ($amigo->id == $_POST['amigo5']) {
                        $usuario->setAmigo5($amigo->id, $amigo->name, $amigo->picture->data->url, $amigo->gender);
                        $existe = true;
                    }
                }
                if($existe == false)
                    $usuario->setAmigo5('499717083554615', 'Leão', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p160x160/11202860_1079789598717108_6533744607815079325_n.png?oh=dc26b6d3379114fdaa16d83c27bfcd46&oe=58200D4D&__gda__=1478567858_2621143a3eceb7e9e5ebf4928c49f520', 'male');
            }
        }

        $result = new Resultado();
        $result->setAplicativo($app);
        $result->setUsuario($usuario);
        $result->gerar();
        $result->salvar();
        //sleep(3);
        return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode(array(
                            "titulo" => $result->getTitulo(),
                            "texto" => $result->getTexto(),
                            "imagem" => $result->getImagemResultado(),
                            "url" => $result->getURL(),
                            "id" => $result->getId()
        )));
    }

}
