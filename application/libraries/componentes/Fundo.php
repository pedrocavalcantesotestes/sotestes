<?php

class Fundo extends Componentes {

    public function set(Resultado $resultado) {

        $fundos = $resultado->getAplicativo()->getComponentes()['Fundo'];

        $fundos_validos = array();

        foreach ($fundos as $f) {
            if (!isset($f['sexo']) || $f['sexo'] == 'todos' || $f['sexo'] == $resultado->getUsuario()->getSexo()) {
                $fundos_validos[] = $f;
            }
        }
       

        $fundo = $fundos_validos[$this->getIdRandom($resultado, "fundo", $fundos_validos)];

        $this->getCanvas()->carrega($fundo['imagem'])->grava($resultado->getArquivo());

        $resultado->setTitulo($fundo['titulo']);
        $resultado->setTexto($fundo['texto']);

        if (isset($fundo['grupo_de_texto']) && count($fundo['grupo_de_texto']) > 0) {
            $textos = new GrupoDeTexto();
            
            $textos->setForFundo($resultado, $fundo['grupo_de_texto']['GrupoDeTexto']);
        }
    }

    public function convert($dados) {
        $returno = array();
        $i = 0;
        foreach ($dados->fundos as $fundo) {
            $fundo = (array) $fundo;
            $returno['Fundo'][$i] = $fundo;
            if (isset($fundo['grupo_de_texto']) && count($fundo['grupo_de_texto']) > 0) {
                $texto = new GrupoDeTexto();
                $returno['Fundo'][$i]['grupo_de_texto'] = $texto->convert((object) $fundo);
            }
            $i++;
        }
        return $returno;
    }

}
