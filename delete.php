<?php
require_once 'init.php';
// pega o ID da URL
$id = isset($_GET['senha']) ? $_GET['senha'] : null;
// valida o email do usuário 
if (empty($senha))
{
    echo "Senha não informado ";
    exit;
}
// remove do banco
$conn = db_connect();
$sqlUser = "DELETE FROM user WHERE email = :email";
$stmt = $conn->prepare($sqlUser);
$stmt->bindParam(':email', $id, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: '.$path);
}
else
{
    echo "Erro ao acessar ";
    print_r($stmt->errorInfo());
}