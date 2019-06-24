<?php


if (isset($_GET["listagem"])) {

    $x = $_GET["listagem"];

    require_once("connections/connection.php");

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);


    switch ($x) {

        case "conquistas":
echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=conquistas&ordenar=pontosasc'><p>Pontos (Ascendente)</p></a>
    <a href='Listagem.php?listagem=conquistas&ordenar=pontosdesc'><p>Pontos (Descendente)</p></a>
    <a href='Listagem.php?listagem=conquistas&page=1'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        case "eventos":
            echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=eventos&ordenar=data'><p>Data</p></a>
    <a href='Listagem.php?listagem=eventos&page=1'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        case "vestuario":
            echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=vestuario&ordenar=precoasc'><p>Preço (Ascendente)</p></a>
    <a href='Listagem.php?listagem=vestuario&ordenar=precodesc'><p>Preço (Descendente)</p></a>
    <a href='Listagem.php?listagem=vestuario&page=1'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        case "lanternas":
            echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=lanternas&ordenar=intensidadeasc'><p>Intensidade (Ascendente)</p>
    <a href='Listagem.php?listagem=lanternas&ordenar=intensidadedesc'><p>Intensidade (Descendente)</p>
    <a href='Listagem.php?listagem=lanternas'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        case "obras":
            echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=obras&ordenar=dataasc'><p>Data (Ascendente)</p></a>
    <a href='Listagem.php?listagem=obras&ordenar=datadesc'><p>Data (Descendente)</p></a>
    <a href='Listagem.php?listagem=obras&page=1'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        case "salas":
            echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=salas&ordenar=pisoasc'><p>Piso (Ascendente)</p></a>
    <a href='Listagem.php?listagem=salas&ordenar=pisodesc'><p>Piso (Descendente)</p></a>
    <a href='Listagem.php?listagem=salas&page=1'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        case "tarefas":
            echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=tarefas&ordenar=tempoasc'><p>Tempo (Ascendente)</p></a>
    <a href='Listagem.php?listagem=tarefas&ordenar=tempodesc'><p>Tempo (Descendente)</p></a>
    <a href='Listagem.php?listagem=tarefas&ordenar=precoasc'><p>Preço (Ascendente)</p></a>
    <a href='Listagem.php?listagem=tarefas&ordenar=precodesc'><p>Preço (Descendente)</p></a>
    <a href='Listagem.php?listagem=tarefas&ordenar=pontosasc'><p>Pontos (Ascendente)</p></a>
    <a href='Listagem.php?listagem=tarefas&ordenar=pontosdesc'><p>Pontos (Descendente)</p></a>
    <a href='Listagem.php?listagem=tarefas&page=1'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        case "utilizadores":
            echo "<div id='mySidenav' class='sidenav pt-5' style='z-index: 10'>
    <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
    <h4 class='pl-4 pt-3 pb-4 text-light font-weight-bold'>ORDENAR POR:</h4> 
    <a href='Listagem.php?listagem=utilizadores&ordenar=perfil'><p>Perfil</p>
    <a href='Listagem.php?listagem=utilizadores&page=1'><p style='position: absolute; bottom: 2vh;'>Limpar Filtro</p></a>
</div>";

            break;

        default;
    }


}
?>






<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
