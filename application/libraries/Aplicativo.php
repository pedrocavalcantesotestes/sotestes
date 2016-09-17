<?php

class Aplicativo {

    private $id;
    private $titulo;
    private $destaque;
    private $tituloCompartilhamento;
    private $textoCompartilhamento;
    private $tituloDeBusca = 'Digite o nome do amigo(a):';
    private $placeholderDeBusca = 'Busque seu(a) amigo(a):';
    private $texto;
    private $imagemChamada;
    private $imagemInterna;
    private $componentes = array();
    private $dadosSerializado = null;
    private $slug;
    private $estilo;
    private $sites = array();
    private $status;
    private $prioridade;
    private $obs;

    public function getPrioridade() {
        return $this->prioridade;
    }

    public function getObs() {
        return $this->obs;
    }

    public function setPrioridade($prioridade) {
        $this->prioridade = $prioridade;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getSites() {
        return $this->sites;
    }

    public function setSites(Array $sites) {
        $this->sites = $sites;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDestaque($destaque) {
        $this->destaque = $destaque;
    }

    public function setTituloDeBusca($tituloDeBusca) {
        $this->tituloDeBusca = $tituloDeBusca;
    }

    public function getTituloDeBusca() {
        return $this->tituloDeBusca;
    }

    public function setPlaceholderDeBusca($placeholderDeBusca) {
        $this->placeholderDeBusca = $placeholderDeBusca;
    }

    public function getPlaceholderDeBusca() {
        return $this->placeholderDeBusca;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setImagemChamada($imagemChamada) {
        $this->imagemChamada = $imagemChamada;
    }

    public function setImagemInterna($imagemInterna) {
        $this->imagemInterna = $imagemInterna;
    }

    public function setComponentes(Array $componentes) {
        $this->componentes = $componentes;
    }

    public function setComponente(Array $componente) {
        if (array_keys($componente)[0] == "ImagemUsuario") {
            $this->componentes['ImagemUsuario'][] = $componente;
        } else  if (array_keys($componente)[0] == "ImagemAmigo") {
            $this->componentes['ImagemAmigo'][] = $componente; 
        } else {
            $this->componentes = array_merge($this->componentes, $componente);
        }
    }

    public function setTituloCompartilhamento($tituloCompartilhamento) {
        $this->tituloCompartilhamento = $tituloCompartilhamento;
    }

    public function setTextoCompartilhamento($textoCompartilhamento) {
        $this->textoCompartilhamento = $textoCompartilhamento;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEstilo($estilo) {
        $this->estilo = $estilo;
    }

    public function getEstilo() {
        return $this->estilo;
    }

    public function getVotar() {
        if(!isset($this->votar)) {
            return array(
                0 => "nao"
                );
        } else {
            return $this->votar;
        }
    }

    public function setVotar(Array $votar) {
        $this->votar = $votar;
    }

    public function getDadosSerializado() {
        if ($this->dadosSerializado == null) {
            $this->dadosSerializado = serialize($this);
        }
        return $this->dadosSerializado;
    }

    public static function getAplicativoFromSerial($serial) {
        return unserialize($serial);
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDestaque() {
        return $this->destaque;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getImagemChamada() {
        return $this->imagemChamada;
    }

    public function getImagemInterna() {
        return $this->imagemInterna;
    }

    public function getComponentes() {
        return $this->componentes;
    }

    public function getTituloCompartilhamento() {
        return $this->tituloCompartilhamento;
    }

    public function getTextoCompartilhamento() {
        return $this->textoCompartilhamento;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getNameID() {
        return $this->getId() . "-" . $this->getSlug();
    }

    public function getURL() {
        return base_url("/a/{$this->getNameID()}");
    }

    public function getId() {
        return $this->id;
    }

    public function salvar() {
        foreach ($this->getSites() as $site) {
            Storage::putS3(STORAGE_ONLINE . "aplicativo/{$site}/" . $this->getId() . "-" . $this->getSlug(), $this->getDadosSerializado());
        }
        $cache = new Ca();
        $cache->sendCache();
    }

    public function excluir() {
        foreach ($this->getSites() as $site) {
            unlink(STORAGE_ONLINE . "aplicativo/{$site}/" . $this->getNameID());
        }
        $cache = new Ca();
        $cache->sendCache();
    }

    /**
     *
     * @param String $slug
     * @return Aplicativo
     */
    public static function get($slug) {
        $cliente = Cliente::getCliente()->getNome();
        $file = Storage::getS3(STORAGE_ONLINE . "aplicativo/{$cliente}/{$slug}");
        if ($file) {
      
            return unserialize($file);
        } else {
            return FALSE;
        }
    }

    /**
     * @return Aplicativo
     */
    public static function getListaDeAplicativos(Array $config = array()) {
        $cache = new Ca();
        $cache->cacheStatus();
        $cliente = Cliente::getCliente()->getNome();
        if (is_dir(STORAGE_LOCAL . "aplicativo/{$cliente}/")) {


            $retornListaDeAplicativos = array(
                "lista" => scandir(STORAGE_LOCAL . "aplicativo/{$cliente}/"),
                "pasta" => STORAGE_LOCAL . "aplicativo/{$cliente}/"
            );

            $listaDeAplicativos = array();
            $i = 0;
            $novaLista = array();
            if (count($retornListaDeAplicativos['lista']) > 0) {
                foreach ($retornListaDeAplicativos['lista'] as $app) {
                    if (is_file($retornListaDeAplicativos['pasta'] . $app) && $app != 'index.html') {
                        $id = explode("-", $app)[0];
                        if (isset($config['hide']) && array_search($id, $config['hide']) !== FALSE) {
                            continue;
                        }
                        $instance_app = unserialize(file_get_contents($retornListaDeAplicativos['pasta'] . $app));
                        if (isset($instance_app) && is_object($instance_app)) {
                            $arrayApp = (array) $instance_app;
                            if ((isset($arrayApp['Aplicativopais']) && $arrayApp['Aplicativopais'] == "br") || !method_exists($instance_app, 'getPais')) {
                                $listaDeAplicativos[$id] = $instance_app;
                            }
                        }
                    }
                }
            }

            if (!isset($config['order'])) {
                ksort($listaDeAplicativos);
                $listaDeAplicativos = array_reverse($listaDeAplicativos);
            } else if (isset($config['order']) && $config['order'] == 'rand') {
                shuffle($listaDeAplicativos);
            }
            //$i_f = $i_l = 0;
            $inicio = 0;
            $fim = 0;
            $number = 0;
            $tamanholista = count($listaDeAplicativos);
            foreach ($listaDeAplicativos as $id => $val) {

                /*if (isset($config['offset'])) {
                    if (($config['offset'] * $config['limit']) > $i_f) {
                        $i_f++;
                        continue;
                    }
                }
                if (isset($config['limit'])) {
                    if ($i_l >= $config['limit']) {
                        break;
                    }
                }
                $i_l++;
                $novaLista[$id] = $val;*/


                    if(isset($config['offset']) && isset($config['limit'])) {
                        $inicio = $config['limit'] * $config['offset'];
                        $fim = $inicio + $config['limit'];
                    } else if(isset($config['limit'])) {
                        $inicio = 0;
                        $fim = $config['limit'];
                    } else {
                        $inicio = 0;
                        $fim = 15;
                    }

                    if($number >= $inicio && $number < $fim) {
                        $novaLista[$id] = $val;
                    } else if($number >= $fim || $number > $tamanholista) {
                        break;
                    }

                    $number++;


            }
            return $novaLista;
        } else {
            return array();
        }
    }

}
