<section class="clip-me-div ">
    <?php

    session_start();

    if (isset($_GET['evento'])) {

        require_once "connections/connection.php";

        $link = new_db_connection();

        $stmt = mysqli_stmt_init($link);

        $evento = $_GET['evento'];

        $query = "SELECT Eventos_id,Eventos_nome,Eventos_data_inicio,Eventos_data_fim,Eventos_descrição_longa FROM eventos WHERE Eventos_id = ?";

        $conteudo = 0;

        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $evento);


            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_bind_result($stmt, $id, $nome, $inicio, $fim, $descricao);

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

                                <section class="row my-2 justify-content-center get_big">
                                    <div class="col-11 text-center titulo_contactos">
                                        <p><?= $nome ?></p>
                                    </div>
                                </section>

                                <div class="div-w-scroll-2">

                                <?php
                                $link3 = new_db_connection();

                                $stmt3 = mysqli_stmt_init($link3);

                                $query3 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = " . $imagem_id;

                                if (mysqli_stmt_prepare($stmt3, $query3)) {


                                    if (mysqli_stmt_execute($stmt3)) {

                                        mysqli_stmt_bind_result($stmt3, $imagem_src);

                                        while (mysqli_stmt_fetch($stmt3)) { ?>
                                            <div class="col-12 pb-2 ">
                                                <img src="../<?= $imagem_src ?>" class="img-fluid w-100">
                                            </div>
                                            <div class="row justify-content-around w-100 position-relative "
                                                 style="top: -3vh;">
                                            <form role="form" class="col-5" action="scripts/Reserva_check.php?evento=<?=$id?>"
                                                  method="post">
                                                <?php
                                                $link4 = new_db_connection();

                                                $stmt4 = mysqli_stmt_init($link4);

                                                $reserva = 0;

                                                $id_evento = $_GET['evento'];

                                                $user = $_SESSION['id_u'];

                                                $query4 = "SELECT Eventos_Eventos_id,Utilizadores_Utilizadores_id FROM eventos_has_utilizadores WHERE Eventos_Eventos_id=? AND Utilizadores_Utilizadores_id=?";

                                                if (mysqli_stmt_prepare($stmt4, $query4)) {
                                                    mysqli_stmt_bind_param($stmt4, 'ii', $id_evento, $user);


                                                    if (mysqli_stmt_execute($stmt4)) {

                                                        mysqli_stmt_bind_result($stmt4, $ref_evento, $ref_user);

                                                        while (mysqli_stmt_fetch($stmt4)) {
                                                            $reserva = 1;
                                                            echo "<button type='submit' class='butoon_2 w-100 h-100 evento_reservado'><a>RESERVADO</a></button>";
                                                        }

                                                        if ($reserva == 0) {

                                                            echo "<button type='submit' class='butoon_2 w-100 h-100'><a>RESERVAR</a></button>";
                                                        }
                                                    }
                                                } ?>
                                                </button>
                                            </form>

                                            <?php
                                            $link5 = new_db_connection();

                                            $stmt5 = mysqli_stmt_init($link5);

                                            $id_evento = $_GET['evento'];

                                            $query5 = "SELECT COUNT(Eventos_Eventos_id) FROM eventos_has_utilizadores WHERE Eventos_Eventos_id=?";

                                            if (mysqli_stmt_prepare($stmt5, $query5)) {
                                                mysqli_stmt_bind_param($stmt5, 'i', $id_evento);


                                                if (mysqli_stmt_execute($stmt5)) {

                                                    mysqli_stmt_bind_result($stmt5, $count);

                                                    while (mysqli_stmt_fetch($stmt5)) {


                                                        ?>
                                                        <div class="col-5 p-2 text-center butoon_2"><?php if ($count == 1) {
                                                                echo $count . " RESERVA";
                                                            } else {
                                                                echo $count . " RESERVAS";
                                                            } ?></div>

                                                        </div>
                                                        <div class="col-12 px-4 anime_fade">
                                                            <p>
                                                                <?= $descricao ?>
                                                            </p>
                                                        </div>
                                                        </div><?php }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if ($conteudo == 0) {

                        echo "<div class=\"row justify-content-center pt-5\">
                        <div class=\"col-10 p-3 text-center warning_2 \">
Evento não encontrado                        </div>
                    </div>";

                    }
                }
            }
        } else {
            echo "<div class=\"row justify-content-center pt-5\">
                        <div class=\"col-10 p-3 text-center warning_2 \">
                            Página não encontrada
                        </div>
                    </div>";
        }
    } ?>
</section>
