<section class="clip-me-div">

    <section class="row  p-0 justify-content-center ">
        <div class="col-6 titulo_contactos p-2 my-4 text-center text-center" style="border-radius: 15px">
            <p class="m-0 ">CONTACTOS</p>

        </div>


    </section>


    <section class="row p-0 justify-content-start overflow-auto" style="max-height: 120%;">

        <div class="col-10 info_contactos p-2 justify-content-between d-flex mt-3 " style="border-radius: 0px 50px 50px 0px">
            <p class="m-0 pl-3">Número Telefone</p>
            <a onclick="myFunction('info1') " id="toggle_plus">
                <i class="fas fa-plus circulo p-2" style="border-radius: 50px"></i>
            </a>
        </div>
        <div class="col-9 contacto_baixo p-2 justify-content-between begin" id="info1" style="border-radius: 0px 0 20px 0px">
            <p class="m-0 pl-3">234776145</p>
        </div>
        <div class="col-10 info_contactos p-2 justify-content-between d-flex mt-3 " style="border-radius: 0px 50px 50px 0px">
            <p class="m-0 pl-3">Correio Eletrónico</p>
            <a onclick="myFunction('info2')">
                <i class="fas fa-plus circulo  p-2" style="border-radius: 50px"></i>
            </a>
        </div>
        <div class="col-9 contacto_baixo p-2 justify-content-between begin" id="info2" style="border-radius: 0px 0 20px 0px">
            <p class="m-0 pl-3">234776145</p>
        </div>
        <div class="col-10 info_contactos p-2 justify-content-between d-flex mt-3 " style="border-radius: 0px 50px 50px 0px">
            <p class="m-0 pl-3">Morada</p>
            <a onclick="myFunction('info3')">
                <i class="fas fa-plus circulo p-2" style="border-radius: 50px"></i>
            </a>
        </div>
        <div class="col-9 contacto_baixo p-2 justify-content-between begin" id="info3" style="border-radius: 0px 0 20px 0px">
            <p class="m-0 pl-3">234776145</p>
        </div>


    </section>


</section>
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
</script>