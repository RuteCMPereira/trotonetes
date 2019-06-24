<?php
session_start();
include_once "../connections/connection.php";

if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["cor"])  && isset($_POST["raio"]) && isset($_POST["intensidade"]) && isset($_POST["submit"])) {

    $_SESSION['id_imagem'] = 0;

    include_once "Upload_2.php";

    if ($_SESSION['id_imagem']!=0){

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO lanternas (Lanternas_nome, Lanternas_ref_3D, Lanternas_descrição, Lanternas_cor, Lanternas_raio, Lanternas_intensidade) VALUES (?,?,?,?,?,?)";


    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sissii', $nome, $imagem, $descricao, $cor, $raio, $intensidade);
        $nome = $_POST['nome'];
        $imagem = $_SESSION['id_imagem'];
        $descricao = $_POST['descricao'];
        $cor = $_POST['cor'];
        $raio = $_POST["raio"];
        $intensidade = $_POST["intensidade"];




        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);

            $_SESSION['addsucess'] = 10;
            header("location:../Adicionar.php?add=lanterna");


        } else {
            $_SESSION['addsucess'] = 0;
            header("location:../Adicionar.php?add=lanterna");
        }

    } else {
        $_SESSION['addsucess'] = 0;
        echo "Error:" . mysqli_error($link);
        mysqli_close($link);
    }
}

    else{
        $_SESSION['addsucess'] = 0;
        header("location:../Adicionar.php?add=lanterna");

    }

} else {
    $_SESSION['addsucess'] = 0;
    header("location:../Adicionar.php?add=lanterna");

}
?>



