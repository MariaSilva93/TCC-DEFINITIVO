<?php
session_start();
require_once 'init.php';
session_destroy();
header('Location: /index.php');
?>