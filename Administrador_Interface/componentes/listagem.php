<?php
if (isset($_GET['page'])){

    $page = $_GET['page'];
    $limit = 10;
    $offset = ($page - 1)*10;

if (isset($_GET["listagem"])) {

    $x = $_GET["listagem"];

    require_once("connections/connection.php");

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);


    switch ($x) {

        case "eventos":
            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="data") {
                    $y = "SELECT Eventos_id,	Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_decrição_curta, Eventos_descrição_longa FROM eventos ORDER BY Eventos_data_inicio DESC ";
                }



            }else {
                $y = "SELECT Eventos_id,	Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_decrição_curta, Eventos_descrição_longa FROM eventos";
            }

            echo "<div class=\"row justify-content-center caixa4  m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Eventos</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=evento\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query=$y;

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $data_inicio, $data_fim, $descricao_curta, $descricao_longa); // Bind results
                while (mysqli_stmt_fetch($stmt)) {

                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?evento=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_evento=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $data_inicio . "</section>
                                           </div>";


                }
                mysqli_stmt_close($stmt);
            }else{
                echo mysqli_stmt_error($stmt);
            }

            break;
        case "salas":

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="pisoasc") {
                    $y = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas ORDER BY Salas_piso ASC";
                }
                if ($_GET["ordenar"]=="pisodesc") {
                    $y = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas ORDER BY Salas_piso DESC";
                }



            }else {
                $y = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas";
            }

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Salas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=sala\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = $y;
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $descricao, $posicao_jogo, $posicao_mapa, $piso); // Bind results
                while (mysqli_stmt_fetch($stmt)) {

                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?sala=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_obra=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $descricao . "</section>
                                           </div>";
                }
                mysqli_stmt_close($stmt);
            }

            break;
        case"utilizadores" :

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="perfil") {
                    $y = "SELECT 	Utilizadores_id, Utilizadores_nome, Utilizadores_email,Perfis_id FROM utilizadores ORDER BY Perfis_id ASC";
                }



            }else {
                $y = "SELECT 	Utilizadores_id, Utilizadores_nome, Utilizadores_email,Perfis_id FROM utilizadores";
            }

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Utilizadores</h1> </div>";

            $query = $y;
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $email, $perfil); // Bind results
                while (mysqli_stmt_fetch($stmt)) {

                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?utilizador=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_utilizador=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-3 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $email . "</section>
                                            <section class='col-1 p-2 listagemdecenas'>" . $perfil . "</section>
                                            
                                           </div>";
                }
                mysqli_stmt_close($stmt);
            }



            break;


        case "vestuario":

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="precoasc") {
                    $y = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens ORDER BY Itens_preço ASC";
                }
                if ($_GET["ordenar"]=="precodesc") {
                    $y = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens ORDER BY Itens_preço DESC";
                }



            }else {
                $y = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens";
            }

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Itens</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=item\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = $y;

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $preco, $venda, $descricao, $ref_3D, $tipo_id); // Bind results
                while (mysqli_stmt_fetch($stmt)) {
                    echo " <div class=\"row justify-content-around text-center  m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?item=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_item=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-2 p-2 listagemdecenas'>" . $preco . "</section>
                                            <section class='col-2 p-2 listagemdecenas'>" . $tipo_id . "</section>
                                            </div>";
                }
            }

            mysqli_stmt_close($stmt);

            break;


        case "obras":

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="dataasc") {
                    $y = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras ORDER BY Obras_data ASC";
                }
                if ($_GET["ordenar"]=="datadesc") {
                    $y = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras ORDER BY Obras_data DESC";
                }



            }else {
                $y = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras";
            }


            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Obras</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=obra\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div> ";

            $query = $y;
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $descricao, $data, $imagem); // Bind results
                while (mysqli_stmt_fetch($stmt)) {
                    echo " <div class=\"row justify-content-around text-center  m-3 \">
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?obra=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_obra=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $data . "</section>
                                           </div>";
                }
            }

            mysqli_stmt_close($stmt);

            break;

        case "lanternas":

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="intensidadeasc") {
                    $y = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas ORDER BY Lanternas_intensidade ASC";
                }
                if ($_GET["ordenar"]=="intensidadedesc") {
                    $y = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas ORDER BY Lanternas_intensidade DESC";
                }



            }else {
                $y = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas";
            }

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Lanternas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=lanterna\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = $y;
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $red_3D, $descricao, $cor, $raio, $intensidade); // Bind results
                while (mysqli_stmt_fetch($stmt)) {
                    echo " <div class=\"row justify-content-around text-center  m-3 \">
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?lanterna=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_lanterna=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $descricao . "</section>
                                           </div>";
                }
            }

            mysqli_stmt_close($stmt);

            break;

        case "conquistas" :

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="pontosasc") {
                    $y = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas ORDER BY Conquistas_pontos ASC";
                }
                if ($_GET["ordenar"]=="pontosdesc") {
                    $y = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas ORDER BY Conquistas_pontos DESC";
                }



            }else {
                $y = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas";
            }

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Conquistas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=conquista\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = $y;
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $descricao, $pontos, $imagem); // Bind results
                while (mysqli_stmt_fetch($stmt)) {

                    echo " <div class=\"row justify-content-around text-center m-3 \">
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?conquista=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_conquista=" . $id . "' class='text-dark'>ELIMINAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $descricao . "</section>
                                           </div>";
                }
            }

            mysqli_stmt_close($stmt);

            break;


        case "tarefas":

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"]=="tempoasc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_tempo ASC";
                }
                if ($_GET["ordenar"]=="tempodesc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_tempo DESC";
                }
                if ($_GET["ordenar"]=="precoasc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_dinheiro ASC";
                }
                if ($_GET["ordenar"]=="precodesc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_dinheiro DESC";
                }
                if ($_GET["ordenar"]=="pontosasc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_pontos ASC";
                }
                if ($_GET["ordenar"]=="pontosdesc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_pontos DESC";
                }



            }else {
                $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas";
            }


            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Tarefas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=tarefa\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";


            $query = $y;
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $tempo, $dinheiro, $pontos, $imagem); // Bind results
                while (mysqli_stmt_fetch($stmt)) {
                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?tarefa=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_tarefa=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $dinheiro . "</section>
                                           </div>";
                }
                mysqli_stmt_close($stmt);
            }


            break;

        default;

            echo "Aconteceu algo de errado";

            break;
    }


    mysqli_close($link); // Close connection

} else {
    echo "Aconteceu algo de errado";
}}

?>


