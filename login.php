<!DOCTYPE html>
<?php
include("conexao.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrego</title>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.scss">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-15 p-r-15 p-t-25 p-b-10 scroll login-center">
                <span class="login100-form-title p-b-0">
                    Login
                </span>
                <form method="POST" class="login100-form validate-form" action="verificalogin.php">
                    <div class="text-center w-full p-t-25
                     p-b-0">

                    </div>
                    <div class="wrap-input100 m-b-16">
                        <!-- <input class="input100" type="email" name="email" placeholder="Email" id="email"> -->
                        <input class="input100" name="email" placeholder="Email" id="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>
                    <span class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="password" name="senha" placeholder="Senha" id="senha">
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required"><span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>
                    </div>
                </form>
                <div class="text-center w-full p-t-10 p-b-0">
                    <span class="txt1">
                        Não tem uma conta?
                    </span>

                    <a class="txt1 bo1 hov1" href="cadastro.php">
                        Cadastre-se
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>