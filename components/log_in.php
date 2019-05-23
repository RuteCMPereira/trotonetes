<div class="col-12 hidden-md-down  position-absolute h-100 bg-gradient-1">
</div>
<section class="h-100 w-100 open_animation bg-ligth-lantern position-absolute p-t-0 my-auto">
<div class="row justify-content-center my-5 my-auto">
    <div class="col-4">
        <img src="images/logo.png" class="img-fluid">
    </div>
</div>
    <div class="row justify-content-center my-auto">
        <div class="col-9">
            <form id="login-form" class="py-2" role="form" action="scripts/user_login.php" method="post">
                <div class="form-group my-2">
                    <label for="inputEmailForm" class="sr-only form-control-label">Username</label>
                    <div class="mx-auto">
                        <input type="text" class="form-control" id="inputEmailForm" name="username"
                               placeholder="Username"
                               required="required">
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="inputPasswordForm" class="sr-only form-control-label">Password</label>
                    <div class="mx-auto">
                        <input type="password" class="form-control" id="inputPasswordForm" name="password"
                               placeholder="Password" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto my-2">
                        <div class="text-center">
                            <a href="components/user_password_recover.php" tabindex="5"
                               class="forgot-password">Forgot Password?</a>
                        </div>
                    </div>
                </div>

                <div class="form-group" >
                    <div class="mx-auto  my-2 col-5 mt-4 ">
                        <button type="submit" class="btn  btn-block py-1 button-log">LOG-IN
                        </button>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="mx-auto my-2 col-5">
                        <button type="button" class="btn btn-block py-1 button-log">SIGN-IN
                        </button>
                    </div>
                </div>

            </form>
        </div>


    </div>
</section>
<div class="row justify-content-center fixed-bottom">
    <div class="col-3">
        <img src="images/lantern.png" class="img-fluid">
    </div>
</div>
<style>

    .card {
        background-color: none !important;
    }
    .form-control{
        padding: 25px 0px 25px 15px!important;
        border: solid #E6CEBB 4px;
        border-radius: 20px;
        background-color: #0c5460;
        opacity: 0.8;
    }

    .button-log{

        border-radius: 10px;
        background-color: #E6CEBB;
        color:  rgba(56, 20, 39, 1) ;
    }



</style>
