<?php

session_start();

if (isset($_SESSION['utilizador_perfil'])) {

    if ($_SESSION['utilizador_perfil'] == 1) {
        header("location:Homepage.php");
    }
    else{
        header("location:Log_In.php");
    }

} else {

    header("location:Log_In.php");

}