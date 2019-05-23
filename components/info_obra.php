<section class="clip-me-div">

    <section class="row  p-0 justify-content-center">
        <div class="col-8 p-2 my-4 text-center text-center" style="border-radius: 15px; background-color: #230f1b;">
            <p class="m-0 " style="color:#efd0bc">NOME DA OBRA</p>

        </div>
    </section>

    <section class="div-w-scroll mx-4">
        <section class="row justify-content-around mb-3">
            <article class="col-8">
                <img class=" border2 img-fluid" src="images/santa_joana.jpg">
                <div class="col-12 text-center justify-content-between">
                <i class="fas fa-reply fa-flip-horizontal coracao py-3 pb-3 px-3 mr-3 position-relative" style="border-radius: 50px"></i>
                <i class="fas fa-heart coracao py-3 pb-3 px-3 ml-3 position-relative" style="border-radius: 50px"></i>
                </div>
            </article>
        </section>

        <div class="m-0 text-wrap text-center" style="color:#efd0bc">
            <p>

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consequat a nibh in sollicitudin.
                Maecenas sit amet consequat nibh. Cras eu diam scelerisque dolor suscipit euismod non ut augue. Vivamus
                laoreet porta urna, sed tempor est bibendum ut. In at vestibulum metus. Proin sed fringilla lacus. Nunc
                porta elit tellus, a blandit odio fringilla sed. Aliquam ornare massa non arcu euismod volutpat. Etiam
                tempor, tellus et molestie rhoncus, libero nunc sollicitudin ipsum, id pulvinar nibh orci nec turpis.
                Aliquam mattis dolor vitae diam fermentum, nec facilisis massa lacinia. Aenean at enim ultrices,
                sagittis orci semper, gravida tellus.

            </p>
        </div>

        <div class="flip-box">
            <div class="flip-box-inner">
                <div class="flip-box-front">
                    <img src="images/santa_joana.jpg">
                </div>
                <div class="flip-box-back">
                    <img src="images/santa_joana.jpg">
                </div>
            </div>
        </div>


    <script>
        function myFunction(DIV) {

            var x = document.getElementById(DIV);


            if (!x.style.display || x.style.display == "none") {
                x.style.display = "block";
                x.style.animation = "animation1 500ms ease-in-out";
            } else {
                x.style.display = "none";

            }


        }
