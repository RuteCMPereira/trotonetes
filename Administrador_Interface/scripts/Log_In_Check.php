
<?php
require_once "../connections/connection.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT Utilizadores_pass_hash,Utilizadores_nome,Perfis_id,Utilizadores_email FROM utilizadores WHERE Utilizadores_email LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $email);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $password_hash, $nome,$perfil , $email);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $password_hash)) {

                    session_start();
                    $_SESSION['utilizador_nome']= $nome;
                    $_SESSION['utilizador_perfil'] = $perfil;
                    header("location:../Homepage.php");
                } else {
                    // Password está errada
                    header("location:../Log_In.php");
                }
            } else {
                // Username não existe
                header("location:../Log_In.php");
            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        } else {
            // Acção de erro
            header("location:../Log_In.php");
        }

    } else {
        // Acção de erro
        header("location:../Log_In.php");
        mysqli_close($link);
    }
} else {
    header("location:../Log_In.php");
}
