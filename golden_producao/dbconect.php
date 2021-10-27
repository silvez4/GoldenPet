<?php

    $host = "localhost";//ip público do banco no google cloud SQL
    $user = "root";
    $pswd = ""; //senha do banco no google cloud SQL
    $dbname = "db_goldenpet";


    try {
        $con = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pswd);
        echo "Conectado a $dbname em $host com sucesso.";
    } catch (PDOException $e) {
        die("Não foi possível se conectar ao banco de dados $dbname :" . $e->getMessage());
    }

