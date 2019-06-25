<?php
require_once "../connections/connection.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT Utilizadores_pass_hash,Utilizadores_nome,Perfis_id,Utilizadores_email,Utilizadores_id FROM utilizadores WHERE Utilizadores_email LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $email);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $password_hash, $nome, $perfil, $email,$id);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $password_hash)) {

                    session_start();
                    $_SESSION['nome_u']=$nome;
                    $_SESSION['email_u'] =$email;
                    $_SESSION['id_u']=$id;

                    header("location:../index.php");
                } else {
                    header("location:../log_in.php");
                }
            } else {
                header("location:../log_in.php");

            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        } else {
            header("location:../log_in.php");

        }

    } else {
        header("location:../log_in.php");

        mysqli_close($link);
    }
} else {
    header("location:../log_in.php");
}
