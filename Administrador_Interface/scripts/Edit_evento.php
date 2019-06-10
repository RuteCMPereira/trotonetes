<?php

session_start();
if (isset($_POST["nome"]) && isset($_POST["datainicio"]) && isset($_POST["datafim"]) && isset($_POST["descricaocurta"]) && isset($_POST["descricaolonga"])) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE eventos SET Eventos_nome = ?, Eventos_data_inicio = ?, Eventos_data_fim = ?, Eventos_decrição_curta = ?, Eventos_descrição_longa = ? WHERE Eventos_id = ? ";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'sssssi',$nome,$inicio, $fim,$curta,$longa,$id );

        $nome = $_POST['nome'];
        $inicio = $_POST['datainicio'];
        $fim = $_POST['datafim'];
        $curta = $_POST ['descricaocurta'];
        $longa = $_POST['descricaolonga'];
        $id = $_SESSION ["id_evento_update"];




        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            header("location:../Editar.php?evento=".$_SESSION ["id_evento_update"]."");
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