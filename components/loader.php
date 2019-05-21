<div class="row justify-content-center">
    <div class="col-12 hidden-md-down  position-absolute h-100 bg-gradient-1">
    </div>
    <div class="col-12 hidden-md-down  position-absolute h-100 open_close_animation bg-ligth-lantern text-center my-auto align-middle pt-5 font-ligth">
        <img src="images/logo_no_shadow.png" height="30%">
        <br>
        <img src="images/MA.png" class="pt-5" height="23%">


    </div>

    <div class="col-12 fixed-bottom text-center">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
        <img src="images/lantern.png" class="position-relative" style="height: 20vh">
    </div>
</div>

<style>
    /*CSS DO LOADER*/

    /* LOADING DOTS*/
    .spinner {
        margin: 100px auto 0;
        width: 70px;
        text-align: center;
    }

    .spinner > div {
        width: 18px;
        height: 18px;
        background-color: #EFD0BC;

        border-radius: 100%;
        display: inline-block;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    }

    .spinner .bounce1 {
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
    }

    .spinner .bounce2 {
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
    }

    @-webkit-keyframes sk-bouncedelay {
        0%, 80%, 100% {
            -webkit-transform: scale(0)
        }
        40% {
            -webkit-transform: scale(1.0)
        }
    }

    @keyframes sk-bouncedelay {
        0%, 80%, 100% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        40% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
        }
    }

    /*LANTERNA ANIMATION*/

    .open_close_animation {

        animation: open_close 7s infinite;
        animation-timing-function: linear;
    }

    @keyframes open_close {

        0% {clip-path: polygon(0 0, 100% 0, 50% 0%, 50% 88%, 50% 0%);}
        5%{clip-path: polygon(0 0, 100% 0, 50% 0%, 50% 88%, 50% 0%);}
        8% {clip-path: polygon(0 0, 100% 0, 100% 0%, 50% 88%, 0 0%);}
        10% {clip-path: polygon(0 0, 100% 0, 100% 60%, 50% 88%, 0 60%);}
        90% {clip-path: polygon(0 0, 100% 0, 100% 60%, 50% 88%, 0 60%);}
        92% {clip-path: polygon(0 0, 100% 0, 100% 0%, 50% 88%, 0 0%);}
        95%{clip-path: polygon(0 0, 100% 0, 50% 0%, 50% 88%, 50% 0%);}
        100% {clip-path: polygon(0 0, 100% 0, 50% 0%, 50% 88%, 50% 0%);}



    }


    /* BACKGROUND COLORS */
    .bg-gradient-1 {

        height: 100%;
        width: 100%;
        background: linear-gradient(0deg, rgba(35, 15, 27, 1) 0%, rgba(56, 20, 39, 1) 27%);

    }


    .bg-ligth-lantern {

        background-color: #542D44;
    }

    /*FIM DO CSS DO LOADER*/
</style>
