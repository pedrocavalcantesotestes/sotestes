<?php

class NomeAmigo extends Componentes {

    public function set(Resultado $resultado) {
        $box = $this->getBox($resultado->getArquivo());

        $box->setFontFace(FONTS . "{$resultado->getAplicativo()->getComponentes()['NomeAmigo']['fonte']}.ttf");
        $box->setFontSize($resultado->getAplicativo()->getComponentes()['NomeAmigo']['tamanho']);
        $rgb = Utilitario::hex2rgb($resultado->getAplicativo()->getComponentes()['NomeAmigo']['cor']);
        $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
        $box->setBox((int) $resultado->getAplicativo()->getComponentes()['NomeAmigo']['x'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo']['y'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo']['w'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo']['h']);

        $box->setTextAlign($resultado->getAplicativo()->getComponentes()['NomeAmigo']['alinhamento'][0], $resultado->getAplicativo()->getComponentes()['NomeAmigo']['alinhamento'][1]);
        $box->draw($resultado->getUsuario()->getAmigo()->getNome(array(
                    "tipo" => $resultado->getAplicativo()->getComponentes()['NomeAmigo']['tipo_do_nome']
        )));
        imagealphablending($box->im, false);
        imagesavealpha($box->im, true);
        imagepng($box->im, $resultado->getArquivo(), 9);
    }

    public function convert($dados) {
        $com = $dados->qual_componente;
        $retorno = parent::convert($dados);
        $retorno[$com]['alinhamento'] = explode(", ", $retorno[$com]['alinhamento']);
        return $retorno;
    }

}

class NomeAmigo2 extends Componentes {

    public function set(Resultado $resultado) {
        $box = $this->getBox($resultado->getArquivo());

        $box->setFontFace(FONTS . "{$resultado->getAplicativo()->getComponentes()['NomeAmigo2']['fonte']}.ttf");
        $box->setFontSize($resultado->getAplicativo()->getComponentes()['NomeAmigo2']['tamanho']);
        $rgb = Utilitario::hex2rgb($resultado->getAplicativo()->getComponentes()['NomeAmigo2']['cor']);
        $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
        $box->setBox((int) $resultado->getAplicativo()->getComponentes()['NomeAmigo2']['x'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo2']['y'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo2']['w'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo2']['h']);

        $box->setTextAlign($resultado->getAplicativo()->getComponentes()['NomeAmigo2']['alinhamento'][0], $resultado->getAplicativo()->getComponentes()['NomeAmigo2']['alinhamento'][1]);
        $box->draw($resultado->getUsuario()->getAmigo2()->getNome(array(
                    "tipo" => $resultado->getAplicativo()->getComponentes()['NomeAmigo2']['tipo_do_nome']
        )));
        imagealphablending($box->im, false);
        imagesavealpha($box->im, true);
        imagepng($box->im, $resultado->getArquivo(), 9);
    }

    public function convert($dados) {
        $com = $dados->qual_componente;
        $retorno = parent::convert($dados);
        $retorno[$com]['alinhamento'] = explode(", ", $retorno[$com]['alinhamento']);
        return $retorno;
    }

}

class NomeAmigo3 extends Componentes {

    public function set(Resultado $resultado) {
        $box = $this->getBox($resultado->getArquivo());

        $box->setFontFace(FONTS . "{$resultado->getAplicativo()->getComponentes()['NomeAmigo3']['fonte']}.ttf");
        $box->setFontSize($resultado->getAplicativo()->getComponentes()['NomeAmigo3']['tamanho']);
        $rgb = Utilitario::hex2rgb($resultado->getAplicativo()->getComponentes()['NomeAmigo3']['cor']);
        $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
        $box->setBox((int) $resultado->getAplicativo()->getComponentes()['NomeAmigo3']['x'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo3']['y'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo3']['w'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo3']['h']);

        $box->setTextAlign($resultado->getAplicativo()->getComponentes()['NomeAmigo3']['alinhamento'][0], $resultado->getAplicativo()->getComponentes()['NomeAmigo3']['alinhamento'][1]);
        $box->draw($resultado->getUsuario()->getAmigo3()->getNome(array(
                    "tipo" => $resultado->getAplicativo()->getComponentes()['NomeAmigo3']['tipo_do_nome']
        )));
        imagealphablending($box->im, false);
        imagesavealpha($box->im, true);
        imagepng($box->im, $resultado->getArquivo(), 9);
    }

    public function convert($dados) {
        $com = $dados->qual_componente;
        $retorno = parent::convert($dados);
        $retorno[$com]['alinhamento'] = explode(", ", $retorno[$com]['alinhamento']);
        return $retorno;
    }

}

class NomeAmigo4 extends Componentes {

    public function set(Resultado $resultado) {
        $box = $this->getBox($resultado->getArquivo());

        $box->setFontFace(FONTS . "{$resultado->getAplicativo()->getComponentes()['NomeAmigo4']['fonte']}.ttf");
        $box->setFontSize($resultado->getAplicativo()->getComponentes()['NomeAmigo4']['tamanho']);
        $rgb = Utilitario::hex2rgb($resultado->getAplicativo()->getComponentes()['NomeAmigo4']['cor']);
        $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
        $box->setBox((int) $resultado->getAplicativo()->getComponentes()['NomeAmigo4']['x'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo4']['y'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo4']['w'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo4']['h']);

        $box->setTextAlign($resultado->getAplicativo()->getComponentes()['NomeAmigo4']['alinhamento'][0], $resultado->getAplicativo()->getComponentes()['NomeAmigo4']['alinhamento'][1]);
        $box->draw($resultado->getUsuario()->getAmigo4()->getNome(array(
                    "tipo" => $resultado->getAplicativo()->getComponentes()['NomeAmigo4']['tipo_do_nome']
        )));
        imagealphablending($box->im, false);
        imagesavealpha($box->im, true);
        imagepng($box->im, $resultado->getArquivo(), 9);
    }

    public function convert($dados) {
        $com = $dados->qual_componente;
        $retorno = parent::convert($dados);
        $retorno[$com]['alinhamento'] = explode(", ", $retorno[$com]['alinhamento']);
        return $retorno;
    }

}

class NomeAmigo5 extends Componentes {

    public function set(Resultado $resultado) {
        $box = $this->getBox($resultado->getArquivo());

        $box->setFontFace(FONTS . "{$resultado->getAplicativo()->getComponentes()['NomeAmigo5']['fonte']}.ttf");
        $box->setFontSize($resultado->getAplicativo()->getComponentes()['NomeAmigo5']['tamanho']);
        $rgb = Utilitario::hex2rgb($resultado->getAplicativo()->getComponentes()['NomeAmigo5']['cor']);
        $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
        $box->setBox((int) $resultado->getAplicativo()->getComponentes()['NomeAmigo5']['x'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo5']['y'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo5']['w'], (int) $resultado->getAplicativo()->getComponentes()['NomeAmigo5']['h']);

        $box->setTextAlign($resultado->getAplicativo()->getComponentes()['NomeAmigo5']['alinhamento'][0], $resultado->getAplicativo()->getComponentes()['NomeAmigo5']['alinhamento'][1]);
        $box->draw($resultado->getUsuario()->getAmigo5()->getNome(array(
                    "tipo" => $resultado->getAplicativo()->getComponentes()['NomeAmigo5']['tipo_do_nome']
        )));
        imagealphablending($box->im, false);
        imagesavealpha($box->im, true);
        imagepng($box->im, $resultado->getArquivo(), 9);
    }

    public function convert($dados) {
        $com = $dados->qual_componente;
        $retorno = parent::convert($dados);
        $retorno[$com]['alinhamento'] = explode(", ", $retorno[$com]['alinhamento']);
        return $retorno;
    }

}
