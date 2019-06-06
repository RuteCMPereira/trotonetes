<?php

include_once "../connections/connection.php";

// fazer validações do formulário e criar ligação à BD

$stmt = mysqli_stmt_init($link);
$query = "SELECT ref_id_roles, password_hash FROM users WHERE username LIKE ?";


if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $username);
    $username = $_POST['username'];
    $password = $_POST['password'];
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $perfil, $password_hash);

    if (mysqli_stmt_fetch($stmt)) {
        if (password_verify($password, $password_hash)) {
            $_SESSION['role'] = $perfil;
            $_SESSION["username"] = $username;


            // feedback de sucesso
        } else {
            // feedback de erro geral devido à password estar errada
        }
    } else {
        // feedback de erro feral devido ao username estar errado
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>