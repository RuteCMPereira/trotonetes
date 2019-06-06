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

                        <div style="clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 100%);border-radius: 40px" class="pt-3 pb-2">

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
<script>
    let scanner = new Instascan.Scanner(
        {
            video: document.getElementById('preview')
        }
    );
    scanner.addListener('scan', function (content) {
        window.location = content;
    });
    Instascan.Camera.getCameras().then(cameras => {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error("Não existe câmera no dispositivo!");
        }
    });
</script>
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