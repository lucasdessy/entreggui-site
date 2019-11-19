<!DOCTYPE html>

<head>
  <?php
  include("headscript.php");
  $logadouser = $_SESSION['user'];
  $logadonome = $_SESSION['usernome'];
  $logadoID = $_SESSION['userid'];
  ?>
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
          <?php
          echo "Bem vido $logadonome";
          ?>
          <div class="text-center w-full p-t-10 p-b-0">
            <?php
            $serverName = "SRV-BD-1";
            $connectionInfo = array("Database" => "tcc_etim_2019_et", "UID" => "tcc_etim_2019_et", "PWD" => "ry324577", "CharacterSet" => "UTF-8");
            // Create connection
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            // Check connection
            if (!$conn) {
              die("Connection failed: " . sqlsrv_connect_error());
            }

            $sql = "select * from Usuarios inner join SERVICOS on USUARIOS.user_codigo = SERVICOS.user_codigo_contratante where user_codigo_contratante = $logadoID";
            $result = sqlsrv_query($conn, $sql);

            if (sqlsrv_num_rows($result) > 0) {
              // output data of each row
              while ($row = sqlsrv_fetch_assoc($result)) {
                echo "id: " . $row[""] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
              }
            } else {
              echo "0 results";
            }

            sqlsrv_close($conn);
            ?>
            ?>
            <br>
            <a class="txt1 bo1 hov1" href="sairsessao.php">
              Sair da sessão
            </a>
          </div>
      </div>
    </div>
  </div>
</body>