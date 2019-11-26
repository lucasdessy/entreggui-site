<?php
    include("conexao.php");
 if (isset($_GET['id']) && isset($_GET['status'])) {
     $serv_status = (($_GET['status']) + 1);
     $serv_codigo = $_GET['id'];
    $sql = "update servicos set serv_status = $serv_status where serv_codigo = $serv_codigo";
    $executar = sqlsrv_query($con, $sql);
    header('location:index.php');
 }