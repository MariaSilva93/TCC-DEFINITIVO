<?php
session_start();
require_once 'sql_connection/init.php';
define( 'RESTRICTED', true );
// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM user ORDER BY nome ASC";
$sql_count = "SELECT COUNT(*) AS total FROM exercicio ORDER BY exercID ASC";
$sql_count = "SELECT COUNT(*) AS total FROM cadastroExerc ORDER BY ceID ASC";

// SQL para selecionar os registros
$sql = "SELECT email, senha "
        . "FROM user ORDER BY nome ASC";
$sql = "SELECT cadastroExerc.ceID, cadastroexerc.ceRep, cadastroexerc.ceSerie, cadastroexerc.ceDescanso, "
        . "exercicio.exercNome, exercicio.exercDesc FROM cadastroExerc "
        . "INNER JOIN exercicio ON cadastroExerc.exercID = exercicio.exercID";
$result = mysqli_query($conexao, $sql);


    $exercID = isset($_GET['exercID']) ? $_GET['exercID'] : null;
    $ceRep = isset($_GET['ceRep']) ? $_GET['ceRep'] : null;
    $ceSerie = isset($_GET['ceSerie']) ? $_GET['ceSerie'] : null;
    $ceDescanso = isset($_GET['ceDescanso']) ? $_GET['ceDescanso'] : null;
    $exercNome = isset($_GET['exercNome']) ? $_GET['exercNome'] : null;
    $exercDesc = isset($_GET['exercDesc']) ? $_GET['exercDesc'] : null;

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

$tab_index = 1;
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Lista de exercícios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Style/style-exercise-list.css">
</head>
<body>
    <header class="header">
        <a href="home.php" class="logo"> <span>Boa</span>Forma </a>
        <div id="menu-btn" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="contato.php">Contato</a>
            <a href="treinos.php">Perfil</a>
            <?
                if (! empty($_SESSION['logged_in']))
                {?>
            <a href="/sql_connection/deslogar.php">Sair</a>
           <?}?>
        </nav>
    </header>
    <div class="container">
    <header>
        <h1>Lista de exercícios</h1>
    </header>
    <button class="icon-btn add-btn" onclick="window.location.href='forms-exercicio/addexform.php'">
    <div class="add-icon"></div>
    <div class="btn-txt"><b> Adicionar Exercício </b></div>
    </button><br><br>
    <?php 
    if(mysqli_num_rows($result))
    while ($sql = $stmt->fetch(PDO::FETCH_ASSOC)):?>
    <div class="project-container list">
        <div class="project" tabindex="<?php echo $tab_index; $tab_index++; ?>">
            <div class="top-menu">
            </div>
            <h2 class="project-title"><?=$sql['exercNome'] ?></h2>
            <p class="project-desc">
                <?=$sql['exercDesc']; ?>
            </p>
            <div class="project-info">
                <div class="detail flex">
                    <div class="info">
                        <i class="fas fa-tasks"></i>
                        <p>Séries: <b><?=$sql['ceSerie'] ?></b></p>
                    </div>
                </div>
                <div class="detail flex">
                    <div class="info">
                        <i class="fas fa-reply-all"></i>
                        <p>Repetições: <b><?=$sql['ceRep'] ?></b></p>
                    </div>
                </div>
                <div class="detail flex">
                    <div class="info">
                        <i class="fas fa-hourglass-half"></i>
                        <p>Descanso: <b><?=$sql['ceDescanso'] ?>s</b></p>
                    </div>
                </div>
            </div>
        </div>
        ?>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="Script/script.js"></script>
</body>
</html>