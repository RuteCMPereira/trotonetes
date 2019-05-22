<section class="h-100 w-100 open_animation bg-ligth-lantern position-absolute">
    <div class="row justify-content-center my-auto">
        <div class="col-9">

            <h2 class="text-center my-3">Login</h2>
            <form id="login-form" class="py-2" role="form" action="scripts/user_login.php" method="post">
                <div class="form-group my-3">
                    <label for="inputEmailForm" class="sr-only form-control-label">Username</label>
                    <div class="mx-auto">
                        <input type="text" class="form-control" id="inputEmailForm" name="username"
                               placeholder="username"
                               required="required">
                    </div>
                </div>
                <div class="form-group my-3">
                    <label for="inputPasswordForm" class="sr-only form-control-label">Password</label>
                    <div class="mx-auto">
                        <input type="password" class="form-control" id="inputPasswordForm" name="password"
                               placeholder="password" required="">
                    </div>
                </div>
                <div class="form-group my-3">
                    <div class="mx-auto">
                        <div class="checkbox text-center small">
                            <label class="">
                                <input type="checkbox" class=""> remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto2">
                        <button type="submit" class="btn btn-outline-secondary btn-lg btn-block">Log-in
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto my-3">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-block">Sign-in
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto my-3">
                        <div class="text-center">
                            <a href="components/user_password_recover.php" tabindex="5"
                               class="forgot-password">Forgot Password?</a>
                        </div>
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
        border: solid #0b2e13 4px;
        border-radius: 20px;
        background-color: #0c5460;
        opacity: 0.8;
    }

</style>
