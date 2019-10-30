<?php
include("conexao.php");
if (isset($_POST['login'])) {
    session_start();
    $user = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select user_codigo from USUARIOS where user_email = '$user' and user_senha = '$senha'";
    $logar = sqlsrv_query($con, $sql);
    $userid = implode("", sqlsrv_fetch_array($logar, SQLSRV_FETCH_ASSOC));



    $sql = "select user_nome from USUARIOS where user_codigo = '$userid'";
    $executarusernome = sqlsrv_query($con, $sql);
    $usernome = implode("", sqlsrv_fetch_array($executarusernome, SQLSRV_FETCH_ASSOC));


    if ($userid != '') {
        header('location:index.php');
        $_SESSION['user'] = $user;
        $_SESSION['senha'] = $senha;
        $_SESSION['userid'] = $userid;
        $_SESSION['usernome'] = $usernome;
    } else {
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        unset($_SESSION['userid']);
        unset($_SESSION['usernome']);
        echo '
        <script>
            alert("Usuário/Senha errados!");   
            window.location = "login.php";
        </script>';
    }
}
