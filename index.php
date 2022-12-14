<?php
require_once 'sql_connection/init.php';
$PDO = db_connect();

$sql = "SELECT nome, email, senha "
        . "FROM user where email = '{$_SESSION['email']}'";

if (isset($_SESSION['email'])) {
    $_SESSION['msg'] = "Você está logado";
    header('location: home.php?=Logged');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Início</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Style/style-Home.css">

</head>
<body>
    <header class="header">

        <a href="index.php" class="logo"> <span>Boa</span>Forma </a>
    
        <div id="menu-btn" class="fas fa-bars"></div>
    
        <nav class="navbar">
            <a href="planos.php">Planos</a>
            <a href="sobre.php">Sobre</a>
            <a href="contato.php">Contato</a>
            <a href="login.php">Perfil</a>
        </nav>

    </header>

    
    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide" style="background: url(images/home-bg-1.jpg) no-repeat;">
                    <div class="content">
                        <span>Olá, usuário!</span>
                        <h3>Inicie a sessão para começar o treino!</h3>
                        <a href="login.php" class="btn">Logar</a>
                    </div>
                </div>
    
                <div class="swiper-slide slide" style="background: url(images/home-bg-2.jpg) no-repeat;">
                    <div class="content">
                        <span>Olá, usuário!</span>
                        <h3>Inicie a sessão para começar o treino!</h3>
                        <a href="login.php" class="btn">Logar</a>
                    </div>
                </div>
    
                <div class="swiper-slide slide" style="background: url(images/home-bg-3.jpg) no-repeat;">
                    <div class="content">
                        <span>Olá, usuário!</span>
                        <h3>Inicie a sessão para começar o treino!</h3>
                        <a href="login.php" class="btn">Logar</a>
                    </div>
                </div>
    
            </div>
    
            <div class="swiper-pagination"></div>
        </div>
    </section>
    

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="Script/script.js"></script>


</body>
</html>
            