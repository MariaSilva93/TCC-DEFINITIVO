<?php
require_once 'sql_connection/init.php';
$PDO = db_connect();

$sql = "SELECT nome, email, senha "
        . "FROM user where email = '{$_SESSION['email']}'";

if (isset($_SESSION['email'])) {
    $_SESSION['msg'] = "Está logado";
    header('location: treinos.php?=Logged');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Logar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Style/style-Login.css">
	<script src="https://kit.fontawesome.com/62b2e9a78b.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <a href="home.php" class="logo"> <span>Boa</span>Forma </a>
        <div id="menu-btn" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="planos.php">Planos</a>
            <a href="sobre.php">Sobre</a>
            <a href="contato.php">Contato</a>
        </nav>
    </header>
   <div class="main-login">
    <div class="left-login">
        <img src="images/login.jpg" alt="">
    </div>
    <div class="right-login"><div class="form-box">
    <form method="POST" action="sql_connection/sqlLogin.php">
        <h1>Faça o Login</h1>
        <div class="input-box">
        <i class="fa-solid fa-at"></i>
           <input type="email" placeholder="E-mail Id" name="email"> 
        </div>
        <div class="input-box2">
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="Senha" name="senha"> 
        <span class="eye" onclick="eyefunction()">
            <i id="hide1" class="fa-solid fa-eye"></i>
            <i id="hide2" class="fa-solid fa-eye-slash"></i>
        </span>
        </div>
        <div class="forgot-password">
            <a href="#" class="make-new-password">Esqueci minha senha</a>
        </div>
<!---------------------------------------------------------------------------->
<!--

        <div class="info-errada">
            <a href="#" class="errado">E-mail ou senha errada!</a>
        </div>
-->
<!---------------------------------------------------------------------------->
    <div class="btns">
        <button type="submit" class="login-btn popup-button" onclick="handlePopup(true)">LOGIN</button>
        <div class="container">
            <div class="popup" id="popup">
                <img src="images/warning.png" alt="warning">
                <h2 class="title">Warning!</h2>
                <p class="desc">Ocorreu um erro na execução do processo.</p>
                <button class="close-popup-button" onclick="handlePopup(false)">
                    Fechar
                </button>
            </div>
            </div>
    </div>
    <div class="new-account">
        <a class="make-new-account popup-button" onclick="handlePopup(true)">Se não tiver uma conta, <span>Faça seu Cadastro</span> </a>
        <div class="container">
            <div class="popup" id="popup">
                <img src="images/warning.png" alt="warning">
                <h2 class="title">Warning!</h2>
                <p class="desc">Ocorreu um erro na execução do processo.</p>
                <button class="close-popup-button" onclick="handlePopup(false)">
                    Fechar
                </button>
            </div>
            </div>
    </div>
    </div>
</form>
    <script>
        function eyefunction(){
            var x= document.getElementById("passId");
            var y= document.getElementById("hide1");
            var z= document.getElementById("hide2");
                if (x.type === "password") {
                    x.type = "text";
                    y.style.display = "block";
                    z.style.display = "none";
                } else{
                    x.type = "password";
                    y.style.display = "none";
                    z.style.display = "block";
                  }
        }
            const popup = document.getElementById('popup');
        function handlePopup(open) {
            popup.classList[open ? 'add' : 'remove']('opened');
}
    </script></div>
   </div>
    
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="Script/script.js"></script>
</body>
</html>
            