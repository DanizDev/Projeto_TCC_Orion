<?php
    $requisicao = $_POST['requisicao'];

    switch($requisicao){
        
        case 'Cadastrar';
            include 'CadastrarUsuario.php';
            break;

        case 'Entrar';
            include 'Login.php';
            break;

        default:
            echo "Acão inválida, por gentileza selecionar uma opção válida";
            break;
    }
?>