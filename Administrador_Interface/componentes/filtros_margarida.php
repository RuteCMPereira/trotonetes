<?php
//Conexão com o banco:
include("../admin/configdb.php");

//Recupera resultados
$sql="SELECT * FROM imoveis WHERE finalidade LIKE '%" . $busca . "%' OR tipo LIKE '%" . $busca . "%' OR cidade LIKE '%" . $busca . "%' order by valor LIMIT $inicio, $npp";
$res=@mysql_query($sql, $conexao) or die("Erro no MySQL:<br/>" . mysql_errno());

//exibe resultados encontrados no Banco de Dados
while(list($codigo, $tipo, $area, $finalidade, $complemento, $endereço, $bairro, $cidade, $valor, $telefone, $informações, $foto, $lat, $lon)=mysql_fetch_array($res))
{

//MOSTRA OS RESULTADOS DENTRO DESTA TABELA HTML

    echo "
apenas teste de resultados
$tipo - $area<br>
$finalidade<br>
$complemento<br>
$endereço<br>
$bairro<br>
$cidade<br>
$valor<br>
$telefone<br>
$informações";

}

mysql_free_result($res);

?>