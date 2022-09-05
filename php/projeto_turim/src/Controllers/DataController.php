<?php

    namespace php\projeto_turim\Controllers;
    use php\projeto_turim\Models\{Filho,Pessoa};

    class DataController{

        protected \PDO $pdo;


        public function __construct(){
            $username = "root";
            $password = "umaSenhaManeira";
            $pdo = new \PDO('mysql:host=localhost;dbname=projeto_turim', $username, $password);
            $this->pdo = $pdo;
        }



        public function drop(){
            $pdo = $this->pdo;
            
            $pdo->exec("DROP TABLE IF EXISTS filho");
            $pdo->exec("DROP TABLE IF EXISTS pessoa");

            $pdo->exec("CREATE TABLE Pessoa(id INTEGER PRIMARY KEY AUTO_INCREMENT, nome TEXT);");
            $pdo->exec("CREATE TABLE filho(id INTEGER PRIMARY KEY AUTO_INCREMENT, nome TEXT, id_pessoa INTEGER, FOREIGN KEY(id_pessoa) REFERENCES Pessoa(id));");
            
        }


        public function insert(Pessoa $pessoa){

            $pdo = $this->pdo;  

            $queryPessoa = "INSERT INTO pessoa(id,nome)VALUES(:id,:nome);";

            $insertPessoa = $pdo->prepare($queryPessoa);
            $insertPessoa->bindValue(":id", $pessoa->id + 1);
            $insertPessoa->bindValue(":nome", $pessoa->nome);
            $insertPessoa->execute();
            


            foreach($pessoa->filhos as $filhos){
                
                $queryFilhos = "INSERT INTO filho(id,nome,id_pessoa)VALUES(:id,:nome,:id_pessoa);";

                $insertFilho = $pdo->prepare($queryFilhos);
                $insertFilho->bindValue(":id",$filhos->id + 1);
                $insertFilho->bindValue(":nome",$filhos->nome);
                $insertFilho->bindValue(":id_pessoa",$filhos->id_pessoa + 1);
                $insertFilho->execute();

            }



            
        }


        public function select(){

            $pdo = $this->pdo;
            $queryPessoa =  "SELECT * FROM pessoa";
            $queryFilho = "SELECT * FROM filho";

            $selectPessoa = $pdo->query($queryPessoa);
            $fetchPessoa = $selectPessoa->fetchAll();

            $selectFilho = $pdo->query($queryFilho);
            $fetchFilho = $selectFilho->fetchAll();

            $pessoas = [];


            foreach($fetchPessoa as $pessoa){
                $pessoas[$pessoa["id"]] = new Pessoa($pessoa["id"],$pessoa["nome"]);
            }


            foreach($fetchFilho as $filho){
                $filhos = new Filho($filho["id"],$filho["nome"],$filho["id_pessoa"]);
                $pessoas[$filho["id_pessoa"]]->adicionarFilho($filhos);
            }

            return $pessoas;
        }
    }