<?php

class Qualidade extends Componentes {

    public function set(Resultado $resultado) {
        $resultado->jpgArquivo();
        $this->getCanvas()->carrega(str_replace(".jpg", "", $resultado->getArquivo()))->grava($resultado->getArquivo(), 80);
    
        unlink(str_replace(".jpg", "", $resultado->getArquivo()));
        foreach($_SESSION['lixo'] as $lixo){
            if(file_exists($lixo)){
                unlink($lixo);
            }
        }
    }

    public function convert($dados) {
        return $dados;
    }

}
