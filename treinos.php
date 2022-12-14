<?php
session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "Você precisa logar primeiro";
    header('location: index.php?=Precisa logar');
}
require_once 'sql_connection/init.php';


//define( 'RESTRICTED', true );
//require( 'sql_connection/header.php' );
// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM user ORDER BY nome ASC";

// SQL para selecionar os registros
$sql = "SELECT email, senha "
        . "FROM user ORDER BY nome ASC";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Treino</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Style/style-exercise.css">

</head>
<body>
    <header class="header">

        <a href="home.php" class="logo"> <span>Boa</span>Forma </a>
    
        <div id="menu-btn" class="fas fa-bars"></div>
    
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="contato.php">Contato</a>
            <?
                if (! empty($_SESSION['logged_in']))
                {?>
            <a href="/sql_connection/deslogar.php">Sair</a>
            <?}?>
        </nav>

    </header>
<a class="fade" href="lista-exercicios.php">
<section class="banner">
<h3>Treino do dia</h3>
<p>Clique para fazer o seu treino</p>
</section>
</a>


<section class="blogs" id="blogs">

    <h1 class="heading"> <span class="span1">|</span> <span>Treinos Anteriores</span></h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/treino-abdomen.png" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">Realizado</a> <span>|</span> <a href="#">05 de outubro de 2022</a> </div>
                    <h3>Treino de Abdômen</h3>
                    <p>12 séries de 6 repetições</p>
                </div>
            </div>
            
            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/treino-peito.png" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">Realizado</a> <span>|</span> <a href="#">04 de outubro de 2022</a> </div>
                    <h3>Treino de Peito</h3>
                    <p>6 séries de 12 repetições</p>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/treino-costas.png" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">Realizado</a> <span>|</span> <a href="#">03 de outubro de 2022</a> </div>
                    <h3>Treino de Costas</h3>
                    <p>10 séries de 10 repetições</p>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/treino-posterior.jpg" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">Realizado</a> <span>|</span> <a href="#">02 de outubro de 2022</a> </div>
                    <h3>Treino de Posterior</h3>
                    <p>12 séries de 6 repetições</p>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/treino-triceps.jpg" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">Realizado</a> <span>|</span> <a href="#">21st may, 2021</a> </div>
                    <h3>Treino de Tríceps</h3>
                    <p>6 séries de 20 repetições</p>
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