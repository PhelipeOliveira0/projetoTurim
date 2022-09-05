<?php
    require_once __DIR__ . "/../../vendor/autoload.php";
    use php\projeto_turim\Models\{Pessoa,Filho};
    use php\projeto_turim\Controllers\DataController;

    $data = new DataController();

    $select = $data->select();

    $pessoas = [];
    $contador = 0;
    foreach($select as $pessoa){
        $contadorFilho = 0;

        $array = [];
        $arrayFilho = [];

        $array["id"] = $pessoa->id;
        $array["nome"] = $pessoa->nome;
        
        if($pessoa->filhos){
            

            foreach($pessoa->filhos as $filho){
                $filhos["id"] = $filho->id;
                $filhos["nome"] = $filho->nome;
                $filhos["id_pessoa"] = $filho->id_pessoa;
            
                $arrayFilho[$contadorFilho] = $filhos;
            
                $contadorFilho++;
            }
        }
  
        $array["filhos"] = $arrayFilho;
        $pessoas[$contador] = $array; 
        $contador++;
    }

    
    $json = json_encode($pessoas);
    header("location:/home?var=$json",false,302);
