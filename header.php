<?php

if ( defined( 'RESTRICTED' ) ) {
    if ( !isset( $_SESSION['email'] ) ) {
      header( 'Location: home.php' );
      exit();
    }
}
else {
    if ( isset( $_GET['logout'] ) ) {
      $_SESSION = array();
    }
    if ( defined( 'SEND_TO_HOME' ) && isset( $_SESSION['email'] ) ) {
      header( 'Location: home.php' );
      exit();
    }
}
?>