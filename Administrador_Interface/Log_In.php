<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>À Noite no Museu - Entrar </title>
    <link rel="stylesheet" type="text/css" href="css/LogIn_Registo.css">
</head>

<body>
<?php include_once "scripts/Redirect_Log_In_Registo.php"?>
<div class="container">
    <div class="main mainentrar">
        <div class="logo text-center">
            <h1 class="p-4"><img src="img/logo.png" height="75px"></h1>
        </div>
        <form action="scripts/Log_In_Check.php" method="post">
            <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            <input type="password" placeholder="Palavra-Passe" name="password" autocomplete="off" required>
            <input type="submit" value="Entrar">
            <h4>Não tens Conta?<a href="Registo.php">Regista-te</a></h4>
        </form>
    </div>
</div>
</body>