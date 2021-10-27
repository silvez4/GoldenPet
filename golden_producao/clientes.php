<?php
    require_once('dbconect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/clientes.css">
    <title>Clientes</title>
</head>
<header>
    <a class="head-logo" href="index.html"></a>
</header>
<body>
    <h1 class="titulo">Clientes</h1>
    <div class="busca">
        Buscar
    </div>
    <div class="cabecalho">
        <h2>Código</h2>
        <h2>Nome</h2>
        <h2>Telefone</h2>
        <h2>E-mail</h2>
    </div>
    <?php 

        $stmt = $con->prepare("SELECT * FROM db_goldenpet.entidade");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // Percorre todos os registro da consulta SQL
        foreach($result as $row) {
           echo "<div class='cabecalho dados'>
                    <h2>{$row['codigo']}</h2>
                    <h2>{$row['nome']}</h2>
                    <h2>{$row['telefone']}</h2>
                    <h2>{$row['email']}</h2>
                    <a class='btn' href='./pets.php?id={$row['codigo']}'>Pets</a>
                </div>
           ";
        //    <form method="post">
        //    <input type="hidden" id="codigo" name="codigo"> 
        //    <input type="submit" id="submit" name="submit" value="Pets"> 
        //    </form>
        }
    ?>
    <!-- <div class="cabecalho dados">
           <h2>01</h2>
        <h2>Carla Maria dos Santos</h2>
        <h2>(87)98800-9999</h2>
        <h2>teste@gmail.com</h2>
        <a class="btn" href="pets.html">Pets</a>
    </div> -->
</body>
</html>