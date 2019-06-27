<?php


session_start();
include_once "../connections/connection.php";

// fazer validações do formulário e criar ligação à BD
if (isset($_POST["utilizador"]) && isset($_POST["nascimento"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["genero"]) && isset($_POST["nacionalidade"]) && isset($_POST["passrequi"]) && isset($_POST["passconfir"])) {


    if ($_POST["passrequi"] == 1 || $_POST["passconfir"] == 1) {
        $link = new_db_connection();
        $stmt = mysqli_stmt_init($link);
        $query = "INSERT INTO utilizadores (Utilizadores_nome, Utilizadores_pass_hash, Utilizadores_email, Nacionalidades_id, Géneros_id, Utilizadores_data_nascimento) VALUES (?,?,?,?,?,?)";


        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'ssssss', $nome, $password, $email, $nacionalidade, $genero, $data_nascimento);
            $nome = $_POST['utilizador'];
            $data_nascimento = $_POST['nascimento'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $genero = $_POST['genero'];
            $nacionalidade = $_POST['nacionalidade'];

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($link);


                session_start();
                $_SESSION['regisu']=1;
                header("location:../registar.php");

            } else {

                session_start();
                $_SESSION['regisu']=0;
                header("location:../registar.php");

            }

        } else {
            session_start();
            $_SESSION['regisu']=0;
            header("location:../registar.php");

        }

    } else {

        session_start();
        $_SESSION['regisu']=0;
        header("location:../registar.php");


    }
}
?>
