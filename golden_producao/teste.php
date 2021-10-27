<?php 
    include_once './dbconect.php';
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
    <a class="head-logo" href="index.php"></a>
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

    <div class="cabecalho dados">
        <h2>01</h2>
        <h2>Carla Maria dos Santos</h2>
        <h2>(87)98800-9999</h2>
        <h2>teste@gmail.com</h2>
        <a class="btn" href="pets.html">Pets</a>
    </div>
</body>
</html>






<?php
                $queryLE  = "SELECT * FROM entidade";
                var_dump($queryLE);
                $teste = $con->query($queryLE);
                var_dump($teste);
                echo"<h2>" ."teste" . "</h2>";
        

                $queryLE  = "SELECT nome, email, telefone FROM entidade";
                $result = $con->prepare($queryLE);
                $result->execute();
                print_r($result);
                print("\n");
                    
                while($fetch = mysql_fetch_row($result)){
                    echo "<p>";
                            foreach ($fetch as $value) {
                            echo $value . " - ";
                            }
                    echo "</p>";
                    }
                    echo"<h2>" ."teste" . "</h2>";
?>