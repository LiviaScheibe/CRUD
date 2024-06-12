<?php
    //inicia uma conexão com o servidor criado no xampp e cria uma mensagem de erro ou confirmação de conexão
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $bd = 'compania';

    if($con = mysqli_connect($server, $user, $pass, $bd)){
        echo '';
    } else{
        echo 'Erro!';
    }

?>