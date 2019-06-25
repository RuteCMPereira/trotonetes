<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    include_once "helpers/meta.php";
    include_once "helpers/css.php";
    ?>
    <title>Agency - Start Bootstrap Theme</title>


</head>

<?php

session_start();

if (!isset($_SESSION['id_u'])) {

    header("location:log_in.php");
}

?>
<script>
    var tour = 1;
    var inner = [
        '<p >Bem-Vindo ao jogo <br><b class=" py-1">"À NOITE NO MUSEU DE AVEIRO"</b><br>Baseado no franchise de filmes do mesmo nome.',
        '<p>Este é o teu menu principal se quizeres começar a jogar agora carrega no botão de <b>JOGO</b>!</p> ',
        '<p>Para conheceres melhor o museu e o que ele oferece visita os <b>EVENTOS</b>, <b>CONTACTOS</b> , <b>MAPA</b>  e <b>INFORMAÇÃO</b>!</p>',
    ];
</script>
<body class="container-fluid p-0 m-0 background_1" scroll="no" style="overflow: hidden">

<?php

require_once "connections/connection.php";


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$email = $_SESSION['email_u'];

$query = "SELECT Utilizadores_tour1 FROM utilizadores WHERE Utilizadores_email LIKE ?";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 's', $email);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $tour_1);

        if (mysqli_stmt_fetch($stmt)) {

            if ($tour_1 == 0) {

                include_once "components/toturial.php";

            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }

}


include_once "components/header_app.php";
include_once "components/menu_app.php";
include_once "helpers/js.php";

?>

</body>


</html>
