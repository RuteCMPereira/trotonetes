<?php

function getExtension($str)
{

    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

if (count($_FILES['upload']['name']) > 0) {

    $go_back=0;
    //Loop through each file
    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {

        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
        $extension = getExtension($_FILES['upload']['name'][$i]);
        $extension = strtolower($extension);

        if (($extension != "jpg") && ($extension != "jpeg")
            && ($extension != "png")) {
            $_SESSION['addsucess'] = 0;

            if ($_POST['submit']=="conquista"){ $go_back = "location:../Adicionar.php?add=conquista";}
            if ($_POST['submit']=="obra"){$go_back = "location:../Adicionar.php?add=obra";}
            if ($_POST['submit']=="item"){$go_back = "location:../Adicionar.php?add=item";}
            if ($_POST['submit']=="tarefa"){$go_back = "location:../Adicionar.php?add=tarefa";}
            if ($_POST['submit']=="lanterna"){$go_back = "location:../Adicionar.php?add=lanterna";}



            header($go_back);

        } else {

            //Make sure we have a filepath
            if ($tmpFilePath != "") {

                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                if ($_POST['submit']=="obra"){

                    $filePath = "../uploads/" . "obra_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];
                    $filePath2 = "uploads/" . "obra_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];

                }
                if ($_POST['submit']=="conquista"){

                    $filePath = "../uploads/" . "conquista_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];
                    $filePath2 = "uploads/" . "conquista_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];

                }

                if ($_POST['submit']=="item"){

                    $filePath = "../uploads/" . "item_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];
                    $filePath2 = "uploads/" . "item_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];

                }

                if ($_POST['submit']=="tarefa"){

                    $filePath = "../uploads/" . "tarefa_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];
                    $filePath2 = "uploads/" . "tarefa_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];

                }

                if ($_POST['submit']=="lanterna"){

                    $filePath = "../uploads/" . "lanterna_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];
                    $filePath2 = "uploads/" . "lanterna_" . date('d_m_Y_H_i_s') . '_' . $_FILES['upload']['name'][$i];

                }

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
                        else{
                            $_SESSION['addsucess'] = 0;
                            header($go_back);
                            mysqli_close($link);
                        }

                    } else {
                        $_SESSION['addsucess'] = 0;
                        header($go_back);
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
                    else{
                        $_SESSION['addsucess'] = 0;
                        header($go_back);
                        mysqli_close($link);

                    }

                }
            }
        }
    }
}