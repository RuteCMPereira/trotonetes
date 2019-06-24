<?php

session_start();

echo $_POST["nome"]."-".$_POST["preco"]."-".($_POST["descricao"]."-".$_POST["venda"]."-".$_POST["tipo"])."-".$_SESSION['id_item_update'];

if (isset($_POST["nome"]) && isset($_POST["preco"]) && isset($_POST["descricao"]) && isset($_POST["venda"]) && isset($_POST["tipo"])) {

    require_once("../connections/connection.php");

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE itens SET Itens_nome = ?, Itens_preço = ?, Itens_venda = ?, Itens_descrição = ?,Tipos_Tipos_id = ? WHERE Itens_id = ? ";



    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'siisii',$nome,$preco, $venda,$descricao,$tipo,$id );

        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $venda = $_POST['venda'];
        $descricao = $_POST ['descricao'];
        $tipo = $_POST['tipo'];
        $id = $_SESSION['id_item_update'];




        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

      header("location:../Editar.php?item=".$_SESSION ["id_item_update"]."");
        }

        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($link);
    }
    /* close connection */
    mysqli_close($link);


} else {
    echo "algo de estranho se passou...";
}