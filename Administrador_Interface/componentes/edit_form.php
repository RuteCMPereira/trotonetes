<?php
if (isset($_GET["evento"])) {

    include_once "connections/connection.php";

    $id_evento = $_GET["evento"];

    $_SESSION ["id_evento_update"] = $id_evento;

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT Eventos_nome, Eventos_data_inicio, Eventos_data_fim,Eventos_decrição_curta, Eventos_descrição_longa FROM eventos WHERE Eventos_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_evento;
        mysqli_stmt_bind_param($stmt, 's', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nome, $dataini, $datafim, $descricao_curta, $descricao_longa);

        while (mysqli_stmt_fetch($stmt)) {


            ?>

            <section class="row " style="top: 10vh; position: relative">
            <form role="form" method="post" action="scripts/Edit_evento.php" style="width:550px">
            <div class="form-group">
                <label>ID do evento</label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>Nome do evento</label>
                <input class="form-control" name="nome" value="<?= $nome ?>">
            </div>
            <div class="form-group">
                <label>Data inicio</label>
                <input type="date" class="form-control" name="datainicio" value="<?= $dataini ?>">
            </div>
            <div class="form-group">
                <label>Data Fim</label>
                <input type="date" class="form-control" name="datafim" value="<?= $datafim ?>">
            </div>
            <div class="form-group">
                <label>Descrição Curta</label>
                <input class="form-control" name="descricaocurta" value="<?= $descricao_curta ?>">
            </div>
            <div class="form-group">
                <label>Descrição Longa</label>
                <input class="form-control" name="descricaolonga" value="<?= $descricao_longa ?>">
            </div>

            <?php
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);


    } else {
        //header("location:");
        mysqli_close($link);

    }


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT Imagens_Imagens_Id FROM eventos_has_imagens WHERE Eventos_Eventos_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $evento = $_GET["evento"];
        mysqli_stmt_bind_param($stmt, 'i', $evento);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_imagens);

        while (mysqli_stmt_fetch($stmt)) {

            $link2 = new_db_connection();
            $stmt2 = mysqli_stmt_init($link2);
            $query2 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = ?";


            if (mysqli_stmt_prepare($stmt2, $query2)) {

                $parametro = $id_imagens;
                mysqli_stmt_bind_param($stmt2, 'i', $parametro);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $src);

                while (mysqli_stmt_fetch($stmt2)) {


                    ?>


                    <label for="myCheckbox1"><img src="<?= $src ?>" height="100px"/>
                        <br> <input type="checkbox" id="myCheckbox1" name="vehicle" value="<?= $id_imagens ?>"
                                    style="position: relative;left: 35%" checked>
                    </label>
                    <?php
                }
            }

        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);

    ?>

    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section>


    <?php


}
?>


<?php
if (isset($_GET["utilizador"])) {

    include_once "connections/connection.php";

    $id_utilizador = $_GET["utilizador"];

    $_SESSION['id_utilizador_update'] = $id_utilizador;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT Utilizadores_id, Utilizadores_nome, Perfis_id FROM utilizadores WHERE Utilizadores_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_utilizador;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $nome, $perfil);

        while (mysqli_stmt_fetch($stmt)) {


            ?>

            <section class="row " style="top: 10vh; position: relative; height: 400px">
            <form role="form" method="post" action="scripts/Edit_utilizador.php" style="width:570px">
            <div class="form-group">
                <label>ID do utilizador é <?= $id ?></label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>O nome do utilizador é <?= $nome ?></label>
                <p class="form-control-static"></p>
            </div>

            <div class="form-group">
                <label><b>Apenas pode mudar o Perfil do utilizador</b></label>
                <p class="form-control-static"></p>
            </div>
            <select name="perfil" style="border: none; background-color: transparent; opacity: 0.7">

            <?php
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);


    $query = "SELECT Perfis_id, Perfis_nome FROM perfis";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $nome);

        while (mysqli_stmt_fetch($stmt)) { ?>


            <option value="<?= $id ?>"><?= $nome ?></option>


            <?php

        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link); ?></select>
    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section>
    <?php
}

?>

<?php
if (isset($_GET["sala"])) {

    include_once "connections/connection.php";

    $id_sala = $_GET["sala"];

    $_SESSION['id_sala_update'] = $id_sala;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT Salas_id, Salas_nome, Salas_descrição,Salas_posição_jogo,Salas_posição_mapa, Salas_piso
 FROM salas WHERE Salas_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_sala;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_sala, $nome, $descricao, $jogo, $mapa, $piso);

        while (mysqli_stmt_fetch($stmt)) {

            ?>

            <section class="row " style="top: 10vh; position: relative; height: 800px">
            <form role="form" method="post" action="scripts/Edit_sala.php" style="width:570px">
            <div class="form-group">
                <label>ID do utilizador é <?= $id_sala ?></label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>Nome da sala</label>
                <input class="form-control" name="nome" value="<?= $nome ?>">
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <input class="form-control" name="descricao" value="<?= $descricao ?>">
            </div>

            <div class="form-group">
                <label>Posição no Jogo </label>
                <input class="form-control" name="jogo" value="<?= $jogo ?>">
            </div>
            <div class="form-group">
                <label>Posição no Mapa </label>
                <input class="form-control" name="mapa" value="<?= $mapa ?>">
            </div>
            <div class="form-group">
                <label>Piso</label>
                <input class="form-control" name="piso" value="<?= $piso ?>">
            </div>


            <?php
        }
    }


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT Imagens_Imagens_Id FROM salas_has_imagens WHERE Salas_Salas_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $sala = $_GET["sala"];
        mysqli_stmt_bind_param($stmt, 'i', $sala);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_imagens);

        while (mysqli_stmt_fetch($stmt)) {

            $link2 = new_db_connection();
            $stmt2 = mysqli_stmt_init($link2);
            $query2 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = ?";


            if (mysqli_stmt_prepare($stmt2, $query2)) {

                $parametro = $id_imagens;
                mysqli_stmt_bind_param($stmt2, 'i', $parametro);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $src);

                while (mysqli_stmt_fetch($stmt2)) {

                    ?>

                    <label for="myCheckbox1"><img src="<?= $src ?>" height="100px"/>
                        <br> <input type="checkbox" id="myCheckbox1" name="vehicle" value="<?= $id_imagens ?>"
                                    style="position: relative;left: 35%" checked>
                    </label>

                <?php }
            }
        }
    } ?>


    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section> <?php } ?>


<?php
if (isset($_GET["utilizador"])) {

    include_once "connections/connection.php";

    $id_utilizador = $_GET["utilizador"];

    $_SESSION['id_utilizador_update'] = $id_utilizador;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT Utilizadores_id, Utilizadores_nome, Perfis_id FROM utilizadores WHERE Utilizadores_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_utilizador;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $nome, $perfil);

        while (mysqli_stmt_fetch($stmt)) {


            ?>

            <section class="row " style="top: 10vh; position: relative; height: 400px">
            <form role="form" method="post" action="scripts/Edit_utilizador.php" style="width:570px">
            <div class="form-group">
                <label>ID do utilizador é <?= $id ?></label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>O nome do utilizador é <?= $nome ?></label>
                <p class="form-control-static"></p>
            </div>

            <div class="form-group">
                <label><b>Apenas pode mudar o Perfil do utilizador</b></label>
                <p class="form-control-static"></p>
            </div>
            <select name="perfil" style="border: none; background-color: transparent; opacity: 0.7">

            <?php
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);


    $query = "SELECT Perfis_id, Perfis_nome FROM perfis";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $nome);

        while (mysqli_stmt_fetch($stmt)) { ?>


            <option value="<?= $id ?>"><?= $nome ?></option>


            <?php

        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link); ?></select>
    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section>
    <?php
}

?>

<!--APARTIR DAQUI UPDATE NAO FUNCIONA-->


<?php
if (isset($_GET["item"])) {


    include_once "connections/connection.php";

    $id_item = $_GET["item"];

    $_SESSION['id_item_update'] = $id_item;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);


    $query = "SELECT Itens_id, Itens_nome, Itens_preço,Itens_venda,Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens WHERE Itens_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_item;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_item_2, $nome, $preco, $venda, $descricao, $image, $tipo);


        while (mysqli_stmt_fetch($stmt)) {

            $_SESSION['id_tipo'] = $tipo;


            $link2 = new_db_connection();
            $stmt2 = mysqli_stmt_init($link2);
            $query2 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = ?";


            if (mysqli_stmt_prepare($stmt2, $query2)) {

                $parametro = $image;
                mysqli_stmt_bind_param($stmt2, 'i', $parametro);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $src);

                while (mysqli_stmt_fetch($stmt2)) {

                    $_SESSION['src_item'] = $src;
                    ?>


                    <section class="row " style="top: 10vh; position: relative; height: 800px">
                    <form role="form" method="post" action="scripts/Edit_item.php" style="width:570px">
                    <div class="form-group">
                        <label>ID do Item é <?= $id_item_2 ?></label>
                        <p class="form-control-static"></p>
                    </div>
                    <div class="form-group">
                        <label>Nome do item </label>
                        <input class="form-control" name="nome" value="<?= $nome ?>">
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input class="form-control" name="preco" value="<?= $preco ?>">
                    </div>

                    <div class="form-group">
                        <label>Descrição do Item</label>
                        <input class="form-control" name="descricao" value="<?= $descricao ?>">
                    </div>

                    <fieldset class="mb-4">
                        <label for="first">Mudar Venda Para - </label>
                        <select name="venda" style="background-color: transparent;border: none;opacity: 0.7">

                            <?php if ($venda == 0) { ?>
                                <option value="1">Sim</option>
                                <option value="0" selected>Não</option>
                            <?php } else { ?>
                                <option value="1" selected>Sim</option>
                                <option value="0">Não</option><?php } ?>

                        </select>
                        <div class="after"></div>
                    </fieldset>


                    <?php
                }
            }
        }
    }

mysqli_close($link)
    ?>

    <fieldset class="mb-4">
        <label for="first">Mudar Tipo para - </label>
        <select name="tipo" style="background-color: transparent;border: none;opacity: 0.7">

            <?php

            require_once("connections/connection.php"); // We need the function!

            $link = new_db_connection(); // Create a new DB connection

            $stmt = mysqli_stmt_init($link); // create a prepared statement

            $query = "SELECT Tipos_id, Tipos_nome FROM tipos"; // Define the query

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt); // Execute the prepared statement

                mysqli_stmt_bind_result($stmt, $id, $tipo); // Bind results

                while (mysqli_stmt_fetch($stmt)) {

                    if ($id == $_SESSION['id_tipo']) {

                        echo "<option value='" . $id . "'selected>" . $tipo . " </option>";
                    } else {
                        // Fetch values
                        echo "<option value='" . $id . "'>" . $tipo . "</option>";
                    }
                }
                mysqli_stmt_close($stmt); // Close statement
            }
            mysqli_close($link); // Close connection


            ?>
        </select>
        <div class="after"></div>
    </fieldset>

    <img src="<?= $_SESSION['src_item'] ?>" height="100px" style="position: relative; left: 44%">
    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section>
    <?php
}

?>

<?php
if (isset($_GET["obra"])) {


    include_once "connections/connection.php";

    $id_obra = $_GET["obra"];

    $_SESSION['id_obra_update'] = $id_obra;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);


    $query = "SELECT Obras_id, Obras_nome, Obras_descrição,Obras_data,Imagens_Imagens_id FROM obras WHERE Obras_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_obra;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $obrasid, $nome, $descricao, $data, $image);


        while (mysqli_stmt_fetch($stmt)) {

            ?>


            <section class="row " style="top: 10vh; position: relative; height: 800px">
            <form role="form" method="post" action="scripts/Edit_obra.php" style="width:570px">
            <div class="form-group">
                <label>ID da Obra é <?= $obrasid ?></label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>Nome do item </label>
                <input class="form-control" name="nome" value="<?= $nome ?>">
            </div>
            <div class="form-group">
                <label>Ano da Obra</label>
                <input class="form-control" name="data" value="<?= $data ?>">
            </div>

            <div class="form-group">
                <label>Descrição da Obra </label>
                <input class="form-control" name="descricao" value="<?= $descricao ?>">
            </div>


            <?php

            $link2 = new_db_connection();
            $stmt2 = mysqli_stmt_init($link2);
            $query2 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = ?";


            if (mysqli_stmt_prepare($stmt2, $query2)) {

                $parametro = $image;
                mysqli_stmt_bind_param($stmt2, 'i', $parametro);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $src);

                while (mysqli_stmt_fetch($stmt2)) {

                    $_SESSION['src_item'] = $src;

                }
            }
        }
    }

mysqli_close($link)
    ?>

    <img src="<?= $_SESSION['src_item'] ?>" height="100px" style="position: relative; left: 44%">
    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section>
    <?php
}

?>





<?php
if (isset($_GET["lanterna"])) {


    include_once "connections/connection.php";

    $id_lanterna = $_GET["lanterna"];

    $_SESSION['id_lanterna_update'] = $id_lanterna;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);




    $query = "SELECT Lanternas_id, Lanternas_nome, Lanternas_ref_3D,Lanternas_descrição,Lanternas_cor,Lanternas_raio,Lanternas_intensidade FROM lanternas WHERE Lanternas_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_lanterna;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $lanternaid, $nome, $image, $descricao, $cor,$raio,$intensidade);


        while (mysqli_stmt_fetch($stmt)) {

            ?>


            <section class="row " style="top: 10vh; position: relative; height: 800px">
            <form role="form" method="post" action="scripts/Edit_lanterna.php" style="width:570px">
            <div class="form-group">
                <label>ID da Obra é <?= $lanternaid ?></label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>Nome do item </label>
                <input class="form-control" name="nome" value="<?= $nome ?>">
            </div>
            <div class="form-group">
                <label>Descrição da Lanterna </label>
                <input class="form-control" name="descricao" value="<?= $descricao ?>">
            </div>

            <div class="form-group">
                <label>Cor</label>
                <input class="form-control" name="cor" value="<?= $cor ?>">
            </div>

            <div class="form-group">
                <label>Raio</label>
                <input class="form-control" name="raio" value="<?= $raio ?>">
            </div>
            <div class="form-group">
                <label>Intensidade</label>
                <input class="form-control" name="intensidade" value="<?= $intensidade ?>">
            </div>




            <?php

            $link2 = new_db_connection();
            $stmt2 = mysqli_stmt_init($link2);
            $query2 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = ?";


            if (mysqli_stmt_prepare($stmt2, $query2)) {

                $parametro = $image;
                mysqli_stmt_bind_param($stmt2, 'i', $parametro);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $src);

                while (mysqli_stmt_fetch($stmt2)) {

                    $_SESSION['src_item'] = $src;

                }
            }
        }
    }

mysqli_close($link)
    ?>

    <img src="<?= $_SESSION['src_item'] ?>" height="100px" style="position: relative; left: 44%">
    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section>
    <?php
}

?>

<?php
if (isset($_GET["conquista"])) {


    include_once "connections/connection.php";

    $id_conquista = $_GET["conquista"];

    $_SESSION['id_conquista_update'] = $id_conquista;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);


    $query = "SELECT Conquistas_id, Conquistas_nome, Conquistas_descrição,Conquistas_pontos,Imagens_Imagens_id FROM conquistas WHERE Conquistas_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_conquista;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $conquistaid, $nome, $descricao, $pontos, $image);


        while (mysqli_stmt_fetch($stmt)) {

            ?>


            <section class="row " style="top: 10vh; position: relative; height: 800px">
            <form role="form" method="post" action="scripts/Edit_conquista.php" style="width:570px">
            <div class="form-group">
                <label>ID da Obra é <?= $conquistaid ?></label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>Nome da Conquista </label>
                <input class="form-control" name="nome" value="<?= $nome ?>">
            </div>
            <div class="form-group">
                <label>Descrição da Conquista</label>
                <input class="form-control" name="descricao" value="<?= $descricao ?>">
            </div>

            <div class="form-group">
                <label>Pontos</label>
                <input class="form-control" name="pontos" value="<?= $pontos ?>">
            </div>



            <?php

            $link2 = new_db_connection();
            $stmt2 = mysqli_stmt_init($link2);
            $query2 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = ?";


            if (mysqli_stmt_prepare($stmt2, $query2)) {

                $parametro = $image;
                mysqli_stmt_bind_param($stmt2, 'i', $parametro);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $src);

                while (mysqli_stmt_fetch($stmt2)) {

                    $_SESSION['src_item'] = $src;

                }
            }
        }
    }

mysqli_close($link)
    ?>

    <img src="<?= $_SESSION['src_item'] ?>" height="100px" style="position: relative; left: 44%">
    <button type="submit" name="submit">Adicionar</button>
    </form>
    </section>
    <?php
}

?>

<?php
if (isset($_GET["tarefa"])) {


    include_once "connections/connection.php";

    $id_tarefa = $_GET["tarefa"];

    $_SESSION['id_tarefa_update'] = $id_tarefa;


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);



    $query = "SELECT Tarefas_id, Tarefas_nome, Tarefas_tempo,Tarefas_dinheiro,Tarefas_pontos,Imagens_Imagens_id FROM tarefas WHERE Tarefas_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_tarefa;
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $tarefaid, $nome, $tempo, $dinheiro, $pontos,$image);


        while (mysqli_stmt_fetch($stmt)) {

            ?>


            <section class="row " style="top: 10vh; position: relative; height: 800px">
            <form role="form" method="post" action="scripts/Edit_tarefa.php" enctype="multipart/form-data" style="width:570px">
            <div class="form-group">
                <label>ID da Obra é <?= $tarefaid ?></label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label>Nome da Conquista </label>
                <input class="form-control" name="nome" value="<?= $nome ?>">
            </div>
            <div class="form-group">
                <label>Duração em minutos</label>
                <input class="form-control" name="tempo"  value="<?= $tempo ?>">
            </div>

            <div class="form-group">
                <label>Dinheiro</label>
                <input class="form-control" name="dinheiro" value="<?= $dinheiro ?>">
            </div>

            <div class="form-group">
                <label>Dinheiro</label>
                <input class="form-control" name="pontos" value="<?= $pontos ?>">
            </div>



            <?php

            $link2 = new_db_connection();
            $stmt2 = mysqli_stmt_init($link2);
            $query2 = "SELECT Imagens_src FROM imagens WHERE Imagens_id = ?";


            if (mysqli_stmt_prepare($stmt2, $query2)) {

                $parametro = $image;
                mysqli_stmt_bind_param($stmt2, 'i', $parametro);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $src);

                while (mysqli_stmt_fetch($stmt2)) {

                    $_SESSION['src_item'] = $src;

                }
            }
        }
    }

mysqli_close($link)
    ?>

    <img src="<?= $_SESSION['src_item'] ?>" height="100px" style="position: relative; left: 44%">

    <button type="submit" name="tarefa" value="tarefa">Adicionar</button>
    </form>
    </section>
    <?php
}

?>


