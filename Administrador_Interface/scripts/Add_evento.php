<?php
session_start();
include_once "../connections/connection.php";

if (isset($_POST["nome"]) && isset($_POST["data_inicio"]) && isset($_POST["data_fim"]) && isset($_POST["descrição_curta"]) && isset($_POST["descrição_longa"])) {

    // INSERIR DADOS NA BASE DE DADOS NA TABELA EVENTOS

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO eventos (Eventos_nome, Eventos_data_inicio, Eventos_data_fim,Eventos_decrição_curta, Eventos_descrição_longa) VALUES (?,?,?,?,?)";


    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sssss', $nome, $inicio, $fim, $curta, $longa);
        $nome = $_POST['nome'];
        $inicio = $_POST['data_inicio'];
        $fim = $_POST['data_fim'];
        $curta = $_POST['descrição_curta'];
        $longa = $_POST['descrição_longa'];


        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);


            $link = new_db_connection();
            $stmt = mysqli_stmt_init($link);

            // SELECIONAR O ID  DO EVENTO PARA POSTERIORMENTE UTILIZAR NAS RELAÇÕES EVENTO_HAS_IMAGEMS

            $query = "SELECT Eventos_id FROM eventos WHERE Eventos_nome = ?";


            if (mysqli_stmt_prepare($stmt, $query)) {
                $nomerel = $_POST['nome'];

                mysqli_stmt_bind_param($stmt, 's', $nomerel);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id_evento);

                while (mysqli_stmt_fetch($stmt)) {

                    $_SESSION['id_evento'] = $id_evento;

                }

                mysqli_stmt_close($stmt);
                mysqli_close($link);
            }

            include_once "Upload.php";

        } else {
            $_SESSION['addsucess'] = 0;
            header("location:../Adicionar.php?add=evento");
        }

    } else {
        $_SESSION['addsucess'] = 0;
        header("location:../Adicionar.php?add=evento");
        echo "Error:" . mysqli_error($link);
        mysqli_close($link);
    }


} else {
    $_SESSION['addsucess'] = 0;
    header("location:../Adicionar.php?add=evento");

}
?>



