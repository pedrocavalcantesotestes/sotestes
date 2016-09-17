<?php

interface Componente {

    public function set(Resultado $resultado);

    public function convert($dados);
}

class Componentes implements Componente {

    private $canvas;
    private $box;

    protected function getCanvas() {
        if (!is_object($this->canvas)) {
            $this->canvas = new Canvas;
        }
        return $this->canvas;
    }

    protected function getBox($imagem) {
        $img = $this->criaImagem($imagem);
        return new Box($img);
    }

    private function criaImagem($imagem) {
        $imagem = Utilitario::urlToFile($imagem);
        switch (getimagesize($imagem)[2]) {
            case 1:
                return imagecreatefromgif($imagem);
                break;
            case 2:
                return imagecreatefromjpeg($imagem);
                break;
            case 3:
                return imagecreatefrompng($imagem);
                break;
            case 6:
                return imagecreatefrombmp($imagem);
                break;
            default:
                trigger_error('Arquivo inválido!', E_USER_ERROR);
                break;
        }
    }

    public function convert($dados) {
        $returno = array();
        $com = $dados->qual_componente;
        unset($dados->qual_componente);
        foreach ($dados as $key => $val) {
            if (!empty($val)) {
                $returno[$com][$key] = $val;
            }
        }
        return $returno;
    }

    public function set(Resultado $resultado) {
        return null;
    }

    protected function getIdRandom(Resultado $r, $nome, $elementos) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $nome = $nome . $r->getAplicativo()->getNameID();
        if (!isset($_SESSION[$nome]) || $_SESSION[$nome] == 0) {
            $_SESSION[$nome] = "";
        }
        $usados = explode("-", $_SESSION[$nome]);
        if (count($usados) >= count($elementos)) {
            $usados = array();
            unset($_SESSION[$nome]);
        }

        $novo = false;
        do {
            $id = rand(0, count($elementos) - 1);
            if (array_search($id, $usados) !== FALSE) {
                $novo = true;
            } else {
                $novo = false;
            }
        } while ($novo && count($usados) > 0);

        $_SESSION[$nome] = $id . (isset($_SESSION[$nome]) && !empty($_SESSION[$nome]) && count($usados) > 0 ? "-" . $_SESSION[$nome] : '');
    

        return $id;
    }

}
