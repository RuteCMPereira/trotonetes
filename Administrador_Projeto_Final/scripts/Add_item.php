<?php
session_start();
include_once "../connections/connection.php";

if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["preco"]) && isset($_POST["tipo"]) && isset($_POST["venda"])  && isset($_POST["submit"])) {

    $_SESSION['id_imagem'] = 0;

    include_once "Upload_2.php";

    if ($_SESSION['id_imagem']!=0){

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO itens (Itens_nome, Itens_preço, Itens_venda,	Itens_descrição, Itens_ref_3D,  Tipos_Tipos_id ) VALUES (?,?,?,?,?,?)";


    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'siisii', $nome, $preco, $venda, $descricao, $imagem, $tipo);
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $venda = $_POST["venda"];
        $descricao = $_POST['descricao'];
        $imagem = $_SESSION['id_imagem'];
        $tipo= $_POST["tipo"];




        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);

            $_SESSION['addsucess'] = 8;
            header("location:../Adicionar.php?add=conquista");


        } else {
            $_SESSION['addsucess'] = 0;
            header("location:../Adicionar.php?add=item");
        }

    } else {
        $_SESSION['addsucess'] = 0;
        header("location:../Adicionar.php?add=item");
        echo "Error:" . mysqli_error($link);
        mysqli_close($link);
    }
}

    else{
        $_SESSION['addsucess'] = 0;
        header("location:../Adicionar.php?add=conquista");

    }

} else {
    $_SESSION['addsucess'] = 0;
    header("location:../Adicionar.php?add=conquista");

}
?>



