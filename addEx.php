
<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = "SELECT userID, nome, email"
    . "FROM user where email = '{$_SESSION['email']}'";
    $sql = "SELECT * FROM `cadastroExerc`";
    $sql = mysqli_query($conexao,$sql);
 

//Table cadastroExerc
$ceRep = isset($_POST['ceRep']) ? $_POST['ceRep'] : null;
$ceSerie = isset($_POST['ceSerie']) ? $_POST['ceSerie'] : null;
$ceDescanso = isset($_POST['ceDescanso']) ? $_POST['ceDescanso'] : null;
$exercID = isset($_POST['exercID']) ? $_POST['exercID'] : null;
$exercTipo = isset($_POST['exercTipo']) ? $_POST['exercTipo'] : null;
$exercNome = isset($_POST['exercNome']) ? $_POST['exercNome'] : null;
$exercDesc = isset($_POST['exercDesc']) ? $_POST['exercDesc'] : null;

//validação usuário (Evitando os dados vazios)
if (empty($ceRep) || empty($ceSerie) || empty($ceDescanso) || empty($exercID)){
    echo "Volte e preencha todos os campos";
   exit; 
}

$PDO = db_connect();

//Table user - Insert

$sql = "INSERT INTO exercicio(exercID, exercTipo, exercNome, exercDesc) VALUES(:exercID, :exercTipo, :exercNome, :exercDesc)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':exercID', $exercID);
$stmt->bindParam(':exercTipo', $exercTipo);
$stmt->bindParam(':exercNome', $exercNome);
$stmt->bindParam(':exercDesc', $exercDesc);

$sql = "INSERT INTO cadastroExerc(ceID, ceRep, ceSerie, ceDescanso, exercID) VALUES(:ceID, :ceRep, :ceSerie, :ceData, :exercID)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':ceID', $ceID);
$stmt->bindParam(':ceRep', $ceRep);
$stmt->bindParam(':ceSerie', $ceSerie);
$stmt->bindParam(':ceData', $ceDescanso);
$stmt->bindParam(':exercID', $exercID);

if($stmt->execute()){
    header('Location: ../lista-exercicios.php');
}
else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>