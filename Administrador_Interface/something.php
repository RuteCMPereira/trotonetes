<?php


require_once("connections/connection.php");

echo $_GET['hello'];

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);


$query = "SELECT Eventos_id,	Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_decrição_curta, Eventos_descrição_longa FROM eventos";
if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $nome, $data_inicio, $data_fim, $descricao_curta, $descricao_longa); // Bind results
    while (mysqli_stmt_fetch($stmt)) {

        echo $id . $nome . $data_inicio;


    }
    mysqli_stmt_close($stmt);
}
