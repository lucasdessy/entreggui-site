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
            window.location = "indexentregador.php?select=1&pesquisar=";    
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
            <?php
            echo "Bem vido $logadonome";
            $s_1 = '';
            $s_2 = '';
            $s_3 = '';
            $s_4 = '';
            $s_5 = '';
            if (isset($_GET['pesquisar'])) {
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
              if (($serv_status == "2") or ($serv_status == "3") or ($serv_status == "4") or ($serv_status == "5")) {
                $sql = "select serv_codigo,user_nome, serv_nome, serv_descricao, serv_entrega_origem, serv_entrega_destino, serv_entrega_distancia, serv_status from servicos inner join usuarios on usuarios.user_codigo = servicos.user_codigo_contratante 
                inner join veiculos on servicos.veic_codigo = veiculos.veic_codigo where ((veiculos.user_codigo = $logadoID) and (servicos.serv_status = $serv_status))";
              }
              if ($serv_status == "1") {
                $sql = "select serv_codigo,user_nome, serv_nome, serv_descricao, serv_entrega_origem, serv_entrega_destino, serv_entrega_distancia, serv_status from servicos inner join usuarios on usuarios.user_codigo = servicos.user_codigo_contratante where  (serv_status = 1 )";
              }
            }
            ?>
              <select class="m-t-15" name="select" style="font-size: 60%;">
                <option value="1" <?php echo $s_1; ?>>Pendente</option>
                <option value="2" <?php echo $s_2; ?>>Em andamento</option>
                <option value="3" <?php echo $s_3; ?>>Saiu para a entrega</option>
                <option value="4" <?php echo $s_4; ?>>Aguardando confirmação do usuário</option>
                <option value="5" <?php echo $s_5; ?>>Finalizado</option>
              </select>
              <button class="login100-form-btn m-t-15" style="width: 40%; display: block; margin-right: auto; margin-right: auto;" name="pesquisar">
                Pesquisar
              </button>
          </form>
        </span>
        <div class="text-center w-full p-t-10 p-b-0">
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                <th class="th-sm">Distancia
                  <?php
                  if ($serv_status != "5") {
                    echo '</th>
                    <th class="th-sm">Atualizar
                    </th>';
                  }
                  ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
            <?php
            $executar = sqlsrv_query($con, $sql);
            $i = 0;
            while ($fila = sqlsrv_fetch_array($executar)) {
              $user_nome    = $fila['user_nome'];
              $serv_nome   = $fila['serv_nome'];
              $serv_descricao   = $fila['serv_descricao'];
              $serv_entrega_origem   = $fila['serv_entrega_origem'];
              $serv_entrega_destino   = $fila['serv_entrega_destino'];
              $serv_entrega_distancia   = $fila['serv_entrega_distancia'];
              $serv_codigo   = $fila['serv_codigo'];
              $i++;
              ?>
              <tr align="center">
                <td><?php echo $user_nome; ?></td>
                <td><?php echo $serv_nome; ?></td>
                <td><?php echo $serv_descricao; ?></td>
                <td><?php echo $serv_entrega_origem; ?></td>
                <td><?php echo $serv_entrega_destino; ?></td>
                <td><?php echo $serv_entrega_distancia; ?></td>
                <?php
                  if ($serv_status != "5") {
                    echo '<td><a href="alterarentregador.php?id='.$serv_codigo.'&status='.$serv_status.'">Alterar</a></td>';
                  }
                  ?>

              </tr>
            <?php } ?>
          </table>
        </div>
        <?php
        if (isset($_GET['editar'])) {
          include("editar.php");
        }
        ?>
        </table>
        <span>
          <a href="sairsessao.php">
            Sair da sessão
          </a>
        </span>
      </div>
    </div>
  </div>
</body>