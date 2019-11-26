<!DOCTYPE html>

<head>
  <?php
  include("headscript.php");
  include("conexao.php");
  $logadouser = $_SESSION['user'];
  $logadonome = $_SESSION['usernome'];
  $logadoID = $_SESSION['userid'];
  if (!isset($_GET['select'])) {
    echo '
            <script>
            window.location = "indexusuario.php?select=1";    
            </script>
        ';
  }
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
          <form name="pesquisar" method="GET">
            <span>
              <?php
              echo "Bem vido $logadonome";
              ?>
            </span>
            <hr>
            <?php
            $s_1 = '';
            $s_2 = '';
            $s_3 = '';
            $s_4 = '';
            $s_5 = '';
            $serv_status = $_GET['select'];
            switch ($serv_status) {
              case 1:
                $s_1 = 'selected';
                break;
              case 2:
                $s_2 = 'selected';
                break;
              case 3:
                $s_3 = 'selected';
                break;
              case 4:
                $s_4 = 'selected';
                break;
              case 5:
                $s_5 = 'selected';
                break;
            }
              $sql = "select serv_codigo, serv_nome, serv_descricao, serv_entrega_origem, serv_entrega_destino, serv_entrega_distancia, serv_status from servicos inner join usuarios on usuarios.user_codigo = servicos.user_codigo_contratante  where ((user_codigo = $logadoID) and (serv_status = $serv_status))";?>
              <select class="m-t-15" name="select" style="font-size: 60%;">
                <option value="1" <?php echo $s_1; ?>>Pendente</option>
                <option value="2" <?php echo $s_2; ?>>Em andamento</option>
                <option value="3" <?php echo $s_3; ?>>Saiu para a entrega</option>
                <option value="4" <?php echo $s_4; ?>>Aguardando conf.</option>
                <option value="5" <?php echo $s_5; ?>>Finalizado</option>
              </select>
              <button class="login100-form-btn m-t-15">
                Pesquisar
              </button>
          </form>
        </span>
        <!-- <div class="text-center w-full p-t-10 p-b-0"> -->
        <!-- <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm">Nome do Usuário
                </th>
                <th class="th-sm">Nome do Serviço
                </th>
                <th class="th-sm">Desc.
                </th>
                <th class="th-sm">Origem
                </th>
                <th class="th-sm">Destino
                </th>
                <th class="th-sm">Distancia -->
        <!-- </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot> -->
        <?php
        $executar = sqlsrv_query($con, $sql);
        $i = 0;
        while ($fila = sqlsrv_fetch_array($executar)) {
          $serv_nome   = $fila['serv_nome'];
          $serv_descricao   = $fila['serv_descricao'];
          $serv_entrega_origem   = $fila['serv_entrega_origem'];
          $serv_entrega_destino   = $fila['serv_entrega_destino'];
          $serv_entrega_distancia   = $fila['serv_entrega_distancia'];
          $serv_codigo   = $fila['serv_codigo'];
          $i++;
          ?>
          <hr>
          <div class="divResult">
            <form action="alterarentregador.php" method="GET">

              <?php echo '<th><span class="login100-form-title p-b-0">' . $serv_nome . '</span></th>'; ?>
              <table width="100%">
                <tr >
                  <?php echo '<th colspan="2"><span class="spanNome m-l-5">Descrição: ' . $serv_descricao . '</span></th>'; ?>
                </tr>
                <tr>
                  <?php echo '<th><span class="spanNome m-l-5">Origem: ' . $serv_entrega_origem . '</span></th>'; ?>
                  <?php echo '<th><span class="spanNome m-l-5">Destino: ' . $serv_entrega_destino . '</span></th>'; ?>
                </tr style="text-align: left;">
              </table>
              <?php echo '<span class="spanDist m-l-5 m-b-10">Distância: ' . $serv_entrega_distancia . 'm</span>'; ?>
            </form>
          </div>
        <?php } ?>
        <!-- </div> -->
        <!-- </table> -->
        <hr>
        <span>
          <a href="sairsessao.php">
            Sair da sessão
          </a>
        </span>
      </div>
    </div>
  </div>
</body>