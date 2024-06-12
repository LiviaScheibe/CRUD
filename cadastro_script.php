<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
    <button type="button" class="btn btn-primary"><a href="/CRUD/index.html">Voltar</a></button>
    <br>
    <?php
        include "conexao.php";

        //transforma as colunas da tabela em variáveis
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];
        //passa o comando para uma variável
        $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) 
                    VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";
        //executa o comando com a conexão do servidor criada no conexão.php e deixa uma mensagem de erro ou de confirmação do cadastro
       if(mysqli_query($con, $sql)){
        echo "nome cadastrado com sucesso!";
       }
       else{
        echo "nome nao cadastrado!";
       }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>