<?php

class BarraDePorcentagemComTexto extends Componentes {

    public function set(Resultado $resultado) {
        foreach ($resultado->getAplicativo()->getComponentes()['BarraDePorcentagemComTexto'] as $barra) {

            /*
             * =====================  Barra de porcentagem
             */
            $temp = CACHE . md5(uniqid(rand(0, 10000))) . ".png";
            $variacao = rand($barra['variacao'][0], $barra['variacao'][1]);
            $this->getCanvas()->hexa($barra['cor_barra'])
                    ->novaImagem($barra['w_barra'] * ($variacao / 100), $barra['h_barra'])->grava($temp);

            $marca = $this->getCanvas();
            $marca->carrega($resultado->getArquivo());
            $marca->marca($temp, (int) $barra['x_barra'], (int) $barra['y_barra']);
            $marca->grava($resultado->getArquivo());
            unlink($temp);


            /*
             * ======================= Texto de porcentagem
             */
            $box = $this->getBox($resultado->getArquivo());
            $box->setFontFace(FONTS."{$barra['fonter_texto']}.ttf");
            $box->setFontSize($barra['tamanhor_texto']);
            $rgb = Utilitario::hex2rgb($barra['cor_texto']);
            $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
            $box->setBox((int) $barra['x_texto'], (int) $barra['y_texto'], (int) $barra['w_texto'], (int) $barra['h_texto']);
            $box->setTextAlign($barra['alinhamentor_texto'][0], $barra['alinhamentor_texto'][1]);
            $box->draw($variacao . "%");
            imagejpeg($box->im, $resultado->getArquivo(), 100);
        }
    }

    public function convert($dados) {
        $returno = array();
        $i = 0;
        foreach ($dados->barra_de_porcentagem_com_texto as $barra) {
            $returno['BarraDePorcentagemComTexto'][$i] = (array) $barra;
            $returno['BarraDePorcentagemComTexto'][$i]['alinhamentor_texto'] = explode(", ", $returno['BarraDePorcentagemComTexto'][$i]['alinhamentor_texto']);
            $returno['BarraDePorcentagemComTexto'][$i]['variacao'] = explode(" - ", $returno['BarraDePorcentagemComTexto'][$i]['variacao']);
            $i++;
        }
        return $returno;
    }

}
