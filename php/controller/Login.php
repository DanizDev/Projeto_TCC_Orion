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

header ('Location: ../view/TelaPosLogin.html');

}else{

echo'Usuario ou senha incorretos';

}

}else{

echo'Preencha todos os campos';

}
?>