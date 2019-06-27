<body class="h-100 w-100" style="background-color: rgba(56, 20, 39, 1)"></body>

<?php

if (isset($_GET['evento'])) {

    require_once "../connections/connection.php";

    session_start();

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $user = $_SESSION['id_u'];

    $evento = $_GET['evento'];

    $query = "SELECT Eventos_Eventos_id,Utilizadores_Utilizadores_id FROM eventos_has_utilizadores WHERE Eventos_Eventos_id=? AND Utilizadores_Utilizadores_id=?";

    $reserva = 0;

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ii', $evento, $user);


        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $ref_evento, $ref_user);

            while (mysqli_stmt_fetch($stmt)) {

                $reserva = 1;

                $link2 = new_db_connection();

                $stmt2 = mysqli_stmt_init($link2);

                $query2 = "DELETE FROM eventos_has_utilizadores WHERE Eventos_Eventos_id=? AND Utilizadores_Utilizadores_id=?";


                if (mysqli_stmt_prepare($stmt2, $query2)) {

                    mysqli_stmt_bind_param($stmt2, 'ii', $evento, $user);

                    if (mysqli_stmt_execute($stmt2)) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);

                    }
                    mysqli_stmt_close($stmt2);
                    mysqli_close($link2);
                }
            }


            if ($reserva == 0) {

                $verifica = 0;

                $link3 = new_db_connection();

                $stmt3 = mysqli_stmt_init($link3);

                $query3 = "SELECT Eventos_id FROM eventos WHERE  Eventos_id=?";


                if (mysqli_stmt_prepare($stmt3, $query3)) {

                    mysqli_stmt_bind_param($stmt3, 'i', $evento);

                    if (mysqli_stmt_execute($stmt3)) {

                        mysqli_stmt_bind_result($stmt3, $evento_verifica);

                        while (mysqli_stmt_fetch($stmt3)) {

                            $verifica = 1;

                            $link4 = new_db_connection();

                            $stmt4 = mysqli_stmt_init($link4);

                            $query4 = "INSERT INTO eventos_has_utilizadores (Eventos_Eventos_id, Utilizadores_Utilizadores_id) VALUES (?,?)";


                            if (mysqli_stmt_prepare($stmt4, $query4)) {

                                mysqli_stmt_bind_param($stmt4, 'ii', $evento, $user);

                                if (mysqli_stmt_execute($stmt4)) {


                                    $link5 = new_db_connection();

                                    $stmt5 = mysqli_stmt_init($link5);

                                    $email = $_SESSION['email_u'];

                                    $query5 = "SELECT Utilizadores_tour4 FROM utilizadores WHERE Utilizadores_email LIKE ?";

                                    if (mysqli_stmt_prepare($stmt5, $query5)) {



                                        mysqli_stmt_bind_param($stmt5, 's', $email);

                                        if (mysqli_stmt_execute($stmt5)) {

                                            mysqli_stmt_bind_result($stmt5, $tour_4);

                                            if (mysqli_stmt_fetch($stmt5)) {


                                                if ($tour_4 == 0) {

                                                    $_SESSION['tour']=0;

                                                }

                                            }
                                            mysqli_stmt_close($stmt5);
                                            mysqli_close($link5);
                                        }

                                    }



                                }
                                header("Location: " . $_SERVER["HTTP_REFERER"]);
                                mysqli_stmt_close($stmt4);
                                mysqli_close($link4);
                            }

                        }


                        if ($verifica == 0) {
                            header("location:../evento.php");
                        }
                        mysqli_stmt_close($stmt3);
                        mysqli_close($link3);
                    }
                }

            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        }
    }
}
?>
