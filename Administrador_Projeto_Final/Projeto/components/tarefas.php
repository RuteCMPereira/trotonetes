<section class="row justify-content-center mt-5">
    <div class="col-7 text-center pl-3 ">
        <p class="conquista_titulo">TAREFAS</p>
    </div>
</section>

<section style="height: 100vh;background-color: #230f1b;position: relative;" class="pt-1">
    
    <section class="row p-3 tarefa justify-content-around align-content-center align-items-center m-3" style="border-radius: 20px">
        <div class="col-5 ">
            <img src="images/museu-outside.jpg" class="img-fluid">
        </div>
        <div class="col-7 p-2">
            <section class="row">
                <div class="col-12">VERIFICAR AS ENTRADAS DO MUSEU</div>
            </section>
            <section class="row my-1 align-content-center align-items-center">
                <div class="col-1"> <img src="images/clock.png" class="img-fluid"></div>
                <div class="col-6 pl-2">5 MINUTOS</div>
            </section>
            <section class="row my-1">
                <div class="col-1"> <img src="images/point_icon.png" class="img-fluid"></div>
                <div class="col-4 pl-2">500</div>
                <div class="col-2"> <img src="images/money_MA.png" class="img-fluid"></div>
                <div class="col-4 pl-2">500</div>
            </section>
        </div>
            <form role="form" class="col-5 p-1" action="scripts/check_like.php" method="post">
                <button type="submit" class="butoon_2 w-100 h-100">
                    <p>COMEÇAR</p>
                </button>
            </form>
            <form role="form" class="col-5 p-1" action="scripts/check_like.php" method="post">
                <button type="submit" class="butoon_2 w-100 h-100">
                    <p>PARAR</p>
                </button>
            </form>
    </section>


</section>



<style>

    .tarefa{

        color: rgba(56, 20, 39, 1);
        background-color: #E6CEBB!important;
    font-weight: bold;
    }

</style>