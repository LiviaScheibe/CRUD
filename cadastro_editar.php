<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <?php 

    include "conexao.php";
    //pega o id e seleciona todas as informações do id selecionado pra edição no editar_script
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";

    $dados = mysqli_query($con, $sql);
    $linha = mysqli_fetch_assoc($dados);
    
  ?>
    
    <div class="container">
    <h1>Cadastro</h1>

        <form action="editar_script.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label><!--esse trecho de php basicamente pega a informação das colunas da tabela e insere uma por uma num input para modificação-->
                <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco" required value="<?php echo $linha['endereco']; ?>">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="number" class="form-control" name="telefone" required value="<?php echo $linha['telefone']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required value="<?php echo $linha['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                <input type="date" class="form-control" name="data_nascimento" required value="<?php echo $linha['data_nascimento']; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a type="submit" class="btn btn-primary" href="index.html">Voltar</a>
            <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']?>">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>