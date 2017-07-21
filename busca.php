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

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="navbar-brand" href="index.php">Boas Opções</a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Entrar</button>
            </form>
        </div>
    </nav>


    <section class="jumbotron text-center">
        <div class="container">
            <img src="images/logo.png" alt="">





            <!-- <div class="page">
        <div id="menu">
            <ul>
                <li style=""><a href="index.php">Home</a></li>
            </ul>
        </div>
        <div id="conteudo-principal">
            <div class="imagem">
                <img src="images/logo.png" alt="">
            </div>
            <h2>Encontre os melhores profissionais no nosso site</h2> -->
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
      
?>

                <div class="col-lg-12">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15d66a144c2%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15d66a144c2%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22118.0859375%22%20y%3D%2297.2%22%3E318x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                            data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                        <div class="card-block">
                            <h4 class="card-title"><? echo $nome ?></h4>
							<p class="card-text"><? echo $titulo ?></p>
							<p class="card-text"><? echo $texto ?></p>
                            <a href="#" class="btn btn-primary">Detalhar</a>
                        </div>
                    </div>
                </div>


                <?


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

        </div>
    </section>


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


        <footer class="text-muted">
            <div class="container">
                <p> © Copyright 2017 Boas Opcoes </p>
            </div>
        </footer>

</body>

</html>
