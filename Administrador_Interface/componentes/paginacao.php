<?php
if(!isset($_GET['ordenar'])) {


    if (isset($_GET['page'])) {

        if($_GET['listagem']== "eventos"){
            $link_next="Listagem.php?listagem=eventos&page=". $next;
            $link_previous="Listagem.php?listagem=eventos&page=". $previous;
        }

        if($_GET['listagem']== "salas"){
            $link_next="Listagem.php?listagem=salas&page=". $next;
            $link_previous="Listagem.php?listagem=salas&page=". $previous;
        }

        if($_GET['listagem']== "lanternas"){
            $link_next="Listagem.php?listagem=lanternas&page=". $next;
            $link_previous="Listagem.php?listagem=lanternas&page=". $previous;
        }

        if($_GET['listagem']== "utilizadores"){
            $link_next="Listagem.php?listagem=utilizadores&page=". $next;
            $link_previous="Listagem.php?listagem=utilizadores&page=". $previous;
        }

        if($_GET['listagem']== "obras"){
            $link_next="Listagem.php?listagem=obras&page=". $next;
            $link_previous="Listagem.php?listagem=obras&page=". $previous;
        }

        if($_GET['listagem']== "vestuario"){
            $link_next="Listagem.php?listagem=vestuario&page=". $next;
            $link_previous="Listagem.php?listagem=vestuario&page=". $previous;
        }

        if ($_GET['page'] == 1) {

            echo "<section class=\"row justify-content-center mb-5\">
    <div class=\"col-2 text-center justify-content-center align-content-center align-items-center\">
        <a href=".$link_next." class=\"next round d-inline-block\">&#8250;<button class=\"w3-button w3-large w3-circle w3-light-grey\">›</button></a>
    </div>
</section>";
        } else {

            if (isset($_GET['lastpage'])){
                echo "<section class=\"row justify-content-center mb-5\">
    <div class=\"col-2 text-center justify-content-center align-content-center align-items-center\">
        <a href=".$link_previous." class=\"previous round d-inline-block\">&#8249;<button class=\"w3-button w3-large w3-circle w3-light-grey\">‹</button></a>
    </div>
</section>";

            }else{
            echo "<section class=\"row justify-content-center mb-5\">
    <div class=\"col-2 text-center justify-content-center align-content-center align-items-center\">
        <a href=".$link_previous." class=\"previous round d-inline-block\">&#8249;<button class=\"w3-button w3-large w3-circle w3-light-grey\">‹</button></a>
        <a href=".$link_next." class=\"next round d-inline-block\">&#8250;<button class=\"w3-button w3-large w3-circle w3-light-grey\">›</button></a>
    </div>
</section>";}
        }

    }

}
?>

