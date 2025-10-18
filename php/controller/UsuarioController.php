<?php
    $requisicao = $_POST['requisicao'];

    switch($requisicao){
        
        case 'Cadastrar Usuario';
            include '../controller/CadastrarUsuario.php';
            break;

        case 'Logar Usuario';
            include '../controller/Login.php';
            break;

        default:
            echo "Acão inválida, por gentileza selecionar uma opção válida";
            break;
    }
?>