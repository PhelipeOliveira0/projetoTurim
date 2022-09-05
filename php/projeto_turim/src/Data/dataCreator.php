<?php


    $username = "root";
    $password = "umaSenhaMuitoManeira";
    $pdo = new \PDO('mysql:host=localhost;dbname=projeto_turim', $username, $password);

    $pdo->exec("CREATE TABLE Pessoa(id INTEGER PRIMARY KEY AUTO_INCREMENT, nome TEXT);");
    $pdo->exec("CREATE TABLE filho(id INTEGER PRIMARY KEY AUTO_INCREMENT, nome TEXT, id_pessoa INTEGER, FOREIGN KEY(id_pessoa) REFERENCES Pessoa(id));");
