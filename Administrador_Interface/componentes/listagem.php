<?php
if (isset($_GET["listagem"])) {

    $x = $_GET["listagem"];

    require_once("connections/connection.php");

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);


    switch ($x) {

        case "eventos":

            echo "<div class=\"row justify-content-center caixa4  m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Eventos</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=evento\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = "SELECT Eventos_id,	Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_decrição_curta, Eventos_descrição_longa FROM eventos";
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
            }

            break;
        case "salas":
            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Salas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=sala\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo,	Salas_posição_mapa,	Salas_piso FROM salas";
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $descricao, $posicao_jogo, $posicao_mapa, $piso); // Bind results
                while (mysqli_stmt_fetch($stmt)) {

                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?obra=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_obra=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $descricao . "</section>
                                           </div>";
                }
                mysqli_stmt_close($stmt);
            }

            break;
        case"utilizadores" :
            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Utilizadores</h1> </div>";

            $query = "SELECT 	Utilizadores_id, Utilizadores_nome, Utilizadores_email,Perfis_id FROM utilizadores";
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
            }

            mysqli_stmt_close($stmt);

            break;


        case "vestuario":
            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Vestuário</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=item\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens";

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

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Obras</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=obra\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div> ";

            $query = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras";
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

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Lanternas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=lanterna\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas";
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

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Conquistas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=conquista\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";

            $query = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas";
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

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Tarefas</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=tarefa\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";


            $query = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefast";
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $tempo, $dinheiro, $pontos, $imagem); // Bind results
                while (mysqli_stmt_fetch($stmt)) {
                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?tarefa=" . $id . "' class='text-dark'>EDITAR</a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?elimina_tarefa=" . $id . "' class='text-dark'>ELIMINAR</a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $imagem . "</section>
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
}

?>


