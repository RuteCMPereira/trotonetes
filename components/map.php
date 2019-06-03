<div class="col-12 hidden-md-down  position-absolute h-100 bg-gradient-1">
</div>
<section class="h-100 w-100 open_animation bg-ligth-lantern position-absolute my-auto">

    <section class="row my-2 justify-content-center">
        <div class="col-10 text-center titulo_contactos">
            <p>MAPA DO MUSEU</p>
        </div>
    </section>
    <div class="tab-content overflow-auto div-w-scroll">
        <section class="row p-0 justify-content-start" id="piso0">

            <img src="images/map.png" height="500" usemap="#image-map" class="map">

            <map name="image-map">
                <area target="" alt="" title="" href="" data-toggle="modal" data-target="#myModal"
                      coords="297,76,215,178" shape="rect">
                <area target="" alt="" title="" href="" coords="652,153,704,257" shape="rect">
            </map>

        </section>
    </div>

</section>
<div class="row justify-content-center fixed-bottom">
    <ul class=" nav nav-tabs col-12 justify-content-center my-3">
        <li><a class="m-2" data-toggle="tab" href="#piso0"><img src="images/piso_0.png" height="40px"
                                                                class=" icon_2"></a></li>
        <li><a class="m-2" data-toggle="tab" href="#piso1"><img src="images/piso_1.png" height="40px"
                                                                class=" icon_2"></a></li>
    </ul>
    <div class="col-2">
        <img src="images/lantern.png" class="img-fluid">
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <section class="row justify-content-center mt-5">
            <div class="modal-content col-10 p-3 popup_style">
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit eu urna sit amet mollis.
                        Vivamus consequat pharetra eleifend. In semper feugiat finibus. In sed nisi aliquam, malesuada
                        nisl ac, dapibus mauris. Vestibulum id ullamcorper augue. Aenean molestie sed sem a
                        efficitur.</p>
                    <div class="text-center">
                    <button type="button" class="mt-4">SABER MAIS</button>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
<style>

    ::-webkit-scrollbar {
        display: none;
    }

    .nav-tabs {
        border-bottom: none;
    }

    .active .icon_2 {

        opacity: 1 !important;
        padding: 0 0 2px 0 !important;


    }

    .icon_2 {

        padding: 5px !important;
        background-color: #EDCEBA;
        border-radius: 50%;
        -webkit-box-shadow: 0px 1px 24px 8px rgba(0, 0, 0, 0.25) !important;
        height: 5vh !important;
        width: 5vh;
        opacity: 0.6;

    }

    .map {

        margin-left: 20vw !important;
        margin-right: 30vw !important;
        margin-bottom: 10vh !important;
    }


    .active .icon {
        opacity: 1;
    }

    .div-w-scroll {

        max-height: 100%;
        overflow: auto !important;
        padding-bottom: 40vh !important;

    }

    .popup_style{

        background-color: #785946;
        color: #230F1B;
        border-radius: 10px;

    }

    .popup_style button{

        border: none;
        padding: 8px!important;
        border-radius: 15px;
        background-color: #230F1B;
        color: #ECCCBA;
    }

</style>
<script>

</script>