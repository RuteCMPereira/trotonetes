<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<?php
if (isset($_GET["listagem"])) {

    $x = $_GET["listagem"];

} else {
    echo "Aconteceu algo de errado";
}

?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top">


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-0">

                    <h1 class="principal form-inline align-itens-center col-7"><a href="index.html" class="titulo5">MUSEU
                            DE AVEIRO</a></h1>

                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                         aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                       placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </li>


                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow col-1 p-0 mr-5">
                        <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-3 d-none d-lg-inline text-gray-600 small">Admnistrador</span>
                            <img class="img-profile rounded-circle" src="img/businessman_863430.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex col-12 align-items-center justify-content-end pesquisa">
                    <div id="wrap">
                        <form action="" autocomplete="on">
                            <input id="search" name="search" type="text" placeholder="Pesquisa"><input
                                    id="search_submit" value="Rechercher" type="submit">
                        </form>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Game -->
                    <div class="col-xl-12 col-md-6 mb-4">
                        <div class=" caixa2 card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="titulo text-xl-center font-weight-bold text-primary text-uppercase">
                                            Lista de Vestuário
                                            <div class="row justify-content-center">
                                                <h2 class="mt-2 mb-0 pt-1 pb-1 adicionar col-2 homepage1">
                                                    <a href="adicionar.vestuario.html"> Adicionar <i
                                                                class="fas fa-plus fa-1x " style="color:white"></i>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-12 justify-content-center text-center margem1">
                        <ul style="list-style-type:none; font-size: 20px;" class="lista px-3">

                            <?php

                            require_once("connections/connection.php"); // We need the function!

                            $link = new_db_connection(); // Create a new DB connection

                            $stmt = mysqli_stmt_init($link); // create a prepared statement

                            // Execute the prepared statement

                            if ($x == "eventos") {
                                $query = "SELECT Eventos_id,	Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_decrição_curta, Eventos_descrição_longa FROM eventos";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $data_inicio, $data_fim, $descricao_curta, $descricao_longa); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                    mysqli_stmt_close($stmt);
                                }

                            }
                            if ($x == "salas") {
                                $query = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo,	Salas_posição_mapa,	Salas_piso FROM salas";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $descricao, $posicao_jogo, $posicao_mapa, $piso); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                    mysqli_stmt_close($stmt);
                                }

                            }
                            if ($x == "utilizadores") {
                                $query = "SELECT 	Utilizadores_id, Utilizadores_nome, Utilizadores_pass_hash FROM utilizadores";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $password); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                }

                                mysqli_stmt_close($stmt);

                            }


                            if ($x == "vestuario") {
                                $query = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $preco, $venda, $descricao, $ref_3D, $tipo_id); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                }

                                mysqli_stmt_close($stmt);

                            }


                            if ($x == "obras") {
                                $query = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $descricao, $data, $imagem); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                }

                                mysqli_stmt_close($stmt);

                            }

                            if ($x == "lanternas") {
                                $query = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $red_3D, $descricao, $cor, $radio, $intensidade); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                }

                                mysqli_stmt_close($stmt);

                            }

                            if ($x == "conquistas") {
                                $query = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $descricao, $pontos, $imagem); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                }

                                mysqli_stmt_close($stmt);

                            }


                            if ($x == "tarefas") {
                                $query = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas";
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $id, $nome, $tempo, $dinheiro, $pontos, $imagem); // Bind results
                                    while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                        echo "<li>" . $id . " - " . $nome . "<a> <i class=\"fas fa-pencil-alt fa-1x text-gray-100 text-white ml-3 editar mb-2\"></i></a></li>
";
                                    }
                                }

                                mysqli_stmt_close($stmt);

                            }




                            mysqli_close($link); // Close connection


                            ?>


                        </ul>

                    </div>


                </div>


            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>


<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-gray-100 fixed-bottom col-12 ">
    <div class="container my-auto ">
        <div class="copyright text-center my-auto">
            <span class="footer">Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
