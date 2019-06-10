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


// Utilizadores

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
                <form role="form" method="post" action="scripts/Edit_utilizador.php" style="width:570px">
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
                        <input class="form-control" name="nome" value="<?= $descricao ?>">
                    </div>

                    <div class="form-group">
                        <label>Posição no Jogo </label>
                        <input class="form-control" name="number" value="<?= $jogo?>">
                    </div>
                    <div class="form-group">
                        <label>Posição no Mapa </label>
                        <input class="form-control" name="number" value="<?= $mapa ?>">
                    </div>
                    <div class="form-group">
                        <label>Piso</label>
                        <input class="form-control" name="number" value="<?= $piso ?>">
                    </div>

                    <button type="submit" name="submit">Adicionar</button>
                </form>
            </section>
        <?php
        }
    }?>


    <?php
}

?>


