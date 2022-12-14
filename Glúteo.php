<?php 
require_once '../sql_connection/init.php';
$PDO = db_connect();
// SQL para selecionar os registros
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
$sql = "SELECT * FROM `cadastroExerc`";
    $all_categories = mysqli_query($conexao,$sql);

if (isset($_POST['submit'])){
    $ceID = mysqli_real_escape_string($conexao,$_POST['ceID']);
    $exercID = mysqli_real_escape_string($conexao,$_POST['exercID']);
    $ceRep = mysqli_real_escape_string($conexao,$_POST['ceRep']);    
    $ceSerie = mysqli_real_escape_string($conexao,$_POST['ceSerie']);
    $ceDescanso = mysqli_real_escape_string($conexao,$_POST['ceDescanso']);

$query = "INSERT INTO cadastroExerc('exercID','ceRep','ceSerie','ceDescanso') VALUES('$exercID','$ceRep','$ceSerie','$ceDescanso')";
if(mysqli_query($conexao, $query))
        {
            echo '<script>alert("Data inserida concluída.")</script>';
        }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Cadastro exercício - Exercício Glúteo</title>
</head>
<body>
    <h1>Continuação cadastro - Glúteo</h1>
    <form action="../sql_connection/addEx.php" method="post" autocomplete="on">
    <?php while ($sql = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <label for="exercID">Escolha o exercício:</label>
            <select name="exercID" required>
                <option value="" selected hidden>Selecionar exercício...</option>
                <option value="35">1ㅤ|ㅤGlúteo na polia</option>
                <option value="36">2ㅤ|ㅤBúlgaro</option>
                <option value="37">3ㅤ|ㅤSumô</option>
                <option value="38">4ㅤ|ㅤMáquina de Glúteo</option>
            </select>
        <hr>
        <label for="ceRep">Quantidade de repetições:</label>
        <input type="text" name="ceRep" placeholder="Núm. de Repetições..." onkeypress='validate(event)'><br><br>
        <label for="ceSerie">Quantidade de séries</label>
        <input type="text" name="ceSerie" placeholder="Núm. de Séries..." onkeypress='validate(event)'><br><br>
        <label for="ceDescanso">Tempo de descanso (em segundos):</label>
        <input type="text" name="ceDescanso" placeholder="Tempo de descanso (em segundos)..." onkeypress='validate(event)'><br><br>
        <input type="submit" value="CONCLUIR CADASTRO DO EXERCÍCIO">
        <?php endwhile; ?>
    </form>
</body>

<script>
function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}</script>
</html>

