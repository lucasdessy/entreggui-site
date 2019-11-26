<?php
 if (isset($_GET['id']) && isset($_GET['status'])) {
     $serv_status = (($_GET['status']) + 1);
     $serv_codigo = $_GET['id'];
    $sql = "Update servicos set serv_status = $serv_status where serv_codigo = $serv_codigo";
    echo $sql;
 }