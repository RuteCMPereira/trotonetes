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
    var tour = 1;
    var inner = [
        '<p >Bem-Vindo ao jogo <br><b class=" py-1">"À NOITE NO MUSEU DE AVEIRO"</b><br>Baseado no franchise de filmes do mesmo nome.',
        '<p>Este é o teu menu principal se quizeres começar a jogar agora carrega no botão de <b>JOGO</b>!</p> ',
        '<p>Para conheceres melhor o museu e o que ele oferece visita os <b>EVENTOS</b>, <b>CONTACTOS</b> , <b>MAPA</b>  e <b>INFORMAÇÃO</b>!</p>',
    ];
</script>
<body class="container-fluid p-0 m-0 background_1" scroll="no" style="overflow: hidden">

<?php
include_once "components/toturial.php";
include_once "components/header_app.php";
include_once "components/menu_app.php";
include_once "helpers/js.php";

?>

</body>




</html>
