<?php
$serverName = "SRV-BD-1";
$connectionInfo = array("Database" => "tcc_etim_2019_et", "UID" => "tcc_etim_2019_et", "PWD" => "ry324577", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo);

if ($con) {
	//echo "Conectado";
} else {
	//echo "Falha na conexão";
	echo "<script>alert('Falha na conexão')</script>";
}
