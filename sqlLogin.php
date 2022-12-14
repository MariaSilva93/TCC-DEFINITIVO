<?php
session_start();
include('init.php');

$nome = "";
$email    = "";
$senha = "";
$errors = array();
$_SESSION['success'] = "";

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../login.php?error=Email ou Senha nao inseridos');
    exit();
}

 $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$query = "select cpf, email, senha from user where email = '{$email}' and senha = md5('{$senha}')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
if ($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: ../home.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}
//    }else{
//        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
//        $result = mysqli_query($conn, $sql);
//        if (mysqli_num_rows($result) === 1) {
//            $row = mysqli_fetch_assoc($result);
//            if ($row['user_name'] === $uname && $row['password'] === $pass) {
//                echo "Logged in!";
//               $_SESSION['user_name'] = $row['user_name'];
//                $_SESSION['name'] = $row['name'];
//                $_SESSION['id'] = $row['id'];
//                header("Location: home.php");
//                exit();
//            }else{
//                header("Location: index.php?error=Incorect User name or password");
//               exit();
//           }
//       }else{
//           header("Location: index.php?error=Incorect User name or password");
//            exit();
//        }
//    }
//}else{
//    header("Location: index.php");
//    exit();
//}
