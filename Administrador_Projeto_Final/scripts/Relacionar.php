
<?php

if ($_POST['submit']=="sala"){


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO salas_has_imagens (Salas_Salas_id, Imagens_Imagens_id) VALUES (?,?)";


    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ii', $evento, $imagem);
        $evento = $_SESSION['id_sala'];
        $imagem = $_SESSION['id_imagem'];

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);


        } else {
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        }

    }

}


if ($_POST['submit']=="evento"){


$link2= new_db_connection();
$stmt2 = mysqli_stmt_init($link2);
$query2 = "INSERT INTO eventos_has_imagens (Eventos_Eventos_id,Imagens_Imagens_id) VALUES (?,?)";


if (mysqli_stmt_prepare($stmt2, $query2)) {
    mysqli_stmt_bind_param($stmt2, 'ii', $evento, $imagem);
    $evento = $_SESSION['id_evento'];
    $imagem = $_SESSION['id_imagem'];

    if (mysqli_stmt_execute($stmt2)) {
        mysqli_stmt_close($stmt2);
        mysqli_close($link2);


    } else {
        mysqli_stmt_close($stmt2);
        mysqli_close($link2);
    }

}

}
