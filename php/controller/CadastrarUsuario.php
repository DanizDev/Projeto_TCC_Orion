<?php
    require_once '../model/Conexao.php';

    $email = $_POST['emailUsuario'];
    $nome  = $_POST['nomeUsuario'];
    $senha = $_POST['senhaUsuario']; 


    
    if(!empty($email) && !empty($nome) && !empty($senha)){

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Usuario (Email, Nome, SenhaHash) VALUES (:email, :nome, :senha)";

        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':email', $email);
        $requisicao->bindParam(':nome', $nome);
        $requisicao->bindParam(':senha', $senhaHash);
        try{
            $requisicao->execute();
            echo"<script> 
            alert('Usuario Cadastrado Com Sucesso')
            window.location.href = '../view/login.html'
            </script>" ;
        }catch(PDOException $e){
            echo 'Erro ao cadastrar:'  . $e->getMessage();
        }

    }else{
        echo '<p style="color:red;">Preencha todos os campos. </p>';
    }




?>