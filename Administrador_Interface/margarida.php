<?php

include_once "../connections/connection.php";

// fazer validações do formulário e criar ligação à BD

$stmt = mysqli_stmt_init($link);
$query = "INSERT INTO users (username, password_hash, email, genero, data_nascimento, nacionalidade) VALUES (?,?,?,?,?,?)";


if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'ssssss', $username, $email, $password_hash, $genero, $data_nascimento, $nacionalidade);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data_nascimento = $_POST['data de nascimento'];
    $genero = $_POST['genero'];
    $nacionalidade = $_POST['nacionalidade'];

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