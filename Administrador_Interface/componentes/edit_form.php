<form action="#" autocomplete="off" method="post" enctype="multipart/form-data" class="forminho">
    <fieldset class="mb-4">
        <input id="first" type="text" name="first" class="inputform" required>
        <label for="first">Nome Vestuário</label>
        <div class="after"></div>
    </fieldset>

    <select id="last" name="last" class=" mb-4 drop" required>
        <option value="" disabled selected hidden>Tipo Vestuário</option>
        <option for="last" class="escolha">Camisola</option>
        <option for="last" class="escolha">Calças</option>
        <option for="last" class="escolha">Calçado</option>
    </select>

    <fieldset class=" ">
        <label for="first">Preço</label><br>
        Sim <input id="first" type="radio" name="first" value="Sim" class="mr-4" required>
        Não <input id="first" type="radio" name="first" value="Não" required>

    </fieldset>

    <fieldset class="mb-4">
        <input id="last" type="text" name="last" class="inputform" required>
        <label for="last">Rerefência Vestuário</label>
        <div class="after"></div>
    </fieldset>

    <fieldset class="mb-4">
        <input type="file" name="fileToUpload" id="fileToUpload">
    </fieldset>


    <fieldset>
        <button>Cancelar</button>
        <button>Concluir Edição</button>
    </fieldset>

    <fieldset>

    </fieldset>
</form>
