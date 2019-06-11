<?php

session_start();
if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["pontos"])) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE conquistas SET Conquistas_nome = ?, Conquistas_descrição = ?,Conquistas_pontos = ?  WHERE Conquistas_id = ? ";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ssii', $nome, $descricao, $pontos, $id);

        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $pontos = $_POST["pontos"];
        $id =  $_SESSION['id_conquista_update'];


        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            header("location:../Editar.php?conquista=" .  $_SESSION['id_conquista_update']. "");
        }

        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($link);
    }
    /* close connection */
    mysqli_close($link);


} else {
    echo "algo de estranho se passou...";
}