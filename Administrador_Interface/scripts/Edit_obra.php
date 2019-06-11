<?php

session_start();
if (isset($_POST["nome"]) && isset($_POST["data"]) && isset($_POST["descricao"])   ) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);



    $query = "UPDATE obras SET Obras_nome = ?, Obras_descrição = ?, Obras_data = ? WHERE Obras_id = ? ";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ssii',$nome,$descricao, $data, $id);

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $data = $_POST['data'];
        $id = $_SESSION ["id_obra_update"];




        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            header("location:../Editar.php?obra=".$_SESSION ["id_obra_update"]."");
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