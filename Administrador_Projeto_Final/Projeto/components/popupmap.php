<section class="anime_fade back_totu" id="popup" style="display: none">

    <div class="row justify-content-center justify-content-center align-items-center align-content-center h-100 ">
        <div class="col-10  pt-1 py-5 get_big_2 totu_back">
            <section class="row justify-content-around align-items-center">

                <div class="col-10 text-center" id="content_popup"></div>
            </section>

        </div>
    </div>
</section>


<script>
    function showpopup(id) {

        console.log(id);
        document.getElementById("popup").style.display = "block";
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content_popup").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "scripts/Select_sala.php?sala="+id, true);
        xhttp.send();
    }


</script>