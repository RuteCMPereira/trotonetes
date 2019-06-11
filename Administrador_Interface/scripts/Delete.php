<?php

include_once "../connections/connection.php";

if (isset($_GET['item'])) {

    $query = "DELETE FROM itens WHERE Itens_id = ?";

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $id = $_GET['item'];
    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id);

        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            header("location:Listagem.php?listagem=vestuario&page=1");
        }


        /* close statement */
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "Error: " . mysqli_error($link);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
}


?>

<?php

include_once "../connections/connection.php";

if (isset($_GET['utilizador'])) {

    $query = "DELETE FROM utilizadores WHERE Utilizadores_id = ?";

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $id = $_GET['utilizador'];
    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id);

        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            header("location:../Listagem.php?listagem=utilizadores&page=1");
        }


        /* close statement */
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "Error: " . mysqli_error($link);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
}


?>


<?php

include_once "../connections/connection.php";

if (isset($_GET['sala'])) {




    $query = "DELETE FROM salas_has_imagens WHERE Salas_Salas_id = ?";

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $id = $_GET['sala'];
    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id);

        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        /* close statement */
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "Error: " . mysqli_error($link);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }

    $query = "DELETE FROM salas WHERE Salas_id = ?";

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $id = $_GET['sala'];
    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id);

        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            header("location:../Listagem.php?listagem=salas&page=1");
        }


        /* close statement */
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "Error: " . mysqli_error($link);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }


}


?>

<?php

include_once "../connections/connection.php";

if (isset($_GET['evento'])) {

    $query = "DELETE FROM eventos_has_imagens WHERE Eventos_Eventos_id = ?";

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $id = $_GET['evento'];
    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id);

        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        /* close statement */
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "Error: " . mysqli_error($link);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }

    $query = "DELETE FROM eventos WHERE Eventos_id = ?";

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $id = $_GET['evento'];
    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id);

        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            header("location:../Listagem.php?listagem=salas&page=1");
        }


        /* close statement */
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "Error: " . mysqli_error($link);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }


}


?>


