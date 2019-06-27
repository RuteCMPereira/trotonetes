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
    var tour = 4;
    var inner = [
        '<p >Parabéns fizeste a tua primeira reserva!</p>',
        '<p >Para acederes a todos os teus eventos dirige-te ao teu perfil, podes acede-lo carregando no icon do canto superior direito.</p>',
    ];
</script>

<body class="container-fluid p-0 m-0 background_1" scroll="no" style="overflow: hidden" >

<?php

session_start();


if (!isset($_SESSION['id_u'])) {

    header("location:log_in.php");
}



if (isset($_SESSION['tour'])){

    if ($_SESSION['tour']==0){
        include_once "components/toturial.php";
    }

}

include_once "components/header_app.php";
include_once "components/evento.php";
include_once "components/bottom_app.php";
include_once "helpers/js.php";

?>

</body>




</html>