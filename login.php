<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <?php require 'assets/partials/meta-includes.html'; ?>
    <title>Login | Big Data UAB</title>
    <?php require 'assets/partials/css-includes.html'; ?>
</head>
<body class="animsition page-login-v3 layout-full">
<?php require 'assets/partials/IE-check.html'; ?>
<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="panel">
            <div class="panel-body">
                <div class="brand">
                    <img class="brand-img" src="/assets/images/UAB-logo.png" style="width: 100%" alt="UAB Research Coder">
                </div>
                <form action="#" onsubmit="return login()">
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="email" class="form-control" name="email" id="emailInput"/>
                        <label class="floating-label">Email</label>
                    </div>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="password" class="form-control" name="password" id="passwordInput"
                        />
                        <label class="floating-label">Password</label>
                    </div>
                    <div class="form-group clearfix">
                        <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                            <input type="checkbox" id="inputCheckbox" name="remember">
                            <label for="inputCheckbox">Remember me</label>
                        </div>
                        <a class="float-right" href="/forgot-password.php">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
                </form>
                <p>Still no account? Please go to <a href="/register.php">Sign up</a></p>
            </div>
        </div>
    </div>
</div>
<?php require 'assets/partials/footer.html'; ?>
<!-- End Page -->
<?php require 'assets/partials/js-includes.html'; ?>
<script src="/assets/examples/js/login.js"></script>
</body>
</html>