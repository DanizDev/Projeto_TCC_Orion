<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" type="text/css" href="../../css/container-layout/telaInicial.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/componentes/CCB.css">
    <link rel="stylesheet" type="text/css" href="../../css/componentes/usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Define o ícone (favicon) que aparece na aba do navegador -->
    <link rel="icon" href="../../src/images/orion.png" type="image/x-icon" />
</head>

<body>
    <header>
        <div class="cabecalho">
            <div class="titulo">
                <h1> Orion IA</h1>
            </div>

            
                <?php if (isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id'])): ?>
                 <div class="user" onclick="mostrarMenu()">
                     <i class="fas fa-user" alt="Foto do usuario"></i> 
                 </div>   
                <nav class="menu" id="menuSuspenso">
                    <a href="./perfil.html"><i class="fa-solid fa-pen"></i></a>
                    <a href="./Home.html"><i class="fa-solid fa-house"></i></a>
                    <a href="../controller/Logout.php" name="requisicao" value="Logout"><i class="fa-solid fa-right-to-bracket"></i></a>
                </nav>
                <?php else: ?>
                <nav class="nav-links">
                    <a href="./login.html">Login</a>
                    <a href="./login.html">Cadastre-se</a>
                </nav>
            <?php endif; ?>

        </div>
    </header>

    <div class="container-principal">
        <div class="formulario">
            <div class="Logo">
                <img src="../../src/images/orion.png" alt="Logo da IA">
                <h1>Orion IA</h1>
            </div>


            <div class="contratar">
                <input type="submit" onclick="window.location.href='./login.html'"  value="Contratar Agora">
                <a href="./login.html" class="saiba-mais">Saiba mais...</a>
            </div>


            </form>
        </div>
        <script src="../../js/navbar.js"></script>
</body>

</html>