<?php
include("conexao.php");
session_start();
if ((!isset($_SESSION['user']) == true) and (!isset($_SESSION['senha']) == true)
    and (!isset($_SESSION['userid']) == true) and (!isset($_SESSION['usernome']) == true)  and (!isset($_SESSION['usertipo']) == true)
) {
    unset($_SESSION['user']);
    unset($_SESSION['senha']);
    unset($_SESSION['userid']);
    unset($_SESSION['usernome']);
    unset($_SESSION['usertipo']);    
    header('location:login.php');
}
