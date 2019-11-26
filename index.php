<?php
  include("conexao.php");
  include("headscript.php");
  if($_SESSION['usertipo'] == '0'){
    header('Location: indexusuario.php');
  }
  if($_SESSION['usertipo'] == '1'){
    header('Location: indexentregador.php');
  }
