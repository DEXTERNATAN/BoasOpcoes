<!DOCTYPE html>
<html lang="en">

<head>
    <title>Boas Opções - Encontre o profissional que precisa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/reset.css" rel="stylesheet">

    <!-- Inclusão do bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>

    <!-- Css customizado pelo site -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/boasopcoes.css" rel="stylesheet">

</head>

<body>
  <div class="page">

    <div id="menu">
      <ul>
        <li style=""><a href="index.php">Home</a></li>
      </ul>
    </div>

    <div id="conteudo-principal">

      <div class="imagem">
        <img src="images/logo.png" alt="">
      </div>
      <h2>Encontre os melhores profissionais no nosso site</h2>
<?php

require_once 'conexao.php'; 

// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante pra home
if (!isset($_GET['consulta'])) {
  header("Location: /");
  exit;
}

// Conecte-se ao MySQL antes desse ponto
// Salva o que foi buscado em uma variável
$busca = mysqli_real_escape_string($mysqli, $_GET['consulta']);

if($busca){
  

// ============================================
// Monta outra consulta MySQL para a busca
/* prepare statement */
if ($stmt = $mysqli->prepare("SELECT id, nome, titulo, texto, locais, telefone FROM `noticias` WHERE (`ativa` = 1) AND ((`titulo` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `cadastro` DESC")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($id, $nome, $titulo, $texto, $locais, $telefone);
// Executa a consulta
//$query = mysqli_query($mysqli,$sql);


// ============================================
// Começa a exibição dos resultados

 /* fetch values */
echo "<ul>";

while ($stmt->fetch()) {
  //printf("%s %s %s\n", $id, $titulo, $texto);

   $link = '/detalhes.php?id=' . $id;
  
   echo "<li>";
     echo "<a href='{$link}'>";
       echo "<h3>{$nome}</h3></a>";
       echo "<p>{$titulo}</p>";
       echo "<p>{$texto}</p>";
       echo "<p>{$locais}</p>";
       echo "<p>{$telefone}</p>";
   echo "</li>";
   echo "<br />";
 }
 echo "</ul>";
}

?>

<div style="text-align: center;">

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
  printf("O campo de pesquisa não pode ficar vazio. Preencha o campo de busca");
}


?>

    </div>

    <div id="rodape">
      <span class="copyright"> © Copyright 2000-2017 Boas Opcoes </span>
    </div>
  </div>

</body>

</html>