<?php

    require_once 'conexao.php'; 

    // Verifica se foi feita alguma busca
    // Caso contrario, redireciona o visitante pra home
    if (!isset($_GET['id'])) {
        header("Location: /");
        exit;
    }

    // Conecte-se ao MySQL antes desse ponto
    // Salva o que foi buscado em uma variável
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    if($id){
        if ($stmt = $mysqli->prepare("SELECT id, nome, titulo, texto, locais, telefone FROM `noticias` WHERE id = ".$id)) {
            $stmt->execute();

            /* bind variables to prepared statement */
            $stmt->bind_result($id, $nome, $titulo, $texto, $locais, $telefone);

            while ($stmt->fetch()) {


?>                
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Boas Opções - Encontre o profissional que precisa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="page">

        <div id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>

        <div id="conteudo-principal">

            <div class="imagem">
                <img src="images/logo.png" alt="">
            </div>
            <h2>Encontre os melhores profissionais no nosso site</h2>


<div style="text-align: left;">

<h3><? echo "<b>Nome:</b> ".$nome ?></h3>
<h3><? echo "<b>Titulo:</b> ".$titulo ?></h3>
<h3><? echo "<b>Texto:</b> ".$texto ?></h3>
<h3><? echo "<b>Locais:</b> ".$locais ?></h3>
<h3><? echo "<b>Telefone:</b> ".$telefone ?></h3>

</div>


<?
               
            }

        }
?>

<div style="text-align: center;">
    <br /><br />
<?

 if($stmt->num_rows == 0) {
    printf("A consulta não retornou nenhum registro: %d\n", $stmt->num_rows);
    print_r("<br /><br /><a href='index.php'>Voltar</a>");
  }else{
    printf("Quantidade de registros encontrados: %d.\n", $stmt->num_rows);
    print_r("<br /><br /><a href='index.php'>Voltar</a>");
  }

?>
</div>

<?

        /* close statement */
        $stmt->close();

        /* close connection */
        $mysqli->close();
    
    }else{
        printf("Paramentro de busca não informado");
    }


?>



        </div>

        <div id="rodape">
            <span class="copyright"> © Copyright 2000-2017 Boas Opcoes </span>
        </div>
    </div>

</body>

</html>