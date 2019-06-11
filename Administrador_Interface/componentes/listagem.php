<?php

if (isset($_GET['page'])) {

    $page = $_GET['page'];
    $previous = $page - 1;
    $next = $page + 1;
    $limit = 2;
    $offset = ($page - 1) * $limit;

    if ($page < 1) {
        header("location:Listagem.php?listagem=eventos&page=1");
    }
}

if (isset($_GET["listagem"])) {

    $x = $_GET["listagem"];

    require_once("connections/connection.php");

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);


    switch ($x) {

        case "eventos":
            $ultima_pagina = 0;
            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "data") {
                    $y = "SELECT Eventos_id,	Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_decrição_curta, Eventos_descrição_longa FROM eventos ORDER BY Eventos_data_inicio DESC";
                }


            } else {
                $y = "SELECT Eventos_id,	Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_decrição_curta, Eventos_descrição_longa FROM eventos LIMIT $limit OFFSET $offset";
            }

            echo "<div class=\"row justify-content-center caixa4  m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Eventos</h1>
                                             </section>
                                            <section class=\"col-7 text-center p-0 m-0\"><a href=\"Adicionar.php?add=evento\" class=\"w-100  adicionar px-4\">
                                                <b style=\" color: white\">ADICIONAR <i class=\"fas fa-plus fa-1x \"style=\"color:white\"></i></b></a>
                                            </section>
                                         </div>";
            $query = $y;

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $data_inicio, $data_fim, $descricao_curta, $descricao_longa); // Bind results

                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-4 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-4 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>DATA</h4></section>
                                           </div>";


                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;


                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?evento=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?evento=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $data_inicio . "</section>
                                           </div>";


                }
                if ($x < $limit) {
                    $ultima_pagina = 1;
                }



                mysqli_stmt_close($stmt);
            }

            break;
        case "salas":
            $ultima_pagina = 0;

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "pisoasc") {
                    $y = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas ORDER BY Salas_piso ASC";
                }
                if ($_GET["ordenar"] == "pisodesc") {
                    $y = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas ORDER BY Salas_piso DESC";
                }


            } else {
                $y = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas LIMIT $limit OFFSET $offset";
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

                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-3 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-3 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>DESCRIÇÃO</h4></section>
                                            <section class='col-2 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>PISO</h4></section> 
                                        
                                           </div>";


                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;

                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?sala=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?sala=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-3 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-3 p-2 listagemdecenas'>" . $descricao . "</section>
                                                        <section class='col-2 p-2 listagemdecenas'>" . $piso . "</section>
                                           </div>";
                }
                if ($x < $limit) {
                    $ultima_pagina = 1;
                }



                mysqli_stmt_close($stmt);
            }

            break;
        case"utilizadores" :
            $ultima_pagina = 0;

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "perfil") {
                    $y = "SELECT 	Utilizadores_id, Utilizadores_nome, Utilizadores_email,Perfis_id FROM utilizadores ORDER BY Perfis_id ASC";
                }


            } else {
                $y = "SELECT 	Utilizadores_id, Utilizadores_nome, Utilizadores_email,Perfis_id FROM utilizadores LIMIT $limit OFFSET $offset";
            }

            echo "<div class=\"row justify-content-center caixa4 m-3 p-3\">
                                            <section class=\"col-10 text-center p-0 m-0\">
                                                <h1>Listagem de Utilizadores</h1> </div>";

            $query = $y;
            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $email, $perfil); // Bind results

                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-3 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-4 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>MAIL</h4></section>
                                            <section class='col-1 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>PERFIL</h4></section> 
                                        
                                           </div>";

                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;

                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?utilizador=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?utilizador=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-3 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $email . "</section>
                                            <section class='col-1 p-2 listagemdecenas'>" . $perfil . "</section>
                                            
                                           </div>";
                }

                if ($x < $limit) {
                    $ultima_pagina = 1;
                }


                mysqli_stmt_close($stmt);
            }


            break;


        case "vestuario":
            $ultima_pagina = 0;

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "precoasc") {
                    $y = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens ORDER BY Itens_preço ASC";
                }
                if ($_GET["ordenar"] == "precodesc") {
                    $y = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens ORDER BY Itens_preço DESC";
                }


            } else {
                $y = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens LIMIT $limit OFFSET $offset";
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

                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-4 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-2 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>PREÇO</h4></section>
                                            <section class='col-2 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>TIPO</h4></section> 
                                         
                                           </div>";


                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;

                    echo " <div class=\"row justify-content-around text-center  m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?item=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?item=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-2 p-2 listagemdecenas'>" . $preco . "</section>
                                            <section class='col-2 p-2 listagemdecenas'>" . $tipo_id . "</section>
                                            </div>";
                }
                if ($x < $limit) {
                    $ultima_pagina = 1;
                }


                mysqli_stmt_close($stmt);
            }


            break;


        case "obras":
            $ultima_pagina = 0;

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "dataasc") {
                    $y = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras ORDER BY Obras_data ASC";
                }
                if ($_GET["ordenar"] == "datadesc") {
                    $y = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras ORDER BY Obras_data DESC";
                }


            } else {
                $y = "SELECT Obras_id,	Obras_nome,	Obras_descrição,	Obras_data,	Imagens_Imagens_id FROM obras LIMIT $limit OFFSET $offset";
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

                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-4 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-4 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>DATA</h4></section>
                                           
                                           </div>";

                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;

                    echo " <div class=\"row justify-content-around text-center  m-3 \">
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?obra=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?obra=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $data . "</section>
                                           </div>";
                }
            }

            if ($x < $limit) {
                $ultima_pagina = 1;
            }


            mysqli_stmt_close($stmt);

            break;

        case "lanternas":
            $ultima_pagina = 0;

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "intensidadeasc") {
                    $y = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas ORDER BY Lanternas_intensidade ASC";
                }
                if ($_GET["ordenar"] == "intensidadedesc") {
                    $y = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas ORDER BY Lanternas_intensidade DESC";
                }


            } else {
                $y = "SELECT Lanternas_id,	Lanternas_nome,	Lanternas_ref_3D,	Lanternas_descrição,	Lanternas_cor,	Lanternas_raio,	Lanternas_intensidade FROM lanternas LIMIT $limit OFFSET $offset";
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

                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-4 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-4 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>INTENSIDADE</h4></section>
                                        
                                           </div>";

                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;


                    echo " <div class=\"row justify-content-around text-center  m-3 \">
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?lanterna=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?lanterna=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-4 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $descricao . "</section>
                                           </div>";
                }

            }

            if ($x < $limit) {
                $ultima_pagina = 1;
            }



            mysqli_stmt_close($stmt);

            break;

        case "conquistas" :

            $ultima_pagina = 0;

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "pontosasc") {
                    $y = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas ORDER BY Conquistas_pontos ASC";
                }
                if ($_GET["ordenar"] == "pontosdesc") {
                    $y = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas ORDER BY Conquistas_pontos DESC";
                }


            } else {
                $y = "SELECT Conquistas_id,	Conquistas_nome,	Conquistas_descrição,	Conquistas_pontos,	Imagens_Imagens_id FROM conquistas LIMIT $limit OFFSET $offset";
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
                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-3 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-4 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>DESCRIÇÃO</h4></section>
                                            
                                            <section class='col-1 p-2 listagemdecenas1'><h4 class='mt-2' style='font-weight: bold'>PONTOS</h4></section>
                                           </div>";

                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;


                    echo " <div class=\"row justify-content-around text-center m-3 \">
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?conquista=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?conquista=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-3 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-4 p-2 listagemdecenas'>" . $descricao . "</section>
                                            <section class='col-1 p-2 listagemdecenas'>" . $pontos . "</section>
                                           </div>";
                }
                if ($x < $limit) {
                    $ultima_pagina = 1;
                }


                mysqli_stmt_close($stmt);

            }
            break;


        case "tarefas":

            $ultima_pagina = 0;

            if (isset($_GET["ordenar"])) {
                if ($_GET["ordenar"] == "tempoasc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_tempo ASC";
                }
                if ($_GET["ordenar"] == "tempodesc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_tempo DESC";
                }
                if ($_GET["ordenar"] == "precoasc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_dinheiro ASC";
                }
                if ($_GET["ordenar"] == "precodesc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_dinheiro DESC";
                }
                if ($_GET["ordenar"] == "pontosasc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_pontos ASC";
                }
                if ($_GET["ordenar"] == "pontosdesc") {
                    $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas ORDER BY Tarefas_pontos DESC";
                }


            } else {
                $y = "SELECT Tarefas_id	, Tarefas_nome,	Tarefas_tempo,	Tarefas_dinheiro,	Tarefas_pontos,	Imagens_Imagens_id FROM tarefas LIMIT $limit OFFSET $offset";
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

                echo " <div class=\"row justify-content-around text-center m-3 my-4 mt-5\">

                                            <section class='col-1 p-2 listagemdecenas1 text-dark' style='font-weight: bold'><h4 class='mt-2' style='font-weight: bold'>EDITAR</h4></section>
                                            <section class='col-1 p-2 listagemdecenas text-dark'><h4 class='mt-2' style='font-weight: bold'>ELIMINAR</h4></section>                                           
                                            <section class='col-1 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>ID</h4></section>
                                            <section class='col-2 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>NOME</h4></section> 
                                            <section class='col-2 p-2 listagemdecenas'><h4 class='mt-2' style='font-weight: bold'>DINHEIRO</h4></section>
                                            <section class='col-2 listagemdecenas p-2'><h4 class='mt-2' style='font-weight: bold'>TEMPO</h4></section> 
                                            <section class='col-2 p-2 listagemdecenas1'><h4 class='mt-2' style='font-weight: bold'>PONTOS</h4></section>
                                           </div>";

                $x = 0;

                while (mysqli_stmt_fetch($stmt)) {

                    $x++;
                    echo " <div class=\"row justify-content-around text-center m-3 \">

                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='Editar.php?tarefa=" . $id . "' class='text-dark'><i class=\"fas fa-pen\"></i></a></section>
                                            <section class='col-1 p-2 listagemdecenas hoveri text-dark'><a href='scripts/Delete.php?tarefa=" . $id . "' class='text-dark'><i class=\"fas fa-trash\"></i></a></section>                                            <section class='col-1 p-2 listagemdecenas'>" . $id . "</section>
                                            <section class='col-2 listagemdecenas p-2'>" . $nome . "</section> 
                                            <section class='col-2 p-2 listagemdecenas'>" . $dinheiro . "</section>
                                            <section class='col-2 listagemdecenas p-2'>" . $tempo . "</section> 
                                            <section class='col-2 p-2 listagemdecenas'>" . $pontos . "</section>
                                           </div>";
                }


                if ($x < $limit) {
                    $ultima_pagina = 1;
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

include_once "componentes/paginacao.php";

?>
