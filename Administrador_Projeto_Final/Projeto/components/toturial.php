<section class="row justify-content-center align-items-center align-content-center anime_fade back_totu" id="toturial">

    <div class="col-10  pt-1 py-5 get_big_2 totu_back">
        <section class="row justify-content-around align-items-center">

            <div class="col-10 text-center" id="content_toturial"></div>
        </section>
        <section class="row justify-content-around align-items-center pt-4">
            <div class="col-2 p-2" id="back_button">
                <img class="img-fluid icon_2" src="images/back_icon.png">
            </div>
            <div class="col-2 p-2" id="front_button">
                <img id="cool" class="img-fluid icon_2 front_button_totu" src="images/back_icon.png">
            </div>
        </section>
    </div>



</section>

<script>

    window.onload = function () {

        console.log(tour);

        /*
                ESTADO INICIAL
        */

        var content = 0;

        if (content == 0) {

            document.getElementById("back_button").style.opacity = "0.3";
            document.getElementById("content_toturial").innerHTML = inner[0];

        }


        /*
                 CARREGAR NO BOTÃOD DE AVANÇAR
         */


        document.getElementById("front_button").onclick = function () {


            if (content <= inner.length) {

                content++;
                document.getElementById("back_button").style.opacity = "1";


                if (content == inner.length) {

                    mudardados();
                    document.getElementById("toturial").classList.add("anime_fade_out");
                    setTimeout(function () {
                        document.getElementById("toturial").style.display = "none";
                    }, 800)

                } else {
                    document.getElementById("content_toturial").innerHTML = inner[content];

                }

            }


        };

        /*
                CARREGAR NO BOTÃOD DE RECUAR
        */

        document.getElementById("back_button").onclick = function () {


            if (content > 0) {

                content--;

                document.getElementById("content_toturial").innerHTML = inner[content];
                document.getElementById("front_button").style.opacity = "1";


            }
            if (content == 0) {

                document.getElementById("back_button").style.opacity = "0.3";
            }

        };

        /*
                 MUDAR INFORMAÇÃO NA BASE DE DADOS
         */


        function mudardados() {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content_toturial").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "scripts/tour_check.php?num_tour=" + tour, true);
            xhttp.send();
        }

    }

</script>