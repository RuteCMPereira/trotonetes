<div id="Conteudo">

  <form>
    <input id="Pesquisa" type="search" name="Pesquisar">
    <input id="Buscar" type="submit" name="Enviar" />
    <!-- Código PHP -->
  </form>

  <div id="Produto">
    <!--  Descrição do produto -->
    <!-- Código PHP para exibir Produto após seu registro -->
  </div>

</div>

<!-- Código PHP que realiza a busca no banco e lista o resultado -->

<?php

  if(isset($_POST['Enviar'])){
    $Pesquisar = $_POST['Pesquisar'];

    if($Pesquisar != NULL) {
        $request = mysql_query("SELECT * FROM 'banco'.'tabela' WHERE nome = '$Pesquisar' ");
        
        echo "
        <div id= 'Produto'>
          <!--  Conteúdo  -->
        </div> ";
      }
?>