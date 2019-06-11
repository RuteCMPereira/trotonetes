<?php

echo "hello";

// Create a new DB connection

if (isset($_GET['elimina_item'])){

    $query = "DELETE FROM itens WHERE Itens_id = ?";
    $redirect = "Listagem.php?listagem=itens&page=1";

    $link2 = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link2);


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id);

        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        /* close statement */
        mysqli_stmt_close($stmt);
        mysqli_close($link2);
    } else {
        echo "Error: " . mysqli_error($link2);
        mysqli_stmt_close($stmt);
        mysqli_close($link2);
    }
}




?>