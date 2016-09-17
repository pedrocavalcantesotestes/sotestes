<?php

class GrupoDeTexto extends Componentes {

    public function set(Resultado $resultado) {
        $grupos = $resultado->getAplicativo()->getComponentes()['GrupoDeTexto'];

        $this->setForFundo($resultado, $grupos);
    }

    public function setForFundo(Resultado $resultado, $grupos) {
        $textos = $grupos[$this->getIdRandom($resultado, "grupos", $grupos)]['textos'];
        $id = 0;
        foreach ($textos as $texto) {
            $this->filtroSexo($resultado, $texto);
            $this->filtroSemPertence($texto);
            if (count($texto['textos']) > 0) {
                $textoItem = (array) $texto['textos'][$this->getIdRandom($resultado, "textos", $texto['textos'])];
                $this->setTexto($resultado->getArquivo(), $texto['fonte'], $texto['tamanho'], $texto['cor'], $texto['x'], $texto['y'], $texto['w'], $texto['h'], $texto['alinhamento'], html_entity_decode($this->replace($resultado, $textoItem['texto'])));

                foreach ($textos as $texto2) {

                    $this->filtroComPertence($texto2, $textoItem['id']);
                    if (isset($texto2) && count($texto2['textos']) > 0) {
                        $texto2 = $this->filtroSexo($resultado, $texto2);
                        $texto2['textos'] = array_values($texto2['textos']);
                        $textoItem2 = @(array) $texto2['textos'][$this->getIdRandom($resultado, "textos2", $texto2['textos'])];
                        $this->setTexto($resultado->getArquivo(), $texto2['fonte'], $texto2['tamanho'], $texto2['cor'], $texto2['x'], $texto2['y'], $texto2['w'], $texto2['h'], $texto2['alinhamento'], html_entity_decode($this->replace($resultado, $textoItem2['texto'])));
                    }
                }
            }
        }
    }

    private function setTexto($arquivo, $fonte, $tamanho, $cor, $x, $y, $w, $h, $alinhamento, $texto) {
        $box = $this->getBox($arquivo);
        $box->setFontFace(FONTS . "{$fonte}.ttf");
        $box->setFontSize($tamanho);
        $rgb = Utilitario::hex2rgb($cor);
        $box->setFontColor(new Color($rgb[0], $rgb[1], $rgb[2]));
        $box->setBox((int) $x, (int) $y, (int) $w, (int) $h);

        $box->setTextAlign($alinhamento[0], $alinhamento[1]);
        $box->draw($texto);

        imagealphablending($box->im, false);
        imagesavealpha($box->im, true);
        imagepng($box->im, $arquivo, 9);
        return true;
    }

    public function convert($dados) {
        $returno = array();
        $grupos = (isset($dados->grupo_de_textos) ? $dados->grupo_de_textos : $dados->grupo_de_texto);
        $i = 0;
        foreach ($grupos as $grupo) {
            $returno['GrupoDeTexto'][$i] = (array) $grupo;
            foreach ($returno['GrupoDeTexto'][$i] as &$grp) {
                foreach ($grp as &$txt) {
                    $txt = (array) $txt;
                    $txt['alinhamento'] = explode(", ", $txt['alinhamento']);
                }
            }
            $i++;
        }
        return $returno;
    }

    private function replace(Resultado $resultado, &$string) {
        $string = str_replace("{nome}", $resultado->getUsuario()->getNome(array(
                    "tipo" => "primeiro"
                )), $string);
        if(strpos($string, "upper") !== FALSE){
        $string = mb_strtoupper(str_replace("{nome:upper}", $resultado->getUsuario()->getNome(array(
                 "tipo" => "primeiro"
             )), $string));
        }
        $string = str_replace("{nomecompleto}", $resultado->getUsuario()->getNome(array(
                    "tipo" => "completo"
                )), $string);
        if(strpos($string, "upper") !== FALSE){
        $string = mb_strtoupper(str_replace("{nomecompleto:upper}", $resultado->getUsuario()->getNome(array(
                 "tipo" => "completo"
             )), $string));
        }

        return $string;
    }

    private function filtroSexo(Resultado $resultado, &$itens) {
        foreach ($itens['textos'] as $key => $texto) {
            $texto = (array) $texto;

            if ($texto['sexo'] != 'todos' && $texto['sexo'] != $resultado->getUsuario()->getSexo()) {
                unset($itens['textos'][$key]);
            }
        }
        $itens['textos'] = array_values($itens['textos']);
        return $itens;
    }

    private function filtroSemPertence(&$itens) {
        foreach ($itens['textos'] as $key => $texto) {
            $texto = (array) $texto;
            if ($texto['pertence'] != -1) {
                unset($itens['textos'][$key]);
            }
        }
        $itens['textos'] = array_values($itens['textos']);
        return $itens;
    }

    private function filtroComPertence(&$itens, $id) {
        foreach ($itens['textos'] as $key => $texto) {
            $texto = (array) $texto;
            if ($texto['pertence'] != $id) {
                unset($itens['textos'][$key]);
            }
        }
        $itens['textos'] = array_values($itens['textos']);
        return $itens;
    }

}
