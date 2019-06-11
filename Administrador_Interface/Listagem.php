<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>À Noite no Museu - Listagem</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

<?php include_once "scripts/Registo_Admin_Check.php" ?>


<div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <?php include_once "componentes/nav_bar.php" ?>
            <?php include_once "componentes/pesquisa.php" ?>

        </div>

        <?php include_once "componentes/listagem.php" ?>

    </div>


    <?php include_once "componentes/footer.php" ?>

    <?php include_once "componentes/filtragem.php" ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
