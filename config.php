<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require "conexao.php";
        @session_start();
        $code = $_SESSION['code'];
        $senha = $_SESSION['senha'];
        $nome = $_SESSION['nome'];
        $painel = $_SESSION['painel'];

        if ($code == '') {
            echo "<script language='javascript'>window.location='../index.php';</script>";
        } else if ($nome == '') {
            echo "<script language='javascript'>window.location='../index.php';</script>";
        } else if ($senha == '') {
            echo "<script language='javascript'>window.location='../index.php';</script>";
        } else {
            $sql = "SELECT * FROM login WHERE code = '$code' AND senha = '$password'";
            $result = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($result) <= 0) {
                echo "<script language='javascript'>window.location='../index.php';</script>";
            }
        }
        ?>
    </body>
</html>
