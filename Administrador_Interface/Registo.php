<head>
    <link rel="stylesheet" type="text/css" href="LogInRegisto.css">
</head>

<div class="container">
    <div class="main mainregisto">
        <div class="logo text-center">
            <h1 class="p-4"><a href="Log_IN.php"><img src="img/logo.png" height="75px"></a></h1>
        </div>
        <form action="something.php" class="text-center" method="post">
            <input type="text" placeholder="Nome" name="utilizador" autocomplete="off" required>
            <input type="date" placeholder="Data de nascimento" name="nascimento" autocomplete="off" required>
            <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            <input type="password" placeholder="Palavra-Passe" name="password" autocomplete="off" required>

             <div class="custom-select w-75 my-5" >

                <select name="genero">
                    <option value="0">GÉNERO :</option>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                    <option value="3">Outros</option>
                </select>
            </div>
            <div class="custom-select w-75 my-5" >

                <select name="nacionalidade">
                    <option value="0">NACIONALIDADE :</option>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                    <option value="3">Outros</option>
                </select>
            </div>


            <input type="submit" value="Criar Conta">
        </form>
    </div>
</div>


<style>
    /* The container must be positioned relative: */
    .custom-select {
        position: relative;
        font-family: Arial;
        width: 65%;
        left: 70px;
    }

    .custom-select select {
        display: none; /*hide original SELECT element: */
    }

    .select-selected {
        background-color: #381427;
        margin: 30px 0;
        border-radius: 10px!important;
        color: white!important;
        font-size: 12px;
        padding: 14px!important;


    }
    .select-selected:hover {
        font-weight: bold;
        transform: scale(1.05);
        box-shadow: 0 0 10px #381427;
    }

    /* Style the arrow inside the select element: */
    .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;

    }

    /* Point the arrow upwards when the select box is open (active): */
    .select-selected.select-arrow-active:after {
        border-color: transparent transparent #fff transparent;
        top: 7px;
    }

    /* style the items (options), including the selected item: */
    .select-items div,.select-selected {
        color: #381427;
        padding: 8px 16px;
        cursor: pointer;
        border-radius: 13px;
    }

    /* Style items (options): */
    .select-items {
        position: absolute;
        background-color: White;
        top: 95%;
        left: 0;
        right: 0;
        z-index: 99;
    }

    /* Hide the items when the select box is closed: */
    .select-hide {
        display: none;
    }

    .select-items div:hover, .same-as-selected {
        color: #381427;
        box-shadow: 0 0 10px #381427;
    }
</style>

<script>
    var x, i, j, selElmnt, a, b, c;
    /* Look for any elements with the class "custom-select": */
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /* For each option in the original select element,
            create a new DIV that will act as an option item: */
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /* When an item is clicked, update the original select box,
                and the selected item: */
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /* When the select box is clicked, close any other select boxes,
            and open/close the current select box: */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /* If the user clicks anywhere outside the select box,
    then close all select boxes: */
    document.addEventListener("click", closeAllSelect);
</script>

