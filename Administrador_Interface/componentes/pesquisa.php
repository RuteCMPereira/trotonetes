

    <?php

    $action = 0;


    if ($_GET['listagem']='eventos'){

        $action = "listagem.php?=eventos";

    }
  /*  include_once "connections/connection.php";

    $pesquisar = $_POST["pesquisar"];
    $resultado_eventos = "SELECT * FROM eventos WHERE Eventos_nome LIKE '%$pesquisar%'";

    $result_eventos = mysqli_query($local_link, $resultado_eventos);

    while ($colunas_eventos = mysqli_fetch_array($result_eventos)) {
        echo $colunas_eventos['Eventos_nome'];
    }
    */?>


    <div class="container-fluid">
        <div class="d-sm-flex col-12 align-items-center justify-content-end pesquisa px-5">
            <div id="wrap">
                <form action=<?=$action?> autocomplete="on">
                    <input id="search" name="pesquisa" type="text" placeholder="Pesquisa">
                    <input id="search_submit" value="Rechercher" type="submit">
                </form>
            </div>
            <div><img src="img/filter.svg" onclick="openNav()" class="px-3 filter" height="50px"
                      style="opacity: 0.4">
            </div>
        </div>