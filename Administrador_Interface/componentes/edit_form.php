<?php
if (isset($_GET["evento"])) {

    include_once "connections/connection.php";

    $id_evento = $_GET["evento"];

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

            <section class="row">
            <form action="scripts/Edit_evento.php" autocomplete="off" method="post" enctype="multipart/form-data"
            style="width:500px">
            <fieldset class="mb-4">
                <input id="first" type="text" name="nome" class="inputform" required>
                <label for="first">Nome do Evento</label>
                <div class="after"></div>
            </fieldset>


            <fieldset class="mb-4">
                <label for="first"><?= $dataini ?></label>
                <input id="first" type="date" name="data_inicio" class="inputform m-0" required>
                <div class="after"></div>
            </fieldset>
            <fieldset class="mb-4">
                <label for="first"><?= $datafim ?></label>
                <input id="first" type="date" name="data_fim" class="inputform m-0" required>
                <div class="after"></div>
            </fieldset>
            <fieldset class="mb-4">
                <input id="first" type="text" name="descrição_curta" class="inputform" required>
                <label for="first">Nova Descrição Curta</label>
                <div class="after"></div>
            </fieldset>

            <fieldset class="mb-4">
                <input id="first" type="text" name="descrição_longa" class="inputform" required>
                <label for="first">Nova Descrição Longa</label>
                <div class="after"></div>
            </fieldset>
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
    $query = "SELECT Eventos_nome, Eventos_data_inicio, Eventos_data_fim,Eventos_decrição_curta, Eventos_descrição_longa FROM eventos WHERE Eventos_id = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {

        $id = $id_evento;
        mysqli_stmt_bind_param($stmt, 's', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nome, $dataini, $datafim, $descricao_curta, $descricao_longa);

        while (mysqli_stmt_fetch($stmt)) {

    ?>


    <label for="myCheckbox1"><img src="uploads/conquista_10_06_2019_11_09_47__upload_image-512.png" height="100px"/>
        <br> <input type="checkbox" id="myCheckbox1" name="vehicle" value="Bike" style="position: relative;left: 45px">
    </label>


    <fieldset>
        <button type="submit" name="submit" value="evento">Adicionar</button>
    </fieldset>
    </form>
    </section>
    <?php

} }

    mysqli_stmt_close($stmt);
    mysqli_close($link);


} else {
    //("location:");
    mysqli_close($link);

}
?>