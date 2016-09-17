<?php

class NomeUsuario extends Componentes {

    public function set(Resultado $resultado) {
        $box = $this->getBox($resultado->getArquivo());
   
        $box->setFontFace(FONTS."{$resultado->getAplicativo()->getComponentes()['NomeUsuario']['fonte']}.ttf");
        $box->setFontSize($resultado->getAplicativo()->getComponentes()['NomeUsuario']['tamanho']);
        $rgb = Utilitario::hex2rgb($resultado->getAplicativo()->getComponentes()['NomeUsuario']['cor']);
        $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
        $box->setBox((int) $resultado->getAplicativo()->getComponentes()['NomeUsuario']['x'], (int) $resultado->getAplicativo()->getComponentes()['NomeUsuario']['y'], (int) $resultado->getAplicativo()->getComponentes()['NomeUsuario']['w'], (int) $resultado->getAplicativo()->getComponentes()['NomeUsuario']['h']);
     
        $box->setTextAlign($resultado->getAplicativo()->getComponentes()['NomeUsuario']['alinhamento'][0], $resultado->getAplicativo()->getComponentes()['NomeUsuario']['alinhamento'][1]);
        $box->draw($resultado->getUsuario()->getNome(array(
            "tipo"=>$resultado->getAplicativo()->getComponentes()['NomeUsuario']['tipo_do_nome']
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


