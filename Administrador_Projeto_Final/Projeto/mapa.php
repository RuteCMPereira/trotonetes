<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    include_once "helpers/meta.php";
    include_once "helpers/css.php";

    ?>
    <title>Agency - Start Bootstrap Theme</title>


</head>

<script>
    var tour = 2;
    var inner = [
        '<p >Bem-Vindo ao jogo <br><b class=" py-1">"À NOITE NO MUSEU DE AVEIRO"</b><br>Baseado no franchise de filmes do mesmo nome.',
        '<p>Este é o teu menu principal se quizeres começar a jogar agora carrega no botão de <b>JOGO</b>!</p> ',
        '<p>Para conheceres melhor o museu e o que ele oferece visita os <b>EVENTOS</b>, <b>CONTACTOS</b> , <b>MAPA</b>  e <b>INFORMAÇÃO</b>!</p>',
    ];
</script>
<body class="container-fluid p-0 m-0 background_3" scroll="no" style="overflow: hidden ; position: absolute; left: 0; top:0" >

<?php

session_start();


if (!isset($_SESSION['id_u'])) {

    header("location:log_in.php");
}


require_once "connections/connection.php";

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$email = $_SESSION['email_u'];

$query = "SELECT Utilizadores_tour2 FROM utilizadores WHERE Utilizadores_email LIKE ?";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 's', $email);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $tour_2);

        if (mysqli_stmt_fetch($stmt)) {

            if ($tour_2 == 0) {

                include_once "components/toturial.php";

            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }

}


include_once "components/header_app.php";
include_once "components/map.php";
include_once "components/bottom_app.php";
include_once "components/popupmap.php";
include_once "helpers/js.php";

?>

</body>




</html>
