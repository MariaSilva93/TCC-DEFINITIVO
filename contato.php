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
$sqlUser = "SELECT cpf, senha "
        . "FROM user ORDER BY nome ASC";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sqlUser);
$stmt->execute();
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Style/style-Contato.css">

</head>
<body>
    <header class="header">

        <a href="home.php" class="logo"> <span>Boa</span>Forma </a>
    
        <div id="menu-btn" class="fas fa-bars"></div>
    
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="planos.php">Planos</a>
            <a href="sobre.php">Sobre</a>
            <a href="login.php">Perfil</a>
        </nav>

    </header>

    <div class="sla"></div>
    <div class="container"><div class="form-box"> 
      <form method="POST" action="sql_connection/add.php">
          <h1>Contato</h1>
          <div class="input-box">
             <input type="email" placeholder="E-mail Id"> 
          </div>

          <div class="testee">
            <textarea id="subject" name="subject" placeholder="Escreva o motivo de você estar entrando em contato conosco..." style="height:200px"></textarea>
         </div>
          
  
          <div class="btns">
          <button type="button" class="login-btn">ENVIAR</button>
      </div>
      </form>
    </div>
</div>
</div>









<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="Script/script.js"></script>
    
</body>
</html>
         