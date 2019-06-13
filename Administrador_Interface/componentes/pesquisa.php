

<div class="container-fluid">
    <div class="d-sm-flex col-12 align-items-center justify-content-end pesquisa px-5">
        <div id="wrap">
            <form action="" autocomplete="on" method="get">
                <input value="h" type="text" placeholder="Pesquisa"><input
                         type="submit">
            </form>
        </div>
        <div><img src="img/filter.svg" onclick="openNav()" class="px-3 filter" height="50px"
                  style="opacity: 0.4">
        </div>
    </div>
    <?php

/*if(isset($_POST['pesquisar']) && $_POST['pesquisar']!=''){
    $pesquisar = $_POST["pesquisar"];
    $hostname = "labmm.clients.ua.pt";
    $username = "deca_18L4_18_web";
    $password = "nW96xx";
    $dbname = "deca_18l4_18";


// Makes the connection
    $local_link = mysqli_connect($hostname, $username, $password, $dbname);

    $resultado_eventos = "SELECT * FROM eventos WHERE Eventos_nome LIKE '%$pesquisar%'";
    $result_eventos = mysqli_query($local_link, $resultado_eventos);
}

*/?>
