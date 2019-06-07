<?php

include_once "../connections/connection.php";

// fazer validações do formulário e criar ligação à BD

$stmt = mysqli_stmt_init($link);
$query = "INSERT INTO utilizadores (Utilizadores_nome, Utilizadores_pass_hash, Utilizadores_email, Nacionalidade_id, Géneros_id, Utilizadores_data_nascimento) VALUES (?,?,?,?,?,?)";


if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'ssssss', $nome, $password, $email, $genero, $nacionalidade, $data_nascimento);
    $nome = $_POST['nome'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $genero = $_POST['género'];
    $nacionalidade = $_POST['nacionalidade'];
    $data_nascimento = $_POST['data de nascimento'];


// devemos validar também o resultado do execute!
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);

// Acção de sucesso
} else {
    mysqli_close($link);

// Acção de erro
}

?>