<?php

    namespace php\projeto_turim\Controllers;

    use php\projeto_turim\Models\Filho;
    use php\projeto_turim\Exceptions\AddFilhoException;

    class FilhoController{
        protected \PDO $pdo;
    

        public function __construct(\PDO $pdo){
            $this->pdo = $pdo;
        }


        public function insert(Filho $filho){
            $pdo = $this->pdo;
            $query = "INSERT INTO filho(id,nome,id_pessoa)VALUES(:id,:nome,:id_pessoa);";
     
            $insert = $pdo->prepare($query);
            $insert->bindValue(":id",$filho->id);
            $insert->bindValue(":nome",$filho->nome);
            $insert->bindValue(":id_pessoa",$filho->id_pessoa);

                $insert->execute();
            
        }
     
        public function deleteAll(int $id){
            $pdo = $this->pdo;
            $query = "DELETE FROM filho WHERE id_pessoa = ?";
            
            $delete = $pdo->prepare($query);
            $delete->bindValue(1,$id);
            $delete->execute();
        }
     
        public function delete(Filho $filho){
            $pdo = $this->pdo;
            $query = "DELETE FROM filho WHERE id = ?";

            $delete = $pdo->prepare($query);
            $delete->bindValue(1, $filho->id);
            $delete->execute();
        }

        public function select(int $id){
            $pdo = $this->pdo;
            $query = "SELECT * FROM filho WHERE id_pessoa = ?;";
            $filhos = [];

            $select = $pdo->prepare($query);
            $select->bindValue(1,$id);
            $select->execute();


            while($fetch = $select->fetch()){
                $filhos[] = new Filho($fetch["id"],$fetch["nome"],$fetch["id_pessoa"]);
            }

            return $filhos;
        }
    }

