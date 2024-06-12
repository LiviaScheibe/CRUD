<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <a href="/crud/index.html">Voltar</a>
    <br>
    <?php
        include "conexao.php";

        $id = $_POST['id'];//usa o id para fazer um delete em um registro específico

        $sql = "DELETE FROM `pessoas` WHERE cod_pessoa = $id";
        //mensagem de erro ou confirmação
       if(mysqli_query($con, $sql)){
        echo " Excluido com sucesso!";
       }
       else{
        echo " Nao Excluido!";
       }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>