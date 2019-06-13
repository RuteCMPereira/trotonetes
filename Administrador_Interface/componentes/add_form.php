<?php


if (isset($_SESSION['addsucess']) ) {


    if ($_SESSION['addsucess'] == 1) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Evento Criado com Sucesso</h2>
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

    if ($_SESSION['addsucess'] == 3) {

        echo "<div class=\"row justify-content-center\">
                <section class=\"col-5 bg-danger p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h5 class=\"text-light\">Evento criado com sucesso, contudo ocorreu um problema com o upload das imagens do evento, relembramos que apenas pode incluir imagens no formato PNG, JPEG e JPG</h5>
                    <h4 class=\"text-light\"><a>PARA ADICIONAR OU REVER AS IMAGENS DO EVENTO CARREGUE AQUI</a></h4>
                </section>
              </div>";

    }
    if ($_SESSION['addsucess'] == 4) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Sala Criado com Sucesso</h2>
                 </section>
              </div>";
    }
    if ($_SESSION['addsucess'] == 5) {

        echo "<div class=\"row justify-content-center\">
                <section class=\"col-5 bg-danger p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h5 class=\"text-light\">Sala criada com sucesso, contudo ocorreu um problema com o upload das imagens do evento, relembramos que apenas pode incluir imagens no formato PNG, JPEG e JPG</h5>
                    <h4 class=\"text-light\"><a>PARA ADICIONAR OU REVER AS IMAGENS DA SALA CARREGUE AQUI</a></h4>
                </section>
              </div>";

    }
    if ($_SESSION['addsucess'] == 6) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Obra Criada com Sucesso</h2>
                 </section>
              </div>";
    }
    if ($_SESSION['addsucess'] == 7) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Conquista Criada com Sucesso</h2>
                 </section>
              </div>";
    }
    if ($_SESSION['addsucess'] == 8) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Item / Vestuário Criado com Sucesso</h2>
                 </section>
              </div>";
    }

    if ($_SESSION['addsucess'] == 9) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Tarefa Criada com Sucesso</h2>
                 </section>
              </div>";
    }
    if ($_SESSION['addsucess'] == 10) {

        echo "<div class=\"row justify-content-center\">
                 <section class=\"col-5 bg-success p-3 text-center resposta\" style=\"border-radius: 30px\">
                    <h2 class=\"text-light\">Lanterna Criada com Sucesso</h2>
                 </section>
              </div>";
    }


    $_SESSION['addsucess'] = 1000;

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
                      style="width:500px">
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
                        <label for="first">Upload de Imagens <small>PNG, JPEG e JPG</small></label>
                        <input id='upload' name="upload[]" type="file" multiple="multiple"  class="inputform m-0 mb-2" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit"  name="submit" value="evento">Adicionar</button>
                    </fieldset>
                </form>
            </section>
            <?php
            break;
        case "sala":

            ?>

            <section class="row">
                <form action="scripts/Add_sala.php" autocomplete="off" method="post" enctype="multipart/form-data"
                      style="width: 500px">
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="nome" class="inputform" required>
                        <label for="first">Nome da Sala</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="descricao" class="inputform" required>
                        <label for="first">Descrição</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="jogo" class="inputform" required>
                        <label for="first">Posição no Jogo</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="mapa" class="inputform" required>
                        <label for="first">Posição no Mapa</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Piso</label>
                        <input id="first" type="number" name="piso" class="inputform m-0" style="background-color: transparent" required>

                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Upload de Imagens <small>PNG, JPEG e JPG</small></label>
                        <input id='upload' name="upload[]" type="file" multiple="multiple"  class="inputform m-0 mb-2" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit" name="submit" value="sala">Adicionar</button>
                    </fieldset>
                </form>
            </section>
            <?php
            break;
        case "obra":

            ?>

            <section class="row">
                <form action="scripts/Add_obra.php" autocomplete="off" method="post" enctype="multipart/form-data"
                      style="width: 500px">
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="nome" class="inputform" required>
                        <label for="first">Nome da Obra</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="descricao" class="inputform" required>
                        <label for="first">Descrição</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Ano de Criação</label>
                        <input id="first" type="number" name="ano" class="inputform m-0 mb-1" required style="background-color: transparent">
                        <div class="after"></div>
                    </fieldset>


                    <fieldset class="mb-4">
                        <label for="first">Upload de Imagens <small>PNG, JPEG e JPG</small></label>
                        <input id='upload' name="upload[]" type="file"  class="inputform m-0 mb-2" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit" name="submit" value="obra">Adicionar</button>
                    </fieldset>
                </form>
            </section>
            <?php
            break;

        case "conquista":

            ?>

            <section class="row">
                <form action="scripts/Add_conquista.php" autocomplete="off" method="post" enctype="multipart/form-data"
                      style="width: 500px">
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="nome" class="inputform" required>
                        <label for="first">Nome da Conquista</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="descricao" class="inputform" required>
                        <label for="first">Descrição</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Pontos</label>
                        <input id="first" type="number" name="pontos" class="inputform m-0 mb-1" required style="background-color: transparent">
                        <div class="after"></div>
                    </fieldset>


                    <fieldset class="mb-4">
                        <label for="first">Upload de Imagens <small>PNG, JPEG e JPG</small></label>
                        <input id='upload' name="upload[]" type="file"  class="inputform m-0 mb-2" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit" name="submit" value="conquista">Adicionar</button>
                    </fieldset>
                </form>
            </section>
            <?php
            break;


        case "item":

            ?>

            <section class="row">
                <form action="scripts/Add_item.php" autocomplete="off" method="post" enctype="multipart/form-data"
                      style="width: 500px">
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="nome" class="inputform" required>
                        <label for="first">Nome do Item</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="descricao" class="inputform" required>
                        <label for="first">Descrição</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Preço</label>
                        <input id="first" type="number" name="preco" class="inputform m-0 mb-1" required style="background-color: transparent">
                        <div class="after"></div>
                    </fieldset>
                    <fieldset class="mb-4">
                        <label for="first">Tipo - </label>
                    <select name="tipo" style="background-color: transparent;border: none;opacity: 0.7" >

                            <?php

                            require_once("connections/connection.php"); // We need the function!

                            $link = new_db_connection(); // Create a new DB connection

                            $stmt = mysqli_stmt_init($link); // create a prepared statement

                            $query = "SELECT Tipos_id, Tipos_nome FROM tipos"; // Define the query

                            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                mysqli_stmt_execute($stmt); // Execute the prepared statement

                                mysqli_stmt_bind_result($stmt, $id, $tipo); // Bind results

                                while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                    echo "<option value='".$id."'>".$tipo."</option>";
                                }
                                mysqli_stmt_close($stmt); // Close statement
                            }
                            mysqli_close($link); // Close connection


                            ?>

                    </select>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Para Venda - </label>
                        <select name="venda" style="background-color: transparent;border: none;opacity: 0.7" >
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset class="mb-4">
                        <label for="first">Upload de Imagens <small>PNG, JPEG e JPG</small></label>
                        <input id='upload' name="upload[]" type="file"  class="inputform m-0 mb-2" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit" name="submit" value="item">Adicionar</button>
                    </fieldset>
                </form>
            </section>
            <?php
            break;


        case "tarefa":

            ?>

            <section class="row">
                <form action="scripts/Add_tarefa.php" autocomplete="off" method="post" enctype="multipart/form-data"
                      style="width: 500px">
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="nome" class="inputform" required>
                        <label for="first">Nome da Tarefa</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4"><label for="first">Tempo</label>
                        <input id="first" type="number" name="tempo" class="inputform m-0" style="background-color: transparent;opacity: 0.8" required>

                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Preço</label>
                        <input id="first" type="number" name="preco" class="inputform m-0 mb-1" required style="background-color: transparent;opacity: 0.8">
                        <div class="after"></div>
                    </fieldset>
                    <fieldset class="mb-4">
                        <label for="first">Pontos</label>
                        <input id="first" type="number" name="pontos" class="inputform m-0 mb-1" required style="background-color: transparent;opacity: 0.8">
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Upload de Imagens <small>PNG, JPEG e JPG</small></label>
                        <input id='upload' name="upload[]" type="file"  class="inputform m-0 mb-2" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit" name="submit" value="tarefa">Adicionar</button>
                    </fieldset>
                </form>
            </section>
            <?php
            break;
        case "lanterna":

            ?>

            <section class="row">
                <form action="scripts/Add_lanterna.php" autocomplete="off" method="post" enctype="multipart/form-data"
                      style="width: 500px">
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="nome" class="inputform" required>
                        <label for="first">Nome da Lanterna</label>
                        <div class="after"></div>
                    </fieldset>
                    <fieldset class="mb-4">
                        <input id="first" type="text" name="descricao" class="inputform" required>
                        <label for="first">Descrição</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <input id="first" type="text" name="cor" class="inputform" required>
                        <label for="first">Cor</label>
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Raio</label>
                        <input id="first" type="number" name="raio" class="inputform m-0 mb-1" required style="background-color: transparent;opacity: 0.8">
                        <div class="after"></div>
                    </fieldset>
                    <fieldset class="mb-4">
                        <label for="first">Intensidade</label>
                        <input id="first" type="number" name="intensidade" class="inputform m-0 mb-1" required style="background-color: transparent;opacity: 0.8">
                        <div class="after"></div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label for="first">Upload de Imagens <small>PNG, JPEG e JPG</small></label>
                        <input id='upload' name="upload[]" type="file"  class="inputform m-0 mb-2" required>
                        <div class="after"></div>
                    </fieldset>



                    <fieldset>
                        <button type="submit" name="submit" value="lanterna">Adicionar</button>
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
