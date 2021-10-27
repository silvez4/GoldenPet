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
    <link rel="stylesheet" href="./css/pets.css">
    <title>Clientes</title>
</head>
<header>
    <a class="head-logo" href="./index.php"></a>
</header>
<body>
    <!--
    <h1 class="titulo">Pets</h1>
    
    <div class="busca">
        Buscar
    </div>
    
    <div class="cabecalho">
        <h2>Código</h2>
        <h2>Nome</h2>
        <h2>Raça</h2>
        <h2>Tipo</h2>
    </div>
    -->
    <div class="btnConteinner">
        <a class='btn' href='./clientes.php'>Retornar</a>
        <?php
            $id =  filter_input(INPUT_GET, "id");
            echo 
             "<a class='btn' href='./cadastroPet.php?id=$id'>Cadastrar Novo Pet</a>";
        ?>
    </div>
    <div>
        <h2 class="titulo2">DADOS DO PET</h2>
        
        <!-- <div class="titulo"> 
        <input style="margin-bottom: 10px;" type="text" id="nomepet" name="nomepet" placeholder="NomePet">
        </div> -->
        <!-- <div> 
        <input type="text" id="raca" name="raca" placeholder="raça">
        </div> -->
    
    <?php 
        // $stmt = $con->prepare("SELECT * FROM db_goldenpet.pet where codigo_entidade= :ID");
        // $stmt->bindParam(":ID", $id);
        $stmt = $con->prepare("SELECT db_goldenpet.pet.nome as 'nome-pet', db_goldenpet.pet.descPet, db_goldenpet.pet.raca, db_goldenpet.pet.codigo_entidade, db_goldenpet.entidade.nome  FROM pet INNER JOIN entidade ON (pet.codigo_entidade = entidade.codigo AND pet.codigo_entidade= :ID)");
        $stmt->bindParam(":ID", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result == null){
            echo"<h2 class='nulo'>Esse Cliente não tem nenhum pet cadastrado!!</h2>";
        }else{
            echo "<div class='cabecalho-pet'>
                    <h2>Nome</h2>
                    <h2>Raça</h2>
                    <h2>Tipo</h2>
                    <h2>Dono</h2>
                </div>";
            // Percorre todos os registro da consulta SQL
            foreach($result as $row) {
                // <h2>{$row['codigo']}</h2>
                $row['nome-pet'] = ucfirst($row['nome-pet']);
                echo "<div class='cabecalho-pet dados'>
                <h2>{$row['nome-pet']}</h2>
                <h2>{$row['descPet']}</h2>
                <h2>{$row['raca']}</h2>
                <h2>{$row['nome']}</h2>
                </div>
                ";
            }
        }
    ?>

        <div>
            <label for="pet">selecione seu pet</label>
            <select name="pet" id="pet">
                <option value="dog">cachorro</option>
                <option value="cat">gato</option>
            </select>
        </div>
       <!-- <a class="btn"href="#">Alterar</a> -->
    </div>
    <!--
    <a class="btn" href="#">Adicionar Pet</a>
    <a class="btn" href="/cadastro.php">Retornar</a>
    -->
</body>
</html>