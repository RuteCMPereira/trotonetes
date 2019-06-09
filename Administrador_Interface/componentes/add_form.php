<?php


if (isset($_SESSION['addsucess'])) {


    if ($_SESSION['addsucess'] == 1) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Informação Adicionada com sucesso</h2>
                 </section>
              </div>";
    }
    if ($_SESSION['addsucess'] == 0) {

        echo "<div class=\"row justify-content-center\">
                <section class=\"col-5 bg-danger p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Ocorreu um erro</h2>
                </section>
              </div>";

    }

    $_SESSION['addsucess'] = 3;

}

?>






<?php
if (isset($_GET["add"])) {

    $x = $_GET["add"];


    switch ($x) {

        case "evento":

            ?>

            <section class="row">
                <form action="scripts/Add_evento.php" autocomplete="off" method="post" enctype="multipart/form-data"
                      style="width: 500px">
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="nome" class="inputform" required>
                        <label for="first">Nome do Evento</label>
                        <div class="after"></div>
                    </fieldset>


                    <fieldset class="mb-4">
                        <label for="first">Data de Inicio</label>
                        <input id="first" type="date" name="data_inicio" class="inputform m-0" required>
                        <div class="after"></div>
                    </fieldset>
                    <fieldset class="mb-4">
                        <label for="first">Data de Fim</label>
                        <input id="first" type="date" name="data_fim" class="inputform m-0" required>
                        <div class="after"></div>
                    </fieldset>
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="descrição_curta" class="inputform" required>
                        <label for="first">Descrição Curta</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="descrição_longa" class="inputform" required>
                        <label for="first">Descrição Longa</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Upload Image</label>
                        <input id='upload' name="upload[]" type="file" multiple="multiple"  class="inputform m-0" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit">Adicionar</button>
                    </fieldset>
                </form>
            </section>
            <?php
            break;
    }
} else {
    echo "Algo de Errado Aconteceu";
}
?>
