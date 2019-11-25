<!DOCTYPE html>

<head>
  <?php
  include("headscript.php");
  include("conexao.php");
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
          <form name="pesquisar" method="GET">
            <?php
            echo "Bem vido $logadonome";
            ?>
            <select class="m-t-15" name="select">
              <option value="1">Pendente</option>
              <option value="2">Em andamento</option>
              <option value="3">Saiu para a entrega</option>
              <option value="4">Aguardando confirmação do usuário</option>
              <option value="5">Finalizado</option>
            </select>
            <button class="login100-form-btn m-t-15" name="pesquisar">
              Pesquisar
            </button>
          </form>
          <?php
            if (isset($_GET['pesquisar'])) {
              $serv_status = $_GET['select'];
              echo $serv_status;
              if(($serv_status == "2") or ($serv_status == "3") or ($serv_status == "4") or ($serv_status == "5")){
                $sql = "select user_nome, serv_nome, serv_descricao, serv_status, serv_entrega_origem, serv_entrega_destino, serv_entrega_distancia from servicos inner join veiculos
                on veiculos.veic_codigo = servicos.veic_codigo inner join usuarios on usuarios.user_codigo = veiculos.user_codigo where ((usuarios.user_codigo = $logadoID) and (serv_status = $serv_status))";
              }
            }
          ?>
        </span>
        <div class="text-center w-full p-t-10 p-b-0">
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm">Codigo

                </th>
                <th class="th-sm">Nome

                </th>
                <th class="th-sm">CPF
                </th>
                <th class="th-sm">E-mail

                </th>
                <th class="th-sm">Senha

                </th>
                <th class="th-sm">Tipo de Usu
                </th>
                <th class="th-sm">Excluir
                </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <th class="th-sm">Codigo

                </th>
                <th class="th-sm">Nome

                </th>
                <th class="th-sm">CPF
                </th>
                <th class="th-sm">E-mail

                </th>
                <th class="th-sm">Senha

                </th>
                <th class="th-sm">Tipo de Usu
                </th>
                <th class="th-sm">Excluir
                </th>
              </tr>
            </tfoot>
            <?php
            $executar = sqlsrv_query($con, $sql);
            $i = 0;
            while ($fila = sqlsrv_fetch_array($executar)) {
              $id    = $fila['user_nome'];
              $nome   = $fila['serv_nome'];
              $cpf   = $fila['serv_descricao'];
              $email   = $fila['serv_entrega_origem'];
              $senha   = $fila['serv_entrega_destino'];
              $tipo   = $fila['serv_entrega_distancia'];
              $i++;
              ?>
              <tr align="center">
                <td><?php echo $id; ?></td>
                <td><?php echo $nome; ?></td>
                <td><?php echo $cpf; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $senha; ?></td>
                <td><?php echo $tipo; ?></td>
                <td><a href="tables.php?excluir=<?php echo $id; ?>">Excluir</a></td>
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
      </div>
    </div>
  </div>
</body>