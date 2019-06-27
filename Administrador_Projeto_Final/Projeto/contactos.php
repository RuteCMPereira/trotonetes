<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    include_once "helpers/meta.php";
    include_once "helpers/css.php";

    ?>
    <title>Agency - Start Bootstrap Theme</title>


</head>

<body class="container-fluid p-0 m-0 background_1" scroll="no" style="overflow: hidden" >

<?php


if (!isset($_SESSION['id_u'])) {

    header("location:log_in.php");
}


include_once "components/header_app.php";
include_once "components/contactos.php";
include_once "components/bottom_app.php";
include_once "helpers/js.php";

?>

</body>




</html>
