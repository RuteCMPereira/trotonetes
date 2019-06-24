<?php
session_start();
include_once "../connections/connection.php";

if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["jogo"]) && isset($_POST["mapa"]) && isset($_POST["piso"]) && isset($_POST["submit"])) {

    // INSERIR DADOS NA BASE DE DADOS NA TABELA EVENTOS

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO salas (Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa,	Salas_piso) VALUES (?,?,?,?,?)";


    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sssss', $nome, $descricao, $jogo, $mapa, $piso);
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $jogo = $_POST['jogo'];
        $mapa = $_POST['mapa'];
        $piso = $_POST['piso'];


        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);


            $link = new_db_connection();
            $stmt = mysqli_stmt_init($link);

            // SELECIONAR O ID  DO EVENTO PARA POSTERIORMENTE UTILIZAR NAS RELAÇÕES EVENTO_HAS_IMAGEMS

            $query = "SELECT Salas_id FROM salas WHERE Salas_nome = ?";


            if (mysqli_stmt_prepare($stmt, $query)) {
                $nomerel = $_POST['nome'];

                mysqli_stmt_bind_param($stmt, 's', $nomerel);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id_sala);

                while (mysqli_stmt_fetch($stmt)) {


                    $_SESSION['id_sala'] = $id_sala;
                }

                mysqli_stmt_close($stmt);
                mysqli_close($link);
            }

          include_once "Upload.php";

        } else {
            $_SESSION['addsucess'] = 0;
            header("location:../Adicionar.php?add=sala");
        }

    } else {
        $_SESSION['addsucess'] = 0;
        header("location:../Adicionar.php?add=sala");
        echo "Error:" . mysqli_error($link);
        mysqli_close($link);
    }


} else {
    $_SESSION['addsucess'] = 0;
    header("location:../Adicionar.php?add=sala");

}
?>



