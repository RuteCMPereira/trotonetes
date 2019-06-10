<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>À Noite no Museu - Registo" </title>
    <link rel="stylesheet" type="text/css" href="css/LogIn_Registo.css">
</head>

<div class="container">
    <div class="main mainregisto">
        <div class="logo text-center">
            <h1 class="p-4"><a href="Log_In.php"><img src="img/logo.png" height="75px"></a></h1>
        </div>
        <form action="scripts/Registo_check.php" class="text-center" method="post">
            <input type="text" placeholder="Nome" name="utilizador" autocomplete="off" required>
            <input type="date" placeholder="Data de nascimento" name="nascimento" autocomplete="off" required>
            <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            <input type="password" placeholder="Palavra-Passe" name="password" autocomplete="off" required>



             <div class="custom-select w-75 my-5" >

                <select name="genero">
                    <option value="0">GÉNERO :</option>

                    <?php

                    require_once("connections/connection.php"); // We need the function!

                    $link = new_db_connection(); // Create a new DB connection

                    $stmt = mysqli_stmt_init($link); // create a prepared statement

                    $query = "SELECT Géneros_id, Géneros_nome FROM géneros"; // Define the query

                    if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                        mysqli_stmt_execute($stmt); // Execute the prepared statement

                        mysqli_stmt_bind_result($stmt, $id, $genero); // Bind results

                        while (mysqli_stmt_fetch($stmt)) { // Fetch values
                            echo "<option value='".$id."'>".$genero."</option>";
                        }
                        mysqli_stmt_close($stmt); // Close statement
                    }
                    mysqli_close($link); // Close connection


                    ?>

                </select>
            </div>
            <div class="custom-select w-75 my-5" >

                <select name="nacionalidade" >
                    <option value="0">NACIONALIDADE :</option>

                    <?php

                    require_once("connections/connection.php"); // We need the function!

                    $link = new_db_connection(); // Create a new DB connection

                    $stmt = mysqli_stmt_init($link); // create a prepared statement

                    $query = "SELECT Nacionalidades_id, Nacionalidades_nome FROM nacionalidades"; // Define the query

                    if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                        mysqli_stmt_execute($stmt); // Execute the prepared statement

                        mysqli_stmt_bind_result($stmt, $id, $nacionalidades); // Bind results

                        while (mysqli_stmt_fetch($stmt)) { // Fetch values
                            echo "<option value='".$id."'>".$nacionalidades."</option>";
                        }
                        mysqli_stmt_close($stmt); // Close statement
                    }
                    mysqli_close($link); // Close connection


                    ?>

                </select>
            </div>


            <?php
            session_start();

            if (isset($_SESSION['registo_concluido'])){

                if ($_SESSION['registo_concluido']==1){

                   echo "<div>Executou o registo com sucesso</div>";
                   session_destroy();
                }
                if ($_SESSION['registo_concluido']==0){

                    echo "<div>Não executou o Registo com sucesso</div>";
                    session_destroy();

                }


            }

            ?>


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

