<?php

session_start();
if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["cor"]) && isset($_POST["raio"]) && isset($_POST["intensidade"])) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);


    $query = "UPDATE lanternas SET Lanternas_nome = ?, Lanternas_descrição = ?,Lanternas_cor = ?,Lanternas_raio = ?,Lanternas_intensidade = ? WHERE Lanternas_id = ? ";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'sssiii', $nome, $descricao, $cor, $raio, $intensidade, $id);

        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $cor = $_POST["cor"];
        $raio = $_POST["raio"];
        $intensidade = $_POST["intensidade"];
        $id = $_SESSION['id_lanterna_update'];


        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            header("location:../Editar.php?lanterna=" . $_SESSION['id_lanterna_update']. "");
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