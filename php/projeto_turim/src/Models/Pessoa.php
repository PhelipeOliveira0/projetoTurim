<?php


namespace php\projeto_turim\Models;
require_once __DIR__ . "/../../vendor/autoload.php";
use php\projeto_turim\Models\Filho;

class Pessoa{

    protected $id;
    protected $nome;
    protected $filhos = [];

    public function __construct($id, $nome){
        $this->id = $id;
        $this->nome = $nome;
    }


    public function adicionarFilho(Filho $filho){
        $this->filhos[] = $filho;
    }

    public function __get(string $atributo){
        $funcao = "mostra" . ucfirst($atributo);
        return $this->$funcao(); 
    }

    public function mostraId(){
        return $this->id;
    }

    public function mostraNome(){
        return $this->nome;
    }

    public function mostraFilhos(){
        return $this->filhos;
    }
}