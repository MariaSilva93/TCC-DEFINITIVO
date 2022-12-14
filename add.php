<?php
require_once 'init.php';

//Pegando os dados do formulário

//Table user
$userID = isset($_POST['userID']) ? $_POST['userID'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$celular = isset($_POST['celular']) ? $_POST['celular'] : null;
$data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

//Table exercicio
$exercID = isset($_POST['exercID']) ? $_POST['exercID'] : null;
$exercNome = isset($_POST['exercNome']) ? $_POST['exercNome'] : null;
$exercDesc = isset($_POST['exercDesc']) ? $_POST['exercDesc'] : null;

//Table cadastroExerc

$ceID = isset($_POST['ceID']) ? $_POST['ceID'] : null;
$ceRep = isset($_POST['ceRep']) ? $_POST['ceRep'] : null;
$ceSerie = isset($_POST['ceSerie']) ? $_POST['ceSerie'] : null;
$ceDescanso = isset($_POST['ceDescanso']) ? $_POST['ceDescanso'] : null;

//validação usuário (Evitando os dados vazios)
if (empty($nome) || empty($sobrenome) || empty($email) || empty($celular) || empty($data_nasc) || empty($cpf) || empty($senha)){
    echo "Volte e preencha todos os campos";
   exit; 
}

$PDO = db_connect();

//Table user - Insert
$sql = "INSERT INTO user(nome, sobrenome, email, senha, celular, data_nasc, cpf) VALUES(:nome, :sobrenome, :email, :senha, :celular, :data_nasc, :cpf)"; 
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':sobrenome', $sobrenome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':celular', $celular);
$stmt->bindParam(':data_nasc', $data_nasc);
$stmt->bindParam(':cpf', $cpf);

$sql = "INSERT INTO exercicio(exercID, exercTipo, exercNome, exercDesc) VALUES(:exercID, :exercTipo, :exercNome, :exercDesc)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':exercID', $exercID);
$stmt->bindParam(':exercTipo', $exercTipo);
$stmt->bindParam(':exercNome', $exercNome);
$stmt->bindParam(':exercDesc', $exercDesc);

$sql = "INSERT INTO cadastroExerc(ceID, ceRep, ceSerie, ceData) VALUES(:ceID, :ceRep, :ceSerie, :ceData)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':ceID', $ceID);
$stmt->bindParam(':ceRep', $ceRep);
$stmt->bindParam(':ceSerie', $ceSerie);
$stmt->bindParam(':ceData', $ceData);

if($stmt->execute()){

    header('Location: lista-exercicios.php');
}
else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>