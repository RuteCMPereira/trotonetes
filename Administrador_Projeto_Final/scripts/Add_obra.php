<?php
session_start();
include_once "../connections/connection.php";

if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["ano"]) && isset($_POST["submit"])) {

    $_SESSION['id_imagem'] = 0;

    include_once "Upload_2.php";

    if ($_SESSION['id_imagem']!=0){

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO obras (Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id) VALUES (?,?,?,?)";


    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sssi', $nome, $descricao, $data, $imagem);
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $data = $_POST['ano'];
        $imagem = $_SESSION['id_imagem'];


        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);

            $_SESSION['addsucess'] = 6;
            header("location:../Adicionar.php?add=obra");


        } else {
            $_SESSION['addsucess'] = 0;
            header("location:../Adicionar.php?add=obra");
        }

    } else {
        $_SESSION['addsucess'] = 0;
        header("location:../Adicionar.php?add=obra");
        echo "Error:" . mysqli_error($link);
        mysqli_close($link);
    }
}

    else{
        $_SESSION['addsucess'] = 0;
        header("location:../Adicionar.php?add=obra");

    }

} else {
    $_SESSION['addsucess'] = 0;
    header("location:../Adicionar.php?add=obra");

}
?>



