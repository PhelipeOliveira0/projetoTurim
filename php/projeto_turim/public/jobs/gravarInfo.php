<?php
    require_once __DIR__ . "/../../vendor/autoload.php";
    use php\projeto_turim\Models\{Pessoa,Filho};
    use php\projeto_turim\Controllers\DataController;



    $textAreaJson = $_POST['textAreaJson'];
    $textArea = json_decode($textAreaJson, true); 

    if($textArea === null){
        header("location: /",false,302);
    }
    $data = new DataController();
    
    $pessoas = [];
    

    

    $data->drop();
    $i = 0;

    foreach($textArea["pessoas"] as $pessoa){
        if($pessoa != null){

            $pessoaObj = new Pessoa($pessoa["id"],$pessoa["nome"]);

            foreach($pessoa["filhos"] as $filhos){

                $filho = new Filho($filhos["id"],$filhos["nome"],$filhos["id_pessoa"]);
                $pessoaObj->adicionarFilho($filho);
                
            }
            $pessoas[$i] = $pessoaObj;
            $i++;
        }
    }


    foreach($pessoas as $pessoa){
        $data->insert($pessoa);
    }


    header("location: /",false,302);    
?>
