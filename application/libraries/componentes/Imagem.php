<?php

class Imagem extends Componentes {
    
    protected $nomeCampo;

    public function set(Resultado $resultado) {

        $im = $resultado->getAplicativo()->getComponentes()[$this->nomeCampo];

        if (isset($im[0])) {
            foreach ($im as $imagemUsuario) {
                $this->setar($resultado, $imagemUsuario[$this->nomeCampo]);
            }
        } else {
            $this->setar($resultado, $im);
        }
    }

    private function setar(Resultado $resultado, $imgUsuario) {
        
        $imagemUsuario = $imgUsuario;

        $nomeF = md5(uniqid(rand(0, 10000)) . json_encode($imgUsuario)) . ".png";
        $pastaF = CACHE;
        $nomeDoArquivo = $pastaF . $nomeF;
        
        if($this->nomeCampo == "ImagemUsuario"){
            $imagemTag = $resultado->getUsuario()->getFoto();
        } else if($this->nomeCampo == "ImagemAmigo2"){
            $imagemTag = $resultado->getUsuario()->getAmigo2()->getFoto();
        } else if($this->nomeCampo == "ImagemAmigo3"){
            $imagemTag = $resultado->getUsuario()->getAmigo3()->getFoto();
        } else if($this->nomeCampo == "ImagemAmigo4"){
            $imagemTag = $resultado->getUsuario()->getAmigo4()->getFoto();
        } else if($this->nomeCampo == "ImagemAmigo5"){
            $imagemTag = $resultado->getUsuario()->getAmigo5()->getFoto();
        } else {
            $imagemTag = $resultado->getUsuario()->getAmigo()->getFoto();
        }
        
        $this->getCanvas()
                ->carrega($imagemTag)
                ->hexa("#000")
                ->redimensiona((int) $imagemUsuario['w'], (int) $imagemUsuario['h'], 'preenchimento')
                ->grava($nomeDoArquivo);

        $marca = $imagemUsuario;

        if (isset($marca['imagem_redonda']) && $marca['imagem_redonda'] == 1) {
            $easy = new Easyphpthumbnail;
            $easy->Thumbwidth = $imagemUsuario['w'];
            $easy->Thumbheight = $imagemUsuario['h'];
            $easy->Thumblocation = $pastaF;
            $easy->Thumbprefix = '';
            $easy->Thumbfilename = $nomeF;
            $easy->Backgroundcolor = '#0000FF';
            $easy->Clipcorner = array(2, 50, 0, 1, 1, 1, 1);
            $easy->Maketransparent = array(1, 1, '#0000FF', 30);
            $easy->Createthumb($nomeDoArquivo, 'file');
        }

        if (isset($marca['imagem_de_fundo']) && $marca['imagem_de_fundo'] == 1) {
            $this->getCanvas()
                    ->hexa("#000")
                    ->novaImagem(1200, 630)
                    ->marca($nomeDoArquivo, (int) $imagemUsuario['x'], (int) $imagemUsuario['y'], '')
                    ->marca($resultado->getArquivo(), 0, 0, '')
                    ->grava($resultado->getArquivo());
        } else {

            // Inclui a foto na imagem
            $this->getCanvas()
                    ->carrega($resultado->getArquivo())
                    ->marca($nomeDoArquivo, (int)$imagemUsuario['x'], (int)$imagemUsuario['y'], '')
                    ->grava($resultado->getArquivo());
        }
        unlink($nomeDoArquivo);
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

}
