<?php 
    include_once './dbconect.php';
?>

<?php
        $id =  filter_input(INPUT_GET, "id");
        $dataPost = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        var_dump($dataPost);
        $entId = filter_input(INPUT_POST, 'entId', FILTER_SANITIZE_NUMBER_INT);
        $nomepet = filter_input(INPUT_POST, 'nomepet', FILTER_SANITIZE_STRING);
        $raca = filter_input(INPUT_POST, 'raca', FILTER_SANITIZE_STRING);
        $tipopet = filter_input(INPUT_POST, 'tipopet', FILTER_SANITIZE_STRING);
        //$msg_incorretData = null;

        if(!empty($nomepet) && !empty($raca) && !empty($tipopet)) {
            try{

                            
                $msg = null;
                $ret = 1;
                //$queryCadEnt  = "CALL sp_cadastrar_entidade ($nome, $email, $telefone)";
                
                /*
                //$queryCadEnt  = "call sp_cadastrar_entidade ($nomepet , $tipopet, $raca)";
                //$ret = $con->exec($queryCadEnt); */
                // $queryCadEnt  = "CALL sp_cadastrar_entidade (:nome, :email, :tell)";
                // $stm = $con->prepare($queryCadEnt);
                // $stm->bindParam(':nome', $nome);
                // $stm->bindParam(':email', $email);
                // $stm->bindParam(':tell', $telefone);
                // $stm->execute();
                //print("iserido". $ret. "linha\n");   
                // $ret= $stm->execute();
                if($ret){
                    
                    // $stm2= $con->prepare("SELECT entidade.codigo FROM entidade WHERE entidade.nome = :nome");
                    // $stm2->bindParam(':nome', $nome);
                    // $stm2->execute();
                    // $records = $stm2->fetchAll();
                    // $entId = $records[0][0];
                    // AREA PET
                    $stm3= $con->prepare("CALL sp_cadastrar_pet (:nomepet, :raca, :tipopet, :id_cliente)");
                    $stm3->bindParam(':nomepet', $nomepet);
                    $stm3->bindParam(':raca', $raca);
                    $stm3->bindParam(':tipopet', $tipopet);
                    $stm3->bindParam(':id_cliente', $entId);
                    $stm3->execute();
                    $msg = "<p class='sucesso'> Dados cadastrados com sucesso! </p>";
                    $newURL = "./clientes.php?id=$id";
                    // header("Location: $newURL");
                    header( "refresh:2;url=$newURL");
                    // die(); //aparecer pagina em branco

                }
                else{ 
                $msg = "<p>Operação não realizada. Tente novamente.</p>";
                }
            }catch (Exception $e){
                    echo $e;
            }

        } else {
           // $msg_incorretData = "Dados inválidos no cadastro. Tente novamente.";
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global.css">
    <!-- <link rel="stylesheet" href=" https://storage.cloud.google.com/backup-goldenpet/css/global.css"> -->
    <link rel="stylesheet" href="./css/cadastro.css">
    <title>Cadastro</title>
</head>
<header>
    <a class="head-logo" href="./index.php"></a>
</header>
<body>
    <h1 class="titulo">Cadastrar-se</h1>
    
    <?php
        if( isset($msg) && !is_null($msg)) {
            echo  $msg;
        }
    ?>
   <form class="cadastro" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <label>DADOS DO CLIENTE</label>
       <!-- <input type="text" id="nome" name="nome" placeholder="Nome">
       <input type="email" id="email" name="email" placeholder="E-mail">
       <input type="tel" id="tel" name="telefone" placeholder="Telefone"> -->

       <label>DADOS DO PET</label>
       <?php
            echo "<input type='number' id='entId' name='entId' readonly placeholder='Código Cliente' 'value='$id'>";
       ?>
       <input type="text" id="nomepet" name="nomepet" placeholder="Nome do PET">
       <input type="text" id="raca" name="raca" placeholder="Raça">
       <label >Tipo PET</label>
       <div class="cadastro">
            <select name="tipopet" id="pet" class="select" >
                <option value="" hidden>SELECIONE SEU PET</option>
                <option value="" disabled>SELECIONE SEU PET</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Gato">Gato</option>
            </select>
            <?php
            echo "<h2>$id</h2>";
            ?>
        </div>

       <input type="submit" id="submit" name="submit" value="Salvar">  
   </form>
   <!--<a class="btn" href="/pets.html">Adicionar Pet</a>-->
   <?php
        echo "<a class='btn' href='./pets.php?id=$id'>Retornar</a>";
   ?>
</body>
</html>