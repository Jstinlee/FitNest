<?php
session_start();

if (array_key_exists("logout", $_GET)) {

        session_destroy();
        setcookie("username", "", time() - 60*60);
        $_COOKIE["username"] = "";
        header("Location: login.php");

    }
    else{
      echo "WRG";
    }
 ?>
