<?php

/**
 * Conecta com o MySQL usando PDO
 */
function db_connect() {
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    return $PDO;
}
function check_login($PDO) {
    if(isset($_SESSION['userID'])) {
        $id = $_SESSION['userID'];
        $query = "select * from user where userID = '$id' limit 1";
        $result = mysqli_query($PDO,$query);
            if($result && mysqli_num_rows($result) > 0) {
                $userDados = mysqli_fetch_assoc($result);
                return $userDados;
            }
    }
    header("Location: ../login.php");
    die;
}
?>