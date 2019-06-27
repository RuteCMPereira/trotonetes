<?php


require_once "../connections/connection.php";

session_start();

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "UPDATE utilizadores SET Utilizadores_tour".$_GET["num_tour"]." = 1 WHERE Utilizadores_id = ? ";


if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $id);

    $id =  $_SESSION['id_u'];

    if (mysqli_stmt_execute($stmt)) {

        $_SESSION['tour']=1;
      }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}