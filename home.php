 <?php
    session_start();
require_once 'sql_connection/init.php';
// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM user ORDER BY nome ASC";

// SQL para selecionar os registros
$sql = "SELECT nome, email, senha "
        . "FROM user where email = '{$_SESSION['email']}'";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "Você precisa logar primeiro";
    header('location: index.php?=Precisa logar');
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

        <a href="home.php" class="logo"> <span>Boa</span>Forma </a>
    
        <div id="menu-btn" class="fas fa-bars"></div>
    
        <nav class="navbar">
            <a href="contato.php">Contato</a>
            <?
                if (empty($_SESSION['logged_in']))
                {?>
            <a href="/sql_connection/deslogar.php">Sair</a>
            <?}
                else {
                    echo 'Você não está logado. Volte para logar.';} ?>
        </nav>

    </header>

    <?php while ($sql = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide" style="background: url(images/home-bg-1.jpg) no-repeat;">
                    <div class="content">
                        <span>Olá, <?php if ($_SESSION['email']):
                            echo $sql['nome'];
                        endif;
                            ?></span>
                        <h3>Vamos começar o treino de hoje!</h3>
                        <a href="treinos.php" class="btn">Começar Treino</a>
                    </div>
                </div>
    
                <div class="swiper-slide slide" style="background: url(images/home-bg-2.jpg) no-repeat;">
                    <div class="content">
                    <span>Olá, <?php if ($_SESSION['email']):
                            echo $sql['nome'];
                        endif;
                            ?></span>
                        <h3>Vamos começar o treino de hoje!</h3>
                        <a href="treinos.php" class="btn">Começar Treino</a>
                    </div>
                </div>
    
                <div class="swiper-slide slide" style="background: url(images/home-bg-3.jpg) no-repeat;">
                    <div class="content">
                    <span>Olá, <?php if ($_SESSION['email']):
                            echo $sql['nome'];
                        endif;
                            ?></span>
                        <h3>Vamos começar o treino de hoje!</h3>
                        <a href="treinos.php" class="btn">Começar Treino</a>
                    </div>
                </div>
    
            </div>
    
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <?php endwhile; ?>
    

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="Script/script.js"></script>


</body>
</html>
            