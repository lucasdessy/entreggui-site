<!DOCTYPE html>
<?php
include("conexao.php");
if (!isset($_GET['usuario'])) {
    echo '
            <script>
            window.location = "cadastro.php?usuario=0";    
            usuario.checked = "checked";
            </script>
        ';
}
$cpferro = FALSE;
?>
<html lang="en">

<head>
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
    <!-- <script src="js/jquery.maskedinput.js"></script> -->
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['nome'])) {
            $nomeerro = '
            <span style="color: #ff0000">
            * campo obrigatório
            </span>';
            $existe_erro = TRUE;
        }
        if (empty($_POST['CPF'])) {
            $cpferro = '
            <span style="color: #ff0000">
            * campo obrigatório
            </span>';
            $existe_erro = TRUE;
        }
        if (empty($_POST['email'])) {
            $emailerro = '
            <span style="color: #ff0000">
            * campo obrigatório
            </span>';
            $existe_erro = TRUE;
        }
        if (empty($_POST['senha'])) {
            $senhaerro = '
            <span style="color: #ff0000">
            * campo obrigatório
            </span>';
            $existe_erro = TRUE;
        }
        if (!(isset($_POST['termos']))) {
            $termoserro = '
            <span style="color: #ff0000">
            * necessário concordar com os termos de uso.
            </span>';
            $existe_erro = TRUE;
        }
    }
    ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-15 p-r-15 p-t-25 p-b-10 scroll">
                <span class="login100-form-title p-b-0">
                    Cadastre-se
                </span>
                <form name="Cadastro" method="POST" class="login100-form validate-form" onsubmit="required()">
                    <div class="text-center w-full p-t-25
                     p-b-0">
                        <span class="txt2">
                            Selecione o tipo de Usuário:
                        </span>
                    </div>
                    <div class="text-center w-full p-t-15 p-b-0">
                        <div class="form-radio">
                            <input type="radio" name="member_level" value="usuario" onClick="window.location = 'cadastro.php?usuario=0';" id="usuario" checked="checked" />
                            <label for="usuario">Usuário</label>
                            <input type="radio" name="member_level" value="entregador" onClick="window.location = 'cadastro.php?usuario=1';" id="entregador" />
                            <label for="entregador">Entregador</label>
                        </div>
                    </div>

                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="text" name="nome" placeholder="Nome" id="nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : '' ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                        <?php
                        if (isset($nomeerro)) echo $nomeerro;
                        ?>
                    </div>
                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="text" name="CPF" placeholder="CPF" id="cpf" value="<?php echo isset($_POST['CPF']) ? $_POST['CPF'] : '' ?>">
                        <span class="focus-input100"></span>
                        <span clfass="symbol-input100"></span>
                        <?php
                        if (isset($cpferro)) echo $cpferro;
                        ?>
                    </div>
                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="email" name="email" placeholder="Email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                        <?php
                        if (isset($emailerro)) echo $emailerro;
                        ?>
                    </div>
                    <span class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="password" name="senha" placeholder="Senha" id="senha">
                        <?php
                        if (isset($senhaerro)) echo $senhaerro;
                        ?>
                    </span>

                    <?php
                    if ($_GET['usuario'] == 0) {
                        $usu = 0;
                        echo '
                            <script>
                                usuario.checked = "checked";
                            </script>
                            ';
                    }
                    if ($_GET['usuario'] == 1) {
                        $usu = 1;
                        include("cadentregadores.php");
                        echo '
                                <script>
                                    entregador.checked = "checked";
                                </script>
                                ';
                    }
                    ?>

                    <div class="contact100-form-checkbox m-l-4">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="termos">
                        <label class="label-checkbox100" for="ckb1">
                            <span class="txt1">Eu concordo com os </span><a class="txt1 bo1 hov1" href="termosdeservico.html">Termos de serviço</a>
                        </label>
                        <?php
                        if (isset($termoserro)) echo $termoserro;
                        ?>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" name='insert'>
                            Criar conta
                        </button>
                    </div>
                </form>
                <div class="text-center w-full p-t-10 p-b-0">
                    <span class="txt1">
                        Já tem uma conta?
                    </span>

                    <a class="txt1 bo1 hov1" href="login.php">
                        Log in
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (@$existe_erro != TRUE) {
            if (isset($_POST['insert'])) {
                $nome     = $_POST['nome'];
                $cpf       = $_POST['CPF'];
                $email     = $_POST['email'];
                $senha     = $_POST['senha'];
                if ($usu == 0) {
                    $sql = "insert into USUARIOS (user_cpf,user_nome,user_email,user_senha, user_tipo)
	    			VALUES
                ('$cpf','$nome','$email','$senha',$usu)";
                    $executar = sqlsrv_query($con, $sql);
                }
                if ($usu == 1) {
                    $RG = $_POST['rg'];
                    $orgemissor = $_POST['orgao'];
                    $nomemae = $_POST['nomemae'];
                    $nomepai = $_POST['nomepai'];
                    $sql = "insert into USUARIOS (user_cpf,user_nome,user_email,user_senha, user_tipo)
                VALUES
                ('$cpf','$nome','$email','$senha',$usu)";
                    $executar = sqlsrv_query($con, $sql);
                    // pegar id do entregador
                    $entregadorID = sqlsrv_query($con, "SELECT user_codigo FROM USUARIOS WHERE user_cpf = '$cpf'");
                    $entregadorID2 = implode("", sqlsrv_fetch_array($entregadorID, SQLSRV_FETCH_ASSOC));
                    echo $entregadorID2;
                    // echo $entregadorID;
                    // $entregadorID2 = $entregadorID2array['user_codigo'];
                    $sqlentregador = "insert into ENTREGADORES (user_codigo,entregador_rg,entregador_orgao_emissor,entregador_nomemae,entregador_nomepai)
                VALUES
                ($entregadorID2,'$RG','$orgemissor','$nomemae','$nomepai')";
                    // echo $sqlentregador;
                    $executarentregador = sqlsrv_query($con, $sqlentregador);
                }


                if ($executar) {
                    echo "<script>alert('Usuário inserido corretamente')</script>";
                } else {
                    echo "nao inserido";
                }
                if (isset($executarentregador)) {
                    if ($executarentregador) {
                        echo "<script>alert('Entregador inserido corretamente')</script>";
                    }
                }
            }
        }
    ?>
</body>

</html>