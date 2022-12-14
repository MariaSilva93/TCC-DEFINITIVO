<?php
session_start();
require_once 'sql_connection/init.php';
define( 'RESTRICTED', false );
// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM user ORDER BY nome ASC";

// SQL para selecionar os registros
$sqlUser = "SELECT nome, sobrenome, email, celular, data_nascimento, cpf, senha,"
        . " FROM user ORDER BY nome ASC";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
$timestamps = false;
// seleciona os registros
$stmt = $PDO->prepare($sqlUser);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edgeid="Senha"">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Criar conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Style/style-New-Account.css">
    <script src="https://kit.fontawesome.com/62b2e9a78b.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">

        <a href="home.php" class="logo"> <span>Boa</span>Forma </a>

        <div id="menu-btn" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="planos.php">Planos</a>
            <a href="sobre.php">Sobre</a>
            <a href="contato.php">Contato</a>

        </nav>

    </header>



    <div class="main-login">
        <div class="left-login">
            <img src="images/login.jpg" alt="" class="img-sla">
        </div>





        <form method="POST" action="sql_connection/add.php">
            <div class="right-login">
                <div class="form-box">
                    <h1>Crie Nova Conta</h1>

                    <div class="info1">
                        <div class="input-box3">
                            <input id="nome" type="text" placeholder="Nome" name="nome">
                        </div>
                        <div class="input-box3">
                            <input id="sobrenome" type="text" placeholder="Sobrenome" name="sobrenome">
                        </div>
                    </div>
                        <div class="input-box">
                            <input id="email" type="text" placeholder="E-mail" name="email">
                    </div>
                        <div class="input-box2">
                            <input id="senha" type="password" placeholder="Senha"  name="senha">
                            <span class="eye" onclick="eyefunction()">
                                <i id="hide1" class="fa-solid fa-eye"></i>
                                <i id="hide2" class="fa-solid fa-eye-slash"></i>
                            </span>
                    </div>
                        <div class="info2">
                        <div class="input-box4">
                            <input id="celular" type="text" placeholder="Número Telefone" name="celular">
                        </div>
                        <div class="input-box4">
                            <input id="data_nascimento" type="date" placeholder="Data de nasc" name="data_nasc">
                        </div>
                    </div>
                    <div class="input-box">
                        <input id="cpf" type="text" placeholder="CPF" name="cpf">
                    </div>

                    <div class="btns">
                            <button type="submit" class="login-btn">CADASTRAR</button>
                    </div>
        </form>


        <script>
            function eyefunction() {
                var x = document.getElementById("passId");
                var y = document.getElementById("hide1");
                var z = document.getElementById("hide2");

                if (x.type === "password") {
                    x.type = "text";
                    y.style.display = "block";
                    z.style.display = "none";
                } else {
                    x.type = "password";
                    y.style.display = "none";
                    z.style.display = "block";
                }
            }
        </script>
    </div>
    </div>









    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="Script/script.js"></script>

</body>

</html>