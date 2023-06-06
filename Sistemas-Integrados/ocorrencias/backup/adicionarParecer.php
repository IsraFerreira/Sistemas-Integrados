<?php
include("connection.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}




$login = $_POST['login'];
$parecerDescricao = $_POST['parecerDescricao'];
$ocorrenciaId = $_POST['ocorrenciaId'];


$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Parecer Adicionado";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logsOcorrencia(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$dados = "INSERT INTO ocorrenciasParecer(parecerDescricao, ocorrenciaId, dataParecer) VALUES ('$parecerDescricao', '$ocorrenciaId', NOW())";
$dado = mysqli_query($conn, $dados);


$atualiza = "UPDATE ocorrencias SET dataUltimoParecer = NOW() WHERE id='$ocorrenciaId'";
$atualiz = mysqli_query($conn, $atualiza);

header('Location:visualizarOcorrencias.php?login='.$login);

// header('Location:$_SERVER['HTTP_REFERER']);
?>