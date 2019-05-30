<!--Ir buscar a informação sobre a obra que é passada apartir do metodo post, o post das-nos a conhecer o id da obra em questao, este post é proveniente
da página das obras que redireciona para esta pagina, não esquecer das opções onde o id não existe (OBRA NAO ECONTRADA) e o post esta icorreto (PAGINA NÃO ENCONTRADA)-->
<div class="row w-100 h-100 position-absolute align-middle  my-auto" id="full_obra" style="background-color: rgba(0, 0, 0, 0.65); z-index: 3">
    <section class="col-11 mt-5 pt-5 mx-auto ">
        <img src="images/museu.jpg" class="img-fluid border_2 my-auto align-middle">
        <div class="text-center">Nome da Imagem</div>
    </section>
</div>
<section class="clip-me-div">

    <section class="row my-2 justify-content-center">
        <div class="col-8 text-center titulo_contactos">
            <p>NOME DA OBRA</p>
        </div>
    </section>

    <section class="div-w-scroll">

        <section class="row  justify-content-center position-relative">
            <section class="container">
                <div class="card" id="press_obra">
                    <div class="front"><img class=" border_2 img-fluid" src="images/santa_joana.jpg"></div>
                    <div class="back bg-light border_2">
                        <div class="border_3"></div>
                    </div>
                </div>
            </section>
        </section>
        <section class="row justify-content-center  position-relative " style="top: -5vh;">
            <div class="col-3  text-center ">
                <button onclick="flip()">
                    <i class="fas fa-reply fa-flip-horizontal coracao position-relative"></i>
                </button>

            </div>

            <form role="form" class="col-3 text-center" action="scripts/check_like.php" method="post">
                <!--Esta action vai para um script que verifica o estado da relação se existir passa a nao existir e vice-versa, no final redireciona para esta pagina que se adpata consoante a relação, ou a falta dela.-->
                <div class="form-group">
                    <div class="mx-auto">
                        <button type="submit" class="btn  button-log">
                            <!--Verificação se a obra foi gostada pelo utilizador, se existe uma relação entre a obra e o utilizador (as classes unliked_obra e liked_obra vão ser utilizados consoante o resultado de esta verificação)-->
                            <i class="fas fa-heart coracao position-relative unliked_obra"
                               id="heart_button"></i>
                        </button>
                    </div>
                </div>
            </form>


        </section>
        <div class="row justify-content-center">
            <div class="col-10">
                <p>

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consequat a nibh in
                    sollicitudin.
                    Maecenas sit amet consequat nibh. Cras eu diam scelerisque dolor suscipit euismod non ut augue.
                    Vivamus
                    laoreet porta urna, sed tempor est bibendum ut. In at vestibulum metus. Proin sed fringilla
                    lacus.
                    Nunc
                    porta elit tellus, a blandit odio fringilla sed. Aliquam ornare massa non arcu euismod volutpat.
                    Etiam
                    tempor, tellus et molestie rhoncus, libero nunc sollicitudin ipsum, id pulvinar nibh orci nec
                    turpis.
                    Aliquam mattis dolor vitae diam fermentum, nec facilisis massa lacinia. Aenean at enim ultrices,
                    sagittis orci semper, gravida tellus.

                </p>
            </div>

        </div>
        <div class="row justify-content-center my-auto">

            <div class="col-3 align-middle my-auto p-2">
                <img src="images/John-thumbnail.png" class="img-fluid" style="border-radius: 15px">

            </div>
            <div class="col-7 p-1 my-auto align-middle">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consequat a nibh in
                    sollicitudin.
                </p>
            </div>


        </div>


    </section>

</section>


<style>
    .container {
        width: 206px;
        height: 300px;
        position: relative;
        -webkit-perspective: 800px;
        -moz-perspective: 800px;
        -o-perspective: 800px;
        perspective: 800px;
    }

    .card {
        background-color: transparent;
        width: 100%;
        height: 100%;
        position: absolute;
        -webkit-transition: -webkit-transform 1s;
        -moz-transition: -moz-transform 1s;
        -o-transition: -o-transform 1s;
        transition: transform 1s;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -o-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform-origin: 50% 50%;
    }

    .card div {
        display: block;
        height: 100%;
        width: 100%;
        line-height: 260px;
        text-align: center;
        font-weight: bold;
        font-size: 140px;
        position: absolute;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .card .back {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    .card.flipped {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    button {
        background-color: transparent;
        border: none;
    }

    .liked_obra {

        color: white;
    }

    .unliked_obra {

        color: black;
    }

    #full_obra {

        display: none;
    }

</style>
<script>

    function flip() {
        $('.card').toggleClass('flipped');
    }

</script>
<script>
    // The item (or items) to press and hold on
    var item = document.querySelector("#press_obra");

    var timerID;
    var counter = 0;

    var pressHoldEvent = new CustomEvent("pressHold");

    // Increase or decreae value to adjust how long
    // one should keep pressing down before the pressHold
    // event fires
    var pressHoldDuration = 50;

    // Listening for the mouse and touch events
    item.addEventListener("mousedown", pressingDown, false);
    item.addEventListener("mouseup", notPressingDown, false);
    item.addEventListener("mouseleave", notPressingDown, false);

    item.addEventListener("touchstart", pressingDown, false);
    item.addEventListener("touchend", notPressingDown, false);

    // Listening for our custom pressHold event
    item.addEventListener("pressHold", doSomething, false);

    function pressingDown(e) {
        document.getElementById("full_obra").style.display = "block";
        requestAnimationFrame(timer);

        e.preventDefault();

        console.log("Pressing!");

    }

    function notPressingDown(e) {
        document.getElementById("full_obra").style.display = "none";
        cancelAnimationFrame(timerID);
        counter = 0;

        console.log("Not pressing!");
    }

    //
    // Runs at 60fps when you are pressing down
    //
    function timer() {
        console.log("Timer tick!");

        if (counter < pressHoldDuration) {
            timerID = requestAnimationFrame(timer);
            counter++;
        } else {
            console.log("Press threshold reached!");
            item.dispatchEvent(pressHoldEvent);
        }
    }

    function doSomething(e) {
        console.log("pressHold event fired!");
    }

</script>
