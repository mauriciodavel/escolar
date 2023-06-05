<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>

    <meta charset="UTF-8">
    <title>Sistema Escolar</title>
    <link rel="shortcut icon" href="img/ico_escola.ico" /><!-- ícone da página -->
    <link href="css/estilo.css" rel="stylesheet" type="text/css"/>
    <?php require "conexao.php" ?>

    <body>
        <div id="logo">
            <img src="img/logo.png" alt=""/>
        </div>

        <div id="caixa_login">
            <?php
            if (isset($_POST['button'])) {
                $code = $_POST['code'];
                $password = $_POST['password'];
                if ($code == '') {
                    echo "<h2> Por favor, digite o código de acesso ou o número do cartão de acesso! </h2>";
                } else if ($password == '') {
                    echo "<h2> Por favor, digite sua senha! </h2>";
                } else {
                    $sql = "SELECT * FROM login WHERE code = '$code' AND senha = '$password'";
                    $result = mysqli_query($conexao, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($res_1 = mysql_fetch_assoc($result)) {
                            $status = $res_1['satus'];
                            $code = $res_1['code'];
                            $senha = $res_1['senha'];
                            $nome = $res_1['nome'];
                            $painel = $res_1['painel'];
                            
                            if ($status == 'Inativo') {
                                echo "<h2> Você está inativo. Procure a Administração! </h2>";
                                
                            }
                        }
                    } else {
                        echo "<h2>Código de acesso ou senha incorretos!</h2>";
                    }
                }
            }
            ?>

            <form name="form" method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><h1>Nº Cartão ou Código de Acesso:</h1></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="code"/></td>
                    </tr>
                    <tr>
                        <td><h1>Senha:</h1></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td><input class="input" type="submit" name="button" value="Entrar"/></td>
                    </tr>
                </table>

            </form>
        </div>
    </body>
</html>
