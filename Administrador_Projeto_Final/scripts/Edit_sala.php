<?php

session_start();
if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["jogo"]) && isset($_POST["mapa"]) && isset($_POST["piso"])) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);


    $query = "UPDATE salas SET Salas_nome = ?, Salas_descrição = ?, Salas_posição_jogo = ?, Salas_posição_mapa = ?, Salas_piso = ? WHERE Salas_id = ? ";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ssiiii',$nome,$descricao, $jogo,$mapa,$piso,$id);

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $jogo = $_POST['jogo'];
        $mapa = $_POST ['mapa'];
        $piso = $_POST['piso'];
        $id = $_SESSION['id_obra_update'] ;




        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            header("location:../Editar.php?sala=".$_SESSION ["id_item_update"]."");
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