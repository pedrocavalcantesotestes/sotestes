<?php

class Usuario {

    private $id;
    private $nome;
    private $email = null;
    private $sexo; // 
    private $foto;
    private $faixaDeIdade;
    private $amigo;
    private $amigo2;
    private $amigo3;
    private $amigo4;
    private $amigo5;

    public function __construct() {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $nome = str_replace("Signo De ", "", $nome);
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSexo($sexo) {

        $sexo = str_replace("female", "feminino", $sexo);
        $sexo = str_replace("male", "masculino", $sexo);

        $this->sexo = $sexo;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setFaixaDeIdade($faixaDeIdade) {
        $this->faixaDeIdade = $faixaDeIdade;
    }

    /* setAmigo INICIO */
    public function setAmigo($id, $nome, $foto, $sexo) {
        $this->amigo = new Usuario();
        $this->amigo->setId($id);
        $this->amigo->setNome($nome);
        $this->amigo->setFoto($foto);
        $this->amigo->setSexo($sexo);
    }
    public function setAmigo2($id, $nome, $foto, $sexo) {
        $this->amigo2 = new Usuario();
        $this->amigo2->setId($id);
        $this->amigo2->setNome($nome);
        $this->amigo2->setFoto($foto);
        $this->amigo2->setSexo($sexo);
    }
    public function setAmigo3($id, $nome, $foto, $sexo) {
        $this->amigo3 = new Usuario();
        $this->amigo3->setId($id);
        $this->amigo3->setNome($nome);
        $this->amigo3->setFoto($foto);
        $this->amigo3->setSexo($sexo);
    }
    public function setAmigo4($id, $nome, $foto, $sexo) {
        $this->amigo4 = new Usuario();
        $this->amigo4->setId($id);
        $this->amigo4->setNome($nome);
        $this->amigo4->setFoto($foto);
        $this->amigo4->setSexo($sexo);
    }
    public function setAmigo5($id, $nome, $foto, $sexo) {
        $this->amigo5 = new Usuario();
        $this->amigo5->setId($id);
        $this->amigo5->setNome($nome);
        $this->amigo5->setFoto($foto);
        $this->amigo5->setSexo($sexo);
    }
    /* setAmigo FIM */

    public function getNome(Array $config = array()) {
        if (isset($config['tipo'])) {
            $nome = explode(" ", $this->nome);
            switch ($config['tipo']) {
                case 'primeiro':
                    $nome = $nome[0];
                    break;
                case 'primeiroultimo':
                    $nome = $nome[0] . " " . $nome[count($nome) - 1];
                    break;
                case 'completo':
                    $nome = $this->nome;
                    break;
            }
            return $nome;
        }
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getFaixaDeIdade() {
        return $this->faixaDeIdade;
    }

    /**
     * 
     * @return Usuario
     */
    public function getAmigo() {
        return $this->amigo;
    }
    public function getAmigo2() {
        return $this->amigo2;
    }
    public function getAmigo3() {
        return $this->amigo3;
    }
    public function getAmigo4() {
        return $this->amigo4;
    }
    public function getAmigo5() {
        return $this->amigo5;
    }

    public function setUsuarioFromJSON($dados) {
        $dados = json_decode($dados);
        $this->setId($dados->id);
        $this->setNome($dados->name);
        if (isset($dados->email) && !empty($dados->email)) {
            $this->setEmail($dados->email);
        }
        $this->setFoto($dados->picture->data->url);
        $this->setSexo($dados->gender);
        if (isset($dados->age_range)) {
            foreach ($dados->age_range as $idade) {
                $faixaDeIdade[] = $idade;
            }
            $this->setFaixaDeIdade($faixaDeIdade);
        }
    }

}
