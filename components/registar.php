<div class="col-12 hidden-md-down  position-absolute h-100 bg-gradient-1">
</div>
<section class=" w-100 h-100 open_animation bg-ligth-lantern position-absolute " style="padding: 0!important;">
    <div class="row justify-content-center pt-3">
        <div class="col-3 p-1 " id="logo_regis">
            <a href="log_in.php"><img src="images/logo.png" class="img-fluid"></a>
        </div>
    </div>

    <div class="row justify-content-center  justify-content-center align-middle align-items-center align-content-center"
         id="form_heigth">
        <div class="col-10">

            <?php

            session_start();
            if (isset($_SESSION['regisu'])) {

                if ($_SESSION['regisu'] == 1) {


                    ?>
                    <div class="row justify-content-center">
                        <div class="col-12 p-3 text-center anime_fade"
                             style="background-color: rgba(56, 20, 39, 1)!important; border-radius: 10px;font-size: 12px ">
                            O Registo foi efectuado com sucesso
                        </div>
                    </div><?php }
                if ($_SESSION['regisu'] == 0) { ?>
                    <div class="row justify-content-center">
                        <div class="col-12 p-3 text-center anime_fade"
                             style="background-color: rgba(56, 20, 39, 1)!important; border-radius: 10px;font-size: 12px ">
                            O Registo não foi efectuado com sucesso, por favor verifique os dados introduzidos.
                        </div>
                    </div><?php

                }
                session_destroy();
            } ?>


            <form id="register-form" class="py-2" role="form" action="scripts/Registo_check.php" method="post">
                <div class="form-group my-2">
                    <input type="text" class="form-control" name="utilizador" placeholder="Nome de Utilizador"
                           required="required">
                </div>
                <div class="form-group my-2">
                    <input type="email" class="form-control" name="email" placeholder="Correio electronico"
                           required="required">

                </div>
                <div class="form-group mt-2">
                    <input type="password" id="password1" class="form-control" name="password" placeholder="Palavra-Passe"
                           required="required" onkeyup="checkPass();checkPassReq()">

                </div>
                <div class="row justify-content-center">
                    <ul class="px-2 col-12 my-1 px-4"
                        style="background-color: rgba(56, 20, 39, 1)!important; border-radius: 10px;font-size: 12px ">
                        <li id="6c" class="pt-1 " style="display: none">&#8594 6 Carácteres;</li>
                        <li id="Mc" class="py-1" style="display: none">&#8594 1 ou + Carácteres Maiúsculos;</li>
                        <li id="Nc" class="pb-1 " style="display: none">&#8594 1 ou + Carácteres Numéricos;</li>
                        <li id="Sc" class="pb-1 " style="display: none">&#8594 1 ou + Carácteres Especiais;</li>

                    </ul>
                </div>
                <div class="form-group mb-2">
                    <input type="password" id="password2" class="form-control" placeholder="Confirmar Palavra-Passe"
                           required="required" onkeyup="checkPass()">

                </div>
                <div class="form-group my-2">
                    <input type="date" class="form-control" name="nascimento" placeholder="Data de Nascimentp"
                           required="required">

                </div>
                <div class="row w-100">
                    <div class="custom-select col-6 pr-1 text-center">

                        <select name="genero">
                            <option value="0">Género :</option>

                            <?php

                            require_once("connections/connection.php"); // We need the function!

                            $link = new_db_connection(); // Create a new DB connection

                            $stmt = mysqli_stmt_init($link); // create a prepared statement

                            $query = "SELECT Géneros_id, Géneros_nome FROM géneros"; // Define the query

                            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                mysqli_stmt_execute($stmt); // Execute the prepared statement

                                mysqli_stmt_bind_result($stmt, $id, $genero); // Bind results

                                while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                    echo "<option value='" . $id . "'>" . $genero . "</option>";
                                }
                                mysqli_stmt_close($stmt); // Close statement
                            }
                            mysqli_close($link); // Close connection


                            ?>

                        </select>
                    </div>
                    <div class="custom-select col-6 pl-1 text-center">

                        <select name="nacionalidade">
                            <option value="0"><b>Nacionalidade :</b></option>

                            <?php

                            require_once("connections/connection.php"); // We need the function!

                            $link = new_db_connection(); // Create a new DB connection

                            $stmt = mysqli_stmt_init($link); // create a prepared statement

                            $query = "SELECT Nacionalidades_id, Nacionalidades_nome FROM nacionalidades"; // Define the query

                            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                mysqli_stmt_execute($stmt); // Execute the prepared statement

                                mysqli_stmt_bind_result($stmt, $id, $nacionalidades); // Bind results

                                while (mysqli_stmt_fetch($stmt)) { // Fetch values
                                    echo "<option value='" . $id . "'>" . $nacionalidades . "</option>";
                                }
                                mysqli_stmt_close($stmt); // Close statement
                            }
                            mysqli_close($link); // Close connection


                            ?>

                        </select>
                    </div>
                </div>

                <input type="number" id="requi" name="passrequi" style="display: none" required="required" value="0">
                <input type="number" id="confir" name="passconfir" style="display: none" required="required" value="0">


                <div class="form-group">
                    <div class="my-3">
                        <button id="hello" class="btn  btn-block button-log py-2">REGISTAR
                        </button>
                    </div>
                </div>


            </form>
        </div>


    </div>
</section>
<div class="row justify-content-center fixed-bottom">
    <div class="col-2">
        <img src="images/lantern.png" class="img-fluid">
    </div>
</div>
