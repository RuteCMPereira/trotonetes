<div class="col-12 hidden-md-down  position-absolute h-100 bg-gradient-1">
</div>
<section class=" w-100 h-100 open_animation bg-ligth-lantern position-absolute ">

    <section class="row my-2 justify-content-center ">
        <div class="col-5 text-center titulo_contactos">
            <p>MAPA</p>
        </div>
    </section>


    <section class="row" style="overflow: scroll;height: 600px">

        <div class="tab-content clearfix">
            <div class="tab-pane active" id="piso0">

                <div class="col-12">

                    <img src="images//piso_0_map_1.png" usemap="#image-map" style=" margin: 5vh 15vh 23vh 12vh!important;">

                    <map name="image-map">
                        <area target="" alt="" title="" onclick="showpopup('1')"  coords="94,87,96,328,6,330,4,91" shape="poly">
                    </map>

                </div>

            </div>
            <div class="tab-pane" id="piso1">
                <div class="col-12">
                    <img width="900" src="images/piso_1_map.png" usemap="#image-map"
                         style=" margin: 5vh 15vh 23vh 12vh!important;">
                </div>

            </div>

        </div>
    </section>
</section>


<ul class="nav nav-pills row justify-content-around fixed-bottom " style="z-index: 10">
    <li class="active col-3">
        <a href="#piso0" class="botao_piso py-2 px-4" data-toggle="tab">PISO 0</a>
    </li>
    <div class="col-2">
        <img src="images/lantern.png" class="img-fluid">
    </div>
    <li class="col-3 ">
        <a href="#piso1" class="botao_piso py-2 px-4" data-toggle="tab">PISO 1 </a>
    </li>
</ul>


<style>

    .botao_piso {

        background-color: #E6CEBB;
        text-decoration: none !important;
        color: black !important;
        border-radius: 10px;
        -webkit-box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.45);
        -moz-box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.45);
        box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.45);
    }


    .botao_piso a {

        text-decoration: none !important;
        color: black !important;
        border-radius: 10px;

    }


</style>

