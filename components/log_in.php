<div class="col-12 hidden-md-down  position-absolute h-100 bg-gradient-1">
</div>
<section class=" w-100 h-100 open_animation bg-ligth-lantern position-absolute" style="padding: 0!important;">

    <div class="row justify-content-center pt-3">
        <div class="col-4 p-3">
            <img src="images/logo.png" class="img-fluid">
        </div>
        <div class="col-12 p-5">
            <form id="login-form" class="py-2" role="form" action="scripts/user_login.php" method="post">
                <div class="form-group my-2">
                    <label for="inputEmailForm" class="sr-only form-control-label">Username</label>
                    <div class="mx-auto">
                        <input type="text" class="form-control" id="inputEmailForm" name="username"
                               placeholder="Nome de Utilizador"
                               required="required">
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="inputPasswordForm" class="sr-only form-control-label">Password</label>
                    <div class="mx-auto">
                        <input type="password" class="form-control text-dark" id="inputPasswordForm" name="password"
                               placeholder="Password" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto my-2 ">
                        <div class="text-center">
                            <a href="components/user_password_recover.php" tabindex="5"
                               class="forgot-password"><p>Forgot Password?</p></a>
                        </div>
                    </div>
                </div>

                <div class="form-group" >
                    <div class="my-3">
                        <button type="submit" class="btn  btn-block py-1 button-log py-3">LOG-IN
                        </button>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="my-3">
                        <button type="button" class="btn btn-block py-1 button-log py-3">SIGN-IN
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

