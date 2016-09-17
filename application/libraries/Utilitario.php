<?php

class Utilitario {

    public static function urlToFile($url) {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            if (is_file($url) && file_exists($url)) {
                return $url;
            } else {
                echo " '{$url}' tipo de URL invalida!  ou arquivo não existe\n";
                exit;
            }
        } else {
            $nome = md5($url.uniqid(rand(0, 1000))) . "." . pathinfo(parse_url($url)['path'], PATHINFO_EXTENSION);
            $file = $_SERVER['DOCUMENT_ROOT'] . "/cache/{$nome}";
            if (!file_exists($file)) {
                file_put_contents($file, static::downloadURL($url));
            }
            @session_start();
            $_SESSION['lixo'][] = $file;
            return $file;
        }
    }

    public static function downloadURL($url) {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        return file_get_contents($url, false, stream_context_create($arrContextOptions));
    }

    public static function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
       
        return $rgb; 
    }

}
