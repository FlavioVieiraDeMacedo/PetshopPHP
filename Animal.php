<?php

class Animal {
    private $nome;
    private $raca;
    private $cor;
    private $sexo;
    private $tipo;
    private $particularidade;
    public function __construct($nome, $raca, $cor, $sexo, $tipo, $particularidade) {
        $this->nome = $nome;
        $this->raca = $raca;
        $this->cor = $cor;
        $this->sexo = $sexo;
        $this->tipo = $tipo;
        $this->particularidade = $particularidade;
    }
    public function getNome() {
        return $this->nome;
    }

    public function getRaca() {
        return $this->raca;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getSexo() {
        return $this->sexo;
    }


    public function getTipo() {
        return $this->tipo;
    }

    public function getParticularidade() {
        return $this->particularidade;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setRaca($raca) {
        $this->raca = $raca;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setParticularidade($particularidade) {
        $this->particularidade = $particularidade;
    }


}
