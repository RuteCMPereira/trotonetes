<?php

session_start();
if (isset($_POST["nome"]) && isset($_POST["tempo"]) && isset($_POST["dinheiro"]) && isset($_POST["pontos"])   ) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);



    $query = "UPDATE tarefas SET Tarefas_nome = ?, Tarefas_tempo = ?,Tarefas_dinheiro = ?,Tarefas_pontos = ?  WHERE Tarefas_id = ? ";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'siiii', $nome, $tempo,$dinheiro, $pontos, $id);

        $nome = $_POST["nome"];
        $tempo = $_POST["tempo"];
        $dinheiro = ["dinheiro"];
        $pontos = $_POST["pontos"];
        $id =   $_SESSION['id_tarefa_update'] ;


        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            header("location:../Editar.php?tarefa=" .   $_SESSION['id_tarefa_update'] . "");
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