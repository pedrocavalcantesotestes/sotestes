    <?php

class Resultado {
    
    private $id;
    private $usuario;
    private $aplicativo;
    private $arquivo = null;
    public $titulo;
    public $texto;
    private $imagem;

    public function setTitulo($titulo) {
        $this->titulo = $this->replaceTags($titulo);
        $this->getAplicativo()->setTituloCompartilhamento($this->replaceTags($this->getAplicativo()->getTituloCompartilhamento()));
        $this->getAplicativo()->setTextoCompartilhamento($this->replaceTags($this->getAplicativo()->getTextoCompartilhamento())); 
    }

    public function setTexto($texto) {
        $this->texto = $this->replaceTags($texto);
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
    }
    /**
     * 
     * @return Usuario
     */

    public function getUsuario() {
        return $this->usuario;
    }

    public function setAplicativo(Aplicativo $aplicativo) {
        $this->aplicativo = $aplicativo;
    }
    
    /**
     * 
     * @return Aplicativo
     */

    public function getAplicativo() {
        return $this->aplicativo;
    }

    public function getArquivo() {
        if ($this->arquivo == null) {
            $this->arquivo = CACHE.md5(uniqid(rand(0, 100000))) . ".png";
        }
        return $this->arquivo;
    }
    public function jpgArquivo() {
       $this->arquivo = $this->arquivo.".jpg";
    }

    public function gerar() {
        $this->setComponente(new Fundo());

        foreach ($this->aplicativo->getComponentes() as $key => $val) {
            if ($key != 'Fundo') {
                $this->setComponente(new $key());
            }
        }
        $this->setComponente(new Qualidade());
        $this->setImagemResultado();
    }
    
    public function getId(){
        if(empty($this->id)){
            $this->id = hash("crc32b", uniqid(rand(0, 100000)));
        }
        return $this->id;
    }
    public function getURL(){
        return base_url("/r/{$this->getAplicativo()->getNameID()}/{$this->getId()}");
    }

    public function getImagemResultado() {
        return $this->imagem;
    }
    
    private function setImagemResultado(){
        $nome = str_replace(".png", "",  basename($this->getArquivo()));
        $arquivo = STORAGE_ONLINE."upload/".$nome;
        Storage::putS3($arquivo, file_get_contents($this->getArquivo()));
        unlink($this->getArquivo());
        $this->imagem = Cliente::getCliente()->getUrlUpload($nome);
    }

    private function setComponente(Componente $componente) {
        $componente->set($this);
    }
    
    public function replaceTags($tag){

        $string = 

        str_replace("{NOMECOMPLETO}", strtoupper($this->getUsuario()->getNome(array(
            "tipo"=>"completo"
        ))),
            str_replace("{NOME}", strtoupper($this->getUsuario()->getNome(array(
                "tipo"=>"primeiro"
            ))),
                str_replace("{nomecompleto}", $this->getUsuario()->getNome(array(
                    "tipo"=>"completo"
                )),
                    str_replace("{nome}", $this->getUsuario()->getNome(array(
                        "tipo"=>"primeiro"
                    )), $tag)
                )
            )
        );

        return $string;
    }
    
    public function salvar(){
        
        Storage::putS3(STORAGE_ONLINE."resultado/{$this->getAplicativo()->getNameID()}/{$this->getId()}", serialize($this));
        setcookie("acessar_{$this->getId()}", "sim", time() + 3600 * 24 * 30, "/"); 
    }
    
    public function get($nomeApp, $idResultado){
        $serial = Storage::getS3(STORAGE_ONLINE."resultado/{$nomeApp}/{$idResultado}");
        return unserialize($serial);
    }
    
   

}
