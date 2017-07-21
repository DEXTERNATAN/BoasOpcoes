<!DOCTYPE html>
<html lang="en">

<head>
    <title>Boas Opções - Encontre o profissional que precisa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/reset.css" rel="stylesheet">
    
    <!-- Inclusão do bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- Css customizado pelo site -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="page">

        <!-- <div id="menu">
            <ul>
                <li style=""><a href="index.php"></a></li>
                    <li style=""><a href="index.php">Home</a> |</li>
                    <li><a href="quero_contratar.html">Quero contratar</a> |</li>
                    <li><a href="quero_trabalhar.html">Quero trabalhar</a> |</li>
                    <li><a href="contato.html">Entrar</a></li> 
            </ul>
        </div> -->

        <div id="conteudo-principal">
            <div class="imagem">
                <img src="images/logo.png" alt="">
            </div>
            <h2>Encontre os melhores profissionais no nosso site</h2>
            <div class="formulario">
                <form method="GET" action="busca.php">
                    <!-- <input type="text" name="" value=""><button type="submit" name="Buscar" value="Enviar">Buscar</button> -->
                    <input type="text" id="consulta" name="consulta" maxlength="255" /><button type="submit" name="Buscar" value="Enviar">Buscar</button>
                </form>
            </div>
        </div>

        <div id="rodape">
            <span class="copyright"> © Copyright 2000-2017 Boas Opcoes </span>
        </div>

    </div>

</body>

</html>
