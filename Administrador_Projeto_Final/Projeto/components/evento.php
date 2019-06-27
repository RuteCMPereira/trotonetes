<?php

if (isset($_GET['mes'])) {

    if ($_GET['mes'] <= 0 || $_GET['mes'] > (date("m") + 6) || $_GET['mes'] < date("m")) {
        header("location: evento.php?mes=" . date("m"));
    } else {

        //escrever codigo aqui
    }

} else {
    header("location: evento.php?mes=" . date("m"));
}
?>


<section class="clip-me-div ">
    <div class="row justify-content-center text-center m-3">
        <div class="col-7" style="z-index: 5">
            <input type="checkbox" id="drop"/>


            <label for="drop"><?php

                $a = $_GET['mes'];

                switch ($a) {
                    case 1:
                        $a = "JANEIRO";
                        break;
                    case 2:
                        $a = "FEVEREIRO";
                        break;
                    case 3:
                        $a = "MARÇO";
                        break;
                    case 4:
                        $a = "ABRIL";
                        break;
                    case 5:
                        $a = "MAIO";
                        break;
                    case 6:
                        $a = "JUNHO";
                        break;
                    case 7:
                        $a = "JULHO";
                        break;
                    case 8:
                        $a = "AGOSTO";
                        break;
                    case 9:
                        $a = "SETEMBRO";
                        break;
                    case 10:
                        $a = "OUTUBRO";
                        break;
                    case 11:
                        $a = "NOVEMBRO";
                        break;
                    case 12:
                        $a = "DEZEMBRO";
                        break;
                }
                echo $a;

                ?></label>
            <ul class="content evento_content" id="dropevento">
                <li class="p-4"></li>
                <?php

                for ($i = date("m"); $i <= date("m") + 6; $i++) {


                    if ($i>12){
                        $i=1;
                    }
                    $a = $i;
                    if ($i != $_GET['mes']) {
                        switch ($a) {
                            case 1:
                                $a = "JANEIRO";
                                break;
                            case 2:
                                $a = "FEVEREIRO";
                                break;
                            case 3:
                                $a = "MARÇO";
                                break;
                            case 4:
                                $a = "ABRIL";
                                break;
                            case 5:
                                $a = "MAIO";
                                break;
                            case 6:
                                $a = "JUNHO";
                                break;
                            case 7:
                                $a = "JULHO";
                                break;
                            case 8:
                                $a = "AGOSTO";
                                break;
                            case 9:
                                $a = "SETEMBRO";
                                break;
                            case 10:
                                $a = "OUTUBRO";
                                break;
                            case 11:
                                $a = "NOVEMBRO";
                                break;
                            case 12:
                                $a = "DEZEMBRO";
                                break;
                        }

                        if ($i < 10) {

                            $i = "0" . intval($i);

                        }
                        echo "<li class=\"text-center p-2\"><a href='evento.php?mes=" . $i . "' style='text-decoration:none;'>" . $a . "</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="div-w-scroll-2 w-100">

        <?php

        require_once "connections/connection.php";

        $conteudo = 0;

        $link = new_db_connection();

        $stmt = mysqli_stmt_init($link);

        $m_y = "%" . date("y") . "-" . $_GET['mes'] . "-%";

        $query = "SELECT Eventos_id,Eventos_nome,Eventos_data_inicio,Eventos_data_fim FROM eventos WHERE Eventos_data_inicio LIKE'$m_y' ORDER BY Eventos_data_inicio ASC ";

        if (mysqli_stmt_prepare($stmt, $query)) {


            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_bind_result($stmt, $id, $nome, $inicio, $fim);

                while (mysqli_stmt_fetch($stmt)) {

                    $conteudo = 1;

                    $link2 = new_db_connection();

                    $stmt2 = mysqli_stmt_init($link2);


                    $query2 = "SELECT Imagens_Imagens_id FROM eventos_has_imagens WHERE Eventos_Eventos_id = " . $id;

                    if (mysqli_stmt_prepare($stmt2, $query2)) {


                        if (mysqli_stmt_execute($stmt2)) {

                            mysqli_stmt_bind_result($stmt2, $imagem_id);

                            while (mysqli_stmt_fetch($stmt2)) {

                                ?>

                                <div class="row mx-3 justify-content-around" style="z-index: -1">

                                <div id="demo" class="carousel col-12 " data-ride="carousel"
                                style="height: 13vh;">
                                <div class="carousel-inner h-100">

                                <?php
                                $link3 = new_db_connection();

                                $stmt3 = mysqli_stmt_init($link3);

                                $query3 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = " . $imagem_id;

                                if (mysqli_stmt_prepare($stmt3, $query3)) {


                                    if (mysqli_stmt_execute($stmt3)) {

                                        mysqli_stmt_bind_result($stmt3, $imagem_src);

                                        while (mysqli_stmt_fetch($stmt3)) { ?>

                                            <div class="carousel-item active h-100">
                                                <section class="h-100 image_evento"
                                                         style=" background-image: url('../<?= $imagem_src ?>')">
                                                </section>
                                            </div>

                                        <?php }
                                        mysqli_stmt_close($stmt3);
                                        mysqli_close($link3);
                                    }
                                }
                            }
                            mysqli_stmt_close($stmt2);
                            mysqli_close($link2); ?></div>
                            </div>
                            <div class="col-12 pb-5 pt-3 pl-2 text-center evento">

                                <p><?= $nome ?> | <b><?= $inicio ?></b></p>
                            </div>

                            <?php

                            $reserva = 0;

                            $link4 = new_db_connection();

                            $stmt4 = mysqli_stmt_init($link4);

                            $user = $_SESSION['id_u'];

                            $query4 = "SELECT Eventos_Eventos_id,Utilizadores_Utilizadores_id FROM eventos_has_utilizadores WHERE Eventos_Eventos_id=? AND Utilizadores_Utilizadores_id=?";

                            if (mysqli_stmt_prepare($stmt4, $query4)) {
                                mysqli_stmt_bind_param($stmt4, 'ii', $id, $user);


                                if (mysqli_stmt_execute($stmt4)) {

                                    mysqli_stmt_bind_result($stmt4, $ref_evento, $ref_user);

                                    while (mysqli_stmt_fetch($stmt4)) {

                                        $reserva = 1;


                                        ?>

                                        <div class="form-group col-5 btn_reservar p-3 text-center d-inline-block evento_reservado">
                                            <button type="submit"><a href="scripts/Reserva_check.php?evento=<?=$id?>">RESERVADO</a></button>
                                        </div>
                                    <?php }

                                    if ($reserva == 0) {?>

                                        <div class="form-group col-5 btn_reservar p-3 text-center d-inline-block">
                                            <button type="submit"><a href="scripts/Reserva_check.php?evento=<?=$id?>">RESERVAR</a></button>
                                        </div>

                                   <?php }  mysqli_stmt_close($stmt4);
                                mysqli_close($link4)?>
                                    <div class="form-group col-5 btn_reservar p-3 text-center d-inline-block">
                                        <button type="submit"><a href="evento_individual.php?evento=<?= $id ?>">VER
                                                MAIS</a></button>
                                    </div>
                                    </div>


                                    <?php

                                }
                            }

                        }
                    }
                }

                if ($conteudo == 0) {
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-10 p-3 text-center warning_2 ">
                            Não foram econtrados eventos
                        </div>
                    </div>
                    <?php
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        } ?></div>
    </div>
</section>