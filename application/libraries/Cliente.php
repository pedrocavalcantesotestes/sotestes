<?php

error_reporting(E_ALL);
    ini_set('display_errors', true);

define('URL', 'http://sotestes.com/');

define('S3', 's3://front.sotestes.com/');
define('AWSID', 'AKIAJP2MHLGF6HJR6JDQ');
define('AWSSECRET', '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');

define('S3PURO', 'front.sotestes.com');
define("STORAGE_ONLINE", "s3://front.sotestes.com/"); 
define('STORAGE_ONLINE2', 'http://front.sotestes.com/');

define('GOOGLEANALYTICS', 'UA-83243209-1');
define('AMUNG', '');

define('USUARIOBD', 'applicationbd');
define('SENHABD', '123ads4567');
define('HOSTBD', 'applicationbd.cevhue5iil6j.us-east-1.rds.amazonaws.com');
define('NOMEBD', 'applicationbd');
define('TEMA', 'f2n');

define('BOTAOFIXO', 'f2n');

define('NOME', 'sotestes.com');

define('FACEBOOKID', '158004721288106');
define('FACEBOOKSECRET', '8f7b909c668ee66c2b8c14e8dda05191');
define('FACEBOOKPAGE', 'https://www.facebook.com/sotestescom/');

define('IDADNOW', '');

define('TITULO', 'Só Testes');

class Cliente {
     
     private $cliente = null;
     
     protected static $onlyInstance;
     
     public function __construct() {
        #$this->cliente = $this;
     }
     
     protected static function getself() {
        if (static::$onlyInstance === null) {
            static::$onlyInstance = new Cliente;
        }

        return static::$onlyInstance;
    }

    public function getPaginas() {
        return array(
                array('id' => '436170383205268', 'sexo' => 'female'),
                array('id' => '317757375085469', 'sexo' => 'female'),
                array('id' => '779065448848242', 'sexo' => 'female'),
                array('id' => '900191670025719', 'sexo' => 'female'),
                array('id' => '394278487401022', 'sexo' => 'female'),
                array('id' => '975557249140344', 'sexo' => 'female'),
                array('id' => '605936909552382', 'sexo' => 'female'),
                array('id' => '1618167971746289', 'sexo' => 'female'),
                array('id' => '1543891959205335', 'sexo' => 'female'),
                array('id' => '695218313910206', 'sexo' => 'female'),
                array('id' => '1540009772934442', 'sexo' => 'female'),
                array('id' => '1522821737981773', 'sexo' => 'female'),
                array('id' => '1535637430062984', 'sexo' => 'male'),
                array('id' => '1063112483764526', 'sexo' => 'male'),
                array('id' => '499717083554615', 'sexo' => 'male'), // FB Tests
                array('id' => '1256619214379133', 'sexo' => 'male'), // Só Testes
            );
        return $this->paginas;
    }

    public function setPagina($pagina) {
        //$this->paginas[] = $pagina;
    }
     
     public static function getAmung() {
         //return $this->amung;
         return AMUNG;
     }

     public static function setAmung($amung) {
         //$this->amung = $amung;
     }

     
    public static function getTema() {
        //return $this->tema;
        return TEMA;
    }

    public static function setTema($tema) {
        //$this->tema = $tema;
    }

    public static function getStorageS3() {
        //return $this->storageS3;
        return S3PURO;
    }

    public static function getS3Client() {
        //return self::$s3Client;
        return '';
    }

    public static function setStorageS3($storageS3) {
        //$this->storageS3 = $storageS3;
    }

    public static function setS3Client($s3Client) {
        //self::$s3Client = $s3Client;
    }

    public static function getS3Url() {
        //return $this->s3Url;
        return STORAGE_ONLINE2;
    }

    public static function setS3Url($s3Url) {
        //$this->s3Url = $s3Url;
    }

    public static function getSecretAws() {
        //return $this->secretAws;
        return AWSSECRET;
    }

    public static function getIdAws() {
        //return $this->idAws;
        return AWSID;
    }

    public static function getUsuarioBd() {
        //return $this->usuarioBd;
        return USUARIOBD;
    }

    public static function getSenhaBd() {
        //return $this->senhaBd;
        return SENHABD;
    }

    public static function getHostBd() {
        //return $this->hostBd;
        return HOSTBD;
    }

    public static function getNomeBd() {
        //return $this->nomeBd;
        return NOMEBD;
    }

    public static function setSecretAws($secretAws) {
        //$this->secretAws = $secretAws;
    }

    public static function setIdAws($idAws) {
        //$this->idAws = $idAws;
    }

    public static function setUsuarioBd($usuarioBd) {
        //$this->usuarioBd = $usuarioBd;
    }

    public static function setSenhaBd($senhaBd) {
        //$this->senhaBd = $senhaBd;
    }

    public static function setHostBd($hostBd) {
        //$this->hostBd = $hostBd;
    }

    public static function setNomeBd($nomeBd) {
        //$this->nomeBd = $nomeBd;
    }

    public static function getBotaoFixo() {
        //return $this->botaoFixo;
        return BOTAOFIXO;
    }

    public static function setBotaoFixo($botaoFixo) {
        //$this->botaoFixo = $botaoFixo;
    }

    /**
     * @return Cliente
     */
    public static function getCliente($nome = NULL) {
        
        return static::getself();
        
        return $this->_instance;
        
        #Cliente::$cliente = $_SERVER['HTTP_HOST'];
        return $_SERVER['HTTP_HOST'];
        
        if (Cliente::$cliente == null) {
            if ($nome == NULL) {
                $nome = str_replace("www.", "", $_SERVER['HTTP_HOST']);
            }
            $clientes = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/clientes.serial"));
            if ($clientes !== FALSE && is_array($clientes) && count($clientes) > 0) {
                foreach ($clientes as $cliente) {
                    if ($nome == $cliente->getNome()) {
                        Cliente::$cliente = $cliente;
                        break;
                    }
                }
            }
        }

        return Cliente::$cliente;
    }

    public static function salvarCliente() {
        return;
        $clientes = array();
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/clientes.serial")) {
            $clientes = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/clientes.serial"));
            if ($clientes !== FALSE && is_array($clientes) && count($clientes) > 0) {
                foreach ($clientes as $key => $cliente) {
                    if ($this->getNome() == $cliente->getNome()) {
                        unset($clientes[$key]);
                    }
                }
                array_push($clientes, $this);
            }
        } else {
            $clientes[] = $this;
        }
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/clientes.serial", serialize($clientes));
    }

    public static function getNome() {
        //return $this->nome;
        return NOME;
    }

    public static function getS3($uri = '') {
        //return "http://files." . $this->nome . "/{$uri}";
        return STORAGE_ONLINE2;
    }

    public static function getIdFacebook() {
        //return $this->idFacebook;
        return FACEBOOKID;
    }

    public static function getSecretFacebook() {
        //return $this->secretFacebook;
        return FACEBOOKSECRET;
    }

    public static function getGoogleAnalitycs() {
        //return $this->googleAnalitycs;
        return GOOGLEANALYTICS;
    }

    public static function getTitulo() {
        //return $this->titulo;
        return TITULO;
    }

    public static function getPaginaDoFacebook() {
        //return $this->paginaDoFacebook;
        return FACEBOOKPAGE;
    }

    public static function getIdAdnow() {
        //return $this->idAdnow;
        return IDADNOW;
    }

    public static function getAdsense($nome) {
        if($nome == 'topo') {
            return '';
        } else if($nome == 'sidebar') {
            return '<script type="text/javascript"><!--
google_ad_client = "ca-pub-4756800790618921";
/* APPCOOL DESKTOP 600X300  */
google_ad_slot = "4961344287";
google_ad_width = 300;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';
        } else if($nome == 'chamada_mobile') {
            return '<script type="text/javascript"><!--
google_ad_client = "ca-pub-4756800790618921";
/* APPCOOL 300X250 MOBILE  */
google_ad_slot = "7914760047";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';
        } else if($nome == 'comentarios') {
            return '';
        } else if($nome == 'abaixo_comentarios_mobile') {
            return '<script type="text/javascript"><!--
google_ad_client = "ca-pub-4756800790618921";
/* APPCOOL 300X250 MOBILE ABAIXO COMENTARIOS */
google_ad_slot = "9391467927";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';
        } else if($nome == 'inside') {
            return '<script type="text/javascript"><!--
google_ad_client = "ca-pub-4756800790618921";
/* APPCOOL 300X250 DESKTOP */
google_ad_slot = "6438052167";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';
        }
    }

    public static function setNome($nome) {
        //$this->nome = $nome;
    }

    public static function setIdFacebook($idFacebook) {
        //$this->idFacebook = $idFacebook;
    }

    public static function setSecretFacebook($secretFacebook) {
        //$this->secretFacebook = $secretFacebook;
    }

    public static function setGoogleAnalitycs($googleAnalitycs) {
        //$this->googleAnalitycs = $googleAnalitycs;
    }

    public static function setTitulo($titulo) {
        //$this->titulo = $titulo;
    }

    public static function setPaginaDoFacebook($paginaDoFacebook) {
        //$this->paginaDoFacebook = $paginaDoFacebook;
    }

    public static function setIdAdnow($idAdnow) {
        //$this->idAdnow = $idAdnow;
    }

    public static function setAdsense(Array $adsense) {
        //$this->adsense = $adsense;
    }

    public static function getUrl($uri = '') {
        //return "http://{$this->getNome()}/{$uri}";
        return URL;
    }

    public static function getUrlUpload($nomeFile) {
        return STORAGE_ONLINE2."upload/{$nomeFile}";
    }

}
