<?php

session_start();
if (isset($_POST["perfil"])) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE utilizadores SET Perfis_id = ? WHERE Utilizadores_id = ? ";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $perfil_id, $id_utilizador);

        $perfil_id = $_POST['perfil'];

        $id_utilizador = $_SESSION['id_utilizador_update'];


        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            header("location:../Editar.php?utilizador=". $_SESSION['id_utilizador_update']."");
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