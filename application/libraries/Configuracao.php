<?php

class Configuracao {

    private $nameCliente = NULL;


    public static function setUrlValid() {
        $url = str_replace(array("http://", "www.", "/"), "", Cliente::getCliente()->getNome()); 
        if ($_SERVER['HTTP_HOST'] != $url) {
            header("Location: http://{$url}{$_SERVER['REQUEST_URI']}");
            exit;
        }
    }


}
