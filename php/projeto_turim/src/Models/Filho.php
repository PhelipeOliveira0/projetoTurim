<?php

namespace php\projeto_turim\Models;


class Filho{

    protected $id_pessoa;

    public function __construct($id, $nome, $id_pessoa){
        $this->id = $id;
        $this->nome = $nome;
        $this->id_pessoa = $id_pessoa;
    }

    public function __get(string $valor){
        $funcao = "mostra" . ucfirst($valor);
        return $this->$funcao();
    }

    public function mostraId(){
        return $this->id;
    }

    public function mostraNome(){
        return $this->nome;
    }

    public function mostraId_pessoa(){
        return $this->id_pessoa;
    }

}