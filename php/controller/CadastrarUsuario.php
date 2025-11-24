<?php
    require_once '../model/Conexao.php';

    $email = $_POST['emailUsuario'];
    $nome  = $_POST['nomeUsuario'];
    $senha = $_POST['senhaUsuario']; 
    $confirmarSenha = $_POST['confirmarSenha'];


    
    if(!empty($email) && !empty($nome) && !empty($senha)){

        if($senha !== $confirmarSenha){
            echo"<script>
            alert('As senhas se diferem')
            </script>";

            exit;
        }

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