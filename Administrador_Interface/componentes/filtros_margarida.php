<?php

include_once "../connections/connection.php";

//////////////////////DISCIPLINAS//////////////////////////////////////////////
$sql_disciplina = "SELECT * FROM tabela_disciplina ORDER BY Disciplina ASC";
$pega_disciplina = mysqli_query($connection, $sql_disciplina);

////////////////////////////////////////BANCAS/////////////////////////////////
$sql_banca="SELECT * FROM tabela_banca ORDER BY Banca ASC";
$pega_banca = mysqli_query($connection,$sql_banca);

////////////////////////////////////////INSTITUIÇÃO/////////////////////////////////
$sql_instituicao="SELECT * FROM tabela_instituicao ORDER BY Instituicao ASC";
$pega_instituicao = mysqli_query($connection,$sql_instituicao);

////////////////////////////////////////CARGO/////////////////////////////////
$sql_cargo="SELECT * FROM tabela_cargo ORDER BY Cargo ASC";
$pega_cargo = mysqli_query($connection,$sql_cargo);

////////////////////////////////////////ANO////////////////////////////////////
$sql_ano="SELECT * FROM tabela_ano ORDER BY Ano ASC";
$pega_ano = mysqli_query($connection,$sql_ano);

//////////////////////NÍVEL//////////////////////////////////////////////
$sql_nivel = "SELECT * FROM tabela_nivel ORDER BY id_nivel ASC";
$pega_nivel = mysqli_query($connection, $sql_nivel);

////////////////////////////////TRAZ AS QUESTÕES DE ACORDO COM O CRITÉRIO/////
if(!empty($_POST['bt_enviar']))
{
    $disciplina = (empty($_POST['Disciplina']))? 'null' : $_POST['Disciplina'];
    $banca = (empty($_POST['Banca']))? 'null': $_POST['Banca'];
    $instituicao = (empty($_POST['Instituicao']))? 'null' : $_POST['Instituicao'];
    $cargo = (empty($_POST['Cargo']))? 'null': $_POST['Cargo'];
    $ano = (empty($_POST['Ano']))? 'null': $_POST['Ano'];
    $nivel = (empty($_POST['Nivel']))? 'null': $_POST['Nivel'];
    $sql_questao="SELECT * FROM tabela_questao WHERE ( id_disciplina = $disciplina OR $disciplina = 0) AND (id_banca = $banca OR $banca = 0) AND (id_ano = $ano OR $ano = 0) AND (id_nivel = $nivel OR $nivel = 0) AND (id_instituicao = $instituicao OR $instituicao = 0) AND (id_cargo = $cargo OR $cargo = 0)";
    $seleciona_questao = mysqli_query($connection,$sql_questao);
}
?>

