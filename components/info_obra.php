<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<section class="row justify-content-center">
    <div CLASS="col-10 text-center p-2 titulo_jogo">
        <p>NOME DA OBRA</p>
    </div>
</section>
<section class=" w-100 h-100 position-absolute div-content-jogo pt-4 ">
    <section class="justify-content-around div-w-scroll-3 div-content-jogo mx-3">
        <section class="row  justify-content-center position-relative">

            <section class="container_flip_card">
                <div class="card">
                    <div class="front"><img class=" border_2 img-fluid" id="press_obra" src="images/santa_joana.jpg">
                    </div>
                    <div class="back border_2 text-center">

                        <div style="clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 100%);border-radius: 40px"
                             class="pt-3 pb-2">

                            <video id="preview" class="position-relative" style="height: 95%;"></video>
                        </div>
                    </div>
                </div>
            </section>

        </section>
        <section class="row justify-content-center  position-relative " style="top: -3vh;">

            <div class="col-3  text-center ">
                <button onclick="flip()">
                    <a> <img src="images/scan.png" class="circulo2" height="60"></a>
                </button>
            </div>

            <form role="form" class="col-3 text-center" action="scripts/check_like.php" method="post">
                <div class="form-group mx-auto">

                    <button type="submit" class="btn">
                        <a> <img src="images/heart_icon.png" class="circulo2" height="60"></a>
                    </button>

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
        <div class="row justify-content-center my-auto px-4 py-2">

            <div class="col-3 align-middle my-auto">
                <img src="images/John-thumbnail.png" class="img-fluid" style="border-radius: 15px">
            </div>
            <div class="col-9 p-1 my-auto align-middle text-center">
                <b>
                    NOME DO AUTOR
                </b>
            </div>
        </div>

        <div class="col-12 px-4 anime_fade pb-3">
            <p>

                O Museu de Aveiro está instalado desde 1911 no antigo Convento de Jesus da Ordem Dominicana feminina.
                Este convento, um dos mais antigos de Aveiro, remonta à segunda metade do século XV, fundado por D.
                Brites Leitão e por D. Mecia Pereira.

            </p>
        </div>


        </div>

    </section>
</section>
<script>

    function flip() {
        $('.card').toggleClass('flipped');
    }

</script>
<script>

    var item = document.querySelector("#press_obra");
    var timerID;
    var counter = 0;
    var pressHoldEvent = new CustomEvent("pressHold");
    var pressHoldDuration = 80;
    item.addEventListener("mousedown", pressingDown, false);
    item.addEventListener("mouseup", notPressingDown, false);
    item.addEventListener("mouseleave", notPressingDown, false);
    item.addEventListener("touchstart", pressingDown, false);
    item.addEventListener("touchend", notPressingDown, false);
    item.addEventListener("pressHold", doSomething, false);

    function pressingDown(e) {

        requestAnimationFrame(timer);
        e.preventDefault();

    }

    function notPressingDown(e) {

        document.getElementById("full_obra").style.display = "none";
        cancelAnimationFrame(timerID);
        counter = 0;

    }

    function timer() {

        if (counter > 5) {
            document.getElementById("full_obra").style.display = "block";
        }
        if (counter < pressHoldDuration) {
            timerID = requestAnimationFrame(timer);
            counter++;
        } else {
            item.dispatchEvent(pressHoldEvent);
        }
    }

</script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
    scanner.addListener('scan', function (content) {

        window.location.href = content;

    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);

        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
</script>