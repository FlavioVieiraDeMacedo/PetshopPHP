<?php

include './Pessoa.php';
class Cliente extends Pessoa {

    public function __construct($nome, $tel, $cel, $cidade, $rua, $compEnde) {
        parent::__construct($nome, $tel, $cel, $cidade, $rua, $compEnde);
       
    }
    function AddPet() {
        
    }

    /* funcao para cancelar cadastro */

    function LimparCampos() {
        
    }

}
