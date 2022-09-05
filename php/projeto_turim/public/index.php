<?php

    require_once __DIR__ . "/../vendor/autoload.php";


    use php\projeto_turim\Controllers\{PessoaController,FilhoController};


    $username = "root";
    $password = "umaSenhaManeira";
    $pdo = new \PDO('mysql:host=localhost;dbname=projeto_turim', $username, $password);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




    require __DIR__ . "/../src/views/home.php";

