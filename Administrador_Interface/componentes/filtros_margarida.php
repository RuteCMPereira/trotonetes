<?php

include_once "../connections/connection.php";

//////////////////////CONQUISTAS//////////////////////////////////////////////
$sql_conquistas = "SELECT Conquistas_id, Conquistas_nome, Conquistas_descrição, Conquistas_pontos FROM conquistas ORDER BY Conquistas_pontos ASC";
$sql_conquistas2 = "SELECT Conquistas_id, Conquistas_nome, Conquistas_descrição, Conquistas_pontos FROM conquistas ORDER BY Conquistas_pontos DESC";

//$pega_conquista = mysqli_query($connection, $sql_disciplina);

////////////////////////////////////////EVENTOS/////////////////////////////////
$sql_eventos = "SELECT Eventos_id, Eventos_nome, Eventos_data_inicio, Eventos_data_fim, Eventos_descrição_curta, Eventos_descrição_longa FROM eventos ORDER BY Eventos_data_inicio ASC";
//$pega_banca = mysqli_query($connection, $sql_banca);

////////////////////////////////////////ITENS/////////////////////////////////
$sql_itens = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens ORDER BY Itens_preço ASC";
$sql_itens2 = "SELECT Itens_id, Itens_nome, Itens_preço, Itens_venda, Itens_descrição, Itens_ref_3D, Tipos_Tipos_id FROM itens ORDER BY Itens_preço DESC";

//$pega_instituicao = mysqli_query($connection, $sql_instituicao);

////////////////////////////////////////LANTERNAS/////////////////////////////////
$sql_lanternas = "SELECT Lanternas_id, Lanternas_nome, Lanternas_ref_3D, Lanternas_descrição, Lanternas_cor, Lanternas_raio, Lanternas_intensidade FROM lanternas ORDER BY Lanternas_intensidade ASC";
$sql_lanternas2 = "SELECT Lanternas_id, Lanternas_nome, Lanternas_ref_3D, Lanternas_descrição, Lanternas_cor, Lanternas_raio, Lanternas_intensidade FROM lanternas ORDER BY Lanternas_intensidade DESC";

//$pega_cargo = mysqli_query($connection, $sql_cargo);

////////////////////////////////////////OBRAS////////////////////////////////////
$sql_obras = "SELECT Obras_id, Obras_nome, Obras_descrição, Obras_data FROM obras ORDER BY Obras_data ASC";
$sql_obras2 = "SELECT Obras_id, Obras_nome, Obras_descrição, Obras_data FROM obras ORDER BY Obras_data DESC";
//$pega_ano = mysqli_query($connection, $sql_ano);

//////////////////////SALAS//////////////////////////////////////////////
$sql_salas = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas ORDER BY Salas_piso ASC";
$sql_salas2 = "SELECT Salas_id, Salas_nome, Salas_descrição, Salas_posição_jogo, Salas_posição_mapa, Salas_piso FROM salas ORDER BY Salas_piso DESC";

//$pega_nivel = mysqli_query($connection, $sql_nivel);

//////////////////////TAREFAS//////////////////////////////////////////////
$sql_tarefas = "SELECT Tarefas_id, Tarefas_nome, Tarefas_tempo, Tarefas_dinheiro, Tarefas_pontos FROM tarefas ORDER BY Tarefas_tempo ASC";
$sql_tarefas2 = "SELECT Tarefas_id, Tarefas_nome, Tarefas_tempo, Tarefas_dinheiro, Tarefas_pontos FROM tarefas ORDER BY Tarefas_dinheiro ASC";
$sql_tarefas3 = "SELECT Tarefas_id, Tarefas_nome, Tarefas_tempo, Tarefas_dinheiro, Tarefas_pontos FROM tarefas ORDER BY Tarefas_pontos ASC";
$sql_tarefas4 = "SELECT Tarefas_id, Tarefas_nome, Tarefas_tempo, Tarefas_dinheiro, Tarefas_pontos FROM tarefas ORDER BY Tarefas_tempo DESC";
$sql_tarefas5 = "SELECT Tarefas_id, Tarefas_nome, Tarefas_tempo, Tarefas_dinheiro, Tarefas_pontos FROM tarefas ORDER BY Tarefas_dinheiro DESC";
$sql_tarefas6 = "SELECT Tarefas_id, Tarefas_nome, Tarefas_tempo, Tarefas_dinheiro, Tarefas_pontos FROM tarefas ORDER BY Tarefas_pontos DESC";

//$pega_nivel = mysqli_query($connection, $sql_nivel);

//////////////////////UTILIZADORES//////////////////////////////////////////////
$sql_utilizadores = "SELECT Utilizadores_id, Utilizadores_nome, Utilizadores_pass_hash, Utilizadores_email, Utilizadores_checkpoints, Nacionalidades_id, Géneros_id, Perfis_id, Tarefas_Tarefas_id, Utilizadores_data_nascimento FROM utilizadores WHERE Perfis_id = ?";

//$pega_nivel = mysqli_query($connection, $sql_nivel);




////////////////////////////////TRAZ AS QUESTÕES DE ACORDO COM O CRITÉRIO/////
if (!empty($_POST['bt_enviar'])) {
    $disciplina = (empty($_POST['Disciplina'])) ? 'null' : $_POST['Disciplina'];
    $banca = (empty($_POST['Banca'])) ? 'null' : $_POST['Banca'];
    $instituicao = (empty($_POST['Instituicao'])) ? 'null' : $_POST['Instituicao'];
    $cargo = (empty($_POST['Cargo'])) ? 'null' : $_POST['Cargo'];
    $ano = (empty($_POST['Ano'])) ? 'null' : $_POST['Ano'];
    $nivel = (empty($_POST['Nivel'])) ? 'null' : $_POST['Nivel'];
    $sql_questao = "SELECT * FROM tabela_questao WHERE ( id_disciplina = $disciplina OR $disciplina = 0) AND (id_banca = $banca OR $banca = 0) AND (id_ano = $ano OR $ano = 0) AND (id_nivel = $nivel OR $nivel = 0) AND (id_instituicao = $instituicao OR $instituicao = 0) AND (id_cargo = $cargo OR $cargo = 0)";
    $seleciona_questao = mysqli_query($connection, $sql_questao);
}
?>

