﻿<?php
include("connection.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}


$login = $_POST['login'];
$nome = $_POST['nome'];
$setorleito = $_POST['setorleito'];
$aparelho = $_POST['aparelho'];
$data = $_POST['data'];


$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Wifi Adicionado";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$dadoswifi = "INSERT INTO wifi(nome, setorleito, aparelho, data) VALUES ('$nome', '$setorleito', '$aparelho', NOW())";
$dadowifi = mysqli_query($conn, $dadoswifi)
?>


<html>
    <meta charset="UTF-8">
    <head>
        <LINK REL="SHORTCUT ICON" href="../imagens/imagem2.jpg">
        <link href="../styles/css.css" rel="stylesheet" type="text/css">
        <title> Confirmação de Cadastro </title>
    </head>
    <body>
        <div class="total">
            <div class="inicial">
            <?php include("session.php"); ?>
                <h3>Wifi Cadastrado com Sucesso!</h3>
                <img src="../imagens/logo.png" alt="Logo Cérebro">
                <form>
                    <a href="visualizarWifi.php"><input type="button" value="Ver Lista Wifi" class="botao"></a>
                    <a href="cadastrarWifi.php"><input type="button" value="Cadastrar Novamente" class="botao"></a>
                </form>
            </div>
        </div>
    </body>

</html>