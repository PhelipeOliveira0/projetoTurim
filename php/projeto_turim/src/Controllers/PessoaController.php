<?php

    namespace php\projeto_turim\Controllers;

    use php\projeto_turim\Models\Pessoa;
    use php\projeto_turim\Controllers\FilhoController;

    class PessoaController{
        protected \PDO $pdo;
    

        public function __construct(\PDO $pdo){
            $this->pdo = $pdo;
        }


        public function insert(Pessoa $pessoa){

            $pdo = $this->pdo;
            $query = "INSERT INTO pessoa(nome)VALUES(?);";
            $nome = $pessoa->nome;
     
             $insert = $pdo->prepare($query);
             $insert->bindValue(1,$nome);
             $insert->execute();
        }
     
     
        public function delete(Pessoa $pessoa){
            $pdo = $this->pdo;
            $query = "DELETE FROM pessoa WHERE id = :id";

            $deleteFilho = new FilhoController($pdo);
            $deleteFilho->deleteAll($pessoa->id);

            $delete = $pdo->prepare($query);
            $delete->bindValue(":id", $pessoa->id);
            $delete->execute(); 
        }


        public function select(){
            $pdo = $this->pdo;
            $query = "SELECT * FROM pessoa;";

            $select = $pdo->query($query);
            $fetch = $select->fetchAll();
            $pessoas = [];


            foreach($fetch as $pessoa){

                $pessoas[] = new Pessoa($pessoa["id"] ,$pessoa["nome"]);

            }

            return $pessoas;
        }
    }


