<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesquisa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .form-inline {
      display: flex;
      align-items: center;
    }
  </style>
</head>

<body>

  <?php
  
  //esse pedaço cria uma variável pesquisa onde ela pega o que for digitado no input, e cria um select com uma condição onde o 
  //nome deve ser igual a o que você pesquisou  
  $pesquisa = $_POST['busca'] ?? '';

  include "conexao.php";

  $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

  $dados = mysqli_query($con, $sql);

  ?>

  <h1>Pesquisar</h1>
  <br>
  <form class="form-inline my-2 my-lg-0" action="pesquisa.php" method="POST">
    <input class="form-control mr-sm-2" type="search" name="busca" autofocus>
    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Endereço</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col">Data de Nascimento</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //esse while passa pelos dados do banco e faz um echo que vai exibir em forma de tabela no html
      while ($linha = mysqli_fetch_array($dados)) {
        $cod_pessoa = $linha['cod_pessoa'];
        $nome = $linha['nome'];
        $endereco = $linha['endereco'];
        $telefone = $linha['telefone'];
        $email = $linha['email'];
        $data_nascimento = $linha['data_nascimento'];

        echo "<tr>
                  <th scope='row'>$nome</th>
                  <td>$endereco</td>
                  <td>$telefone</td>
                  <td>$email</td>
                  <td>$data_nascimento</td>
                  <td><a class='btn btn-success' href='cadastro_editar.php?id=$cod_pessoa'>Editar</a></td>
                  <td><a class='btn btn-danger' href='#' data-toggle='modal' data-target='#modal_confirmar' 
                  onClick=" .'"'. "pegar_dados($cod_pessoa)" .'"'. ">Excluir</a></td>
                </tr>";
      }

      ?>
    </tbody>
  </table>

  <a type="submit" class="btn btn-primary" href="index.html">Voltar</a>

  <!-- Modal que confirma o excluir -->
  <div class="modal fade" id="modal_confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirma?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="excluir_script.php" method="POST">
          Deseja realmente excluir?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <input type="submit" class="btn btn-primary" value="Sim">
            <input type="hidden" name="id" id="cod_pessoa" value="">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    //função que pega dados baseado no id para utilizar depois
    function pegar_dados(id){
      document.getElementById('cod_pessoa').value = id;
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>