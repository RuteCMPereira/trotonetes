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


            // UPLOAD DE IMAGENS PARA A PASTA UPLOADS

            if (count($_FILES['upload']['name']) > 0) {
                //Loop through each file
                for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                    //Get the temp file path
                    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                    //Make sure we have a filepath
                    if ($tmpFilePath != "") {

                        //save the filename
                        $shortname = $_FILES['upload']['name'][$i];


                        $filePath = "../uploads/" . "evento_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];
                        $filePath2 = "uploads/" . "evento_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];

                        if (move_uploaded_file($tmpFilePath, $filePath)) {

                            $files[] = $shortname;

                            // ASSOCIAR AS IMGENS COM A TABELA DE IMAGENS NA BASE DE DADOS

                            $link = new_db_connection();
                            $stmt = mysqli_stmt_init($link);
                            $query = "INSERT INTO imagens (Imagens_src) VALUES (?)";

                            if (mysqli_stmt_prepare($stmt, $query)) {
                                mysqli_stmt_bind_param($stmt, 's', $src);
                                $src = $filePath2;

                                if (mysqli_stmt_execute($stmt)) {
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($link);

                                }

                            } else {
                                mysqli_close($link);
                            }

                            // SELECIONAR O ID  DAS IMAGEMS PARA POSTERIORMENTE UTILIZAR NAS RELAÇÕES EVENTO_HAS_IMAGEMS

                            $link = new_db_connection();
                            $stmt = mysqli_stmt_init($link);
                            $query = "SELECT Imagens_id FROM imagens WHERE Imagens_src = ?";


                            if (mysqli_stmt_prepare($stmt, $query)) {

                                $srcrel = $filePath2;
                                mysqli_stmt_bind_param($stmt, 's', $srcrel);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_bind_result($stmt, $id_imagem);

                                while (mysqli_stmt_fetch($stmt)) {

                                    $_SESSION['id_imagem'] = $id_imagem;

                                }

                                mysqli_stmt_close($stmt);
                                mysqli_close($link);


                            }

                            // RELACIONAR ID'S

                            $link = new_db_connection();
                            $stmt = mysqli_stmt_init($link);
                            $query = "INSERT INTO eventos_has_imagens (Eventos_Eventos_id,Imagens_Imagens_id) VALUES (?,?)";


                            if (mysqli_stmt_prepare($stmt, $query)) {
                                mysqli_stmt_bind_param($stmt, 'ii', $evento, $imagem);
                                $evento = $_SESSION['id_evento'];
                                $imagem = $_SESSION['id_imagem'];

                                if (mysqli_stmt_execute($stmt)) {
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($link);

                                    $_SESSION['addsucess']=1;
                                    header("location:../Adicionar.php?add=evento");

                                } else {
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($link);
                                }

                            }
                        }
                    }
                }
            }

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



