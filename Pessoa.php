<?php

class Pessoa {
   private $nome ="";
   private $tel="";
   private $cel="";
   private $cidade="";
   private $rua="";
   private $compEnde="";
   public function __construct($nome, $tel, $cel, $cidade, $rua, $compEnde) {
       $this->nome = $nome;
       $this->tel = $tel;
       $this->cel = $cel;
       $this->cidade = $cidade;
       $this->rua = $rua;
       $this->compEnde = $compEnde;
   }
   public function getNome() {
       return $this->nome;
   }

   public function getTel() {
       return $this->tel;
   }

   public function getCel() {
       return $this->cel;
   }

   public function getCidade() {
       return $this->cidade;
   }

   public function getRua() {
       return $this->rua;
   }

   public function getCompEnde() {
       return $this->compEnde;
   }

   public function setNome($nome) {
       $this->nome = $nome;
   }

   public function setTel($tel) {
       $this->tel = $tel;
   }

   public function setCel($cel) {
       $this->cel = $cel;
   }

   public function setCidade($cidade) {
       $this->cidade = $cidade;
   }

   public function setRua($rua) {
       $this->rua = $rua;
   }

   public function setCompEnde($compEnde) {
       $this->compEnde = $compEnde;
   }

}
