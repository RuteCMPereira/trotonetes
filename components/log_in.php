<div class="col-12 hidden-md-down  position-absolute h-100 bg-gradient-1">
</div>
<section class=" w-100 h-100 open_animation bg-ligth-lantern position-absolute" style="padding: 0!important;">

    <div class="row justify-content-center pt-3">
        <div class="col-4 p-3">
            <img src="images/logo.png" class="img-fluid">
        </div>
    </div>
    <div class="row  justify-content-center align-content-center align-items-center" style="height: 60%!important;">
        <div class="col-9">
            <form id="login-form" class="py-2" role="form" action="scripts/Log_in_Check.php" method="post">
                <div class="form-group my-2">
                        <input type="email" class="form-control" id="inputEmailForm" name="email"
                               placeholder="Correio Eletrônico "
                               required="required">
                </div>
                <div class="form-group my-2">
                        <input type="password" class="form-control text-dark" id="inputPasswordForm" name="password"
                               placeholder="Palavra-Passe" required="">
                </div>
                <div class="form-group">
                    <div class="mx-auto my-2 ">
                        <div class="text-center">
                            <a href="components/user_password_recover.php" tabindex="5"
                               class="forgot-password"><p>Forgot Password?</p></a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="my-3">
                        <button type="submit" class="btn  btn-block py-1 button-log py-2">LOG-IN
                        </button>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="my-3">
                        <a href="registar.php" class=" text-center btn-block py-1 button-log py-2">SIGN-IN
                        </a>
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

