<?php

session_start();

require_once '../model/Conexao.php';

$email = $_POST['emailUsuario'];
$senha = $_POST['senhaUsuario'];

if(!empty($email) && !empty($senha)){

$sql = 'SELECT * FROM Usuario WHERE Email = :email';

$requisicao = $conexao -> prepare($sql);
$requisicao -> bindParam(':email', $email);
$requisicao -> execute();

$usuario = $requisicao -> fetch(PDO::FETCH_ASSOC);

if($usuario && password_verify($senha, $usuario['SenhaHash'])){

    $_SESSION['usuario_id'] = $usuario['IdUsuario'];
    $_SESSION['usuario_nome'] = $usuario['Nome'];

        echo"<script> 
        alert('Login feito com sucesso!!')
        setTimeout(function() {

        window.location.href = '../view/TelaPosLogin.html';
        }, 50);
        </script>" ;
        exit;
        
}else{
       echo "<script>
            alert('Email ou senha incorretos!');
            window.location.href = '../view/login.html';
        </script>";
        exit;
}


}else{

echo "<script>
        alert('Preencha todos os campos!');
        window.location.href = '../view/login.html';
    </script>";
    exit;

}
?>