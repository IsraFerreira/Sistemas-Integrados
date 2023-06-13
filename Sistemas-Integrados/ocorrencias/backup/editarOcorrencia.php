<?php
include("connection.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}
else {
    include("session.php");
}


$id = $_POST['idOcorrencia'];
$descricao = $_POST['descricao'];
$desDetalhada = $_POST ['desDetalhada'];
$contatoEm = $_POST['contatoEm'];
$resolvido = $_POST['resolvido'];
$dataCadastro = $_POST['dataCadastro'];
$dataResolvido = $_POST['dataResolvido'];
$dataUltimoParecer = $_POST['dataUltimoParecer'];
$cor = $_POST['cor'];


$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Tarefa Atualizada";

// Monta a query para inserir o log no sistema
$log = "INSERT INTO logsOcorrencia(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$hoje = date("Y-m-d");

if($resolvido=='sim'){
$atualiza = "UPDATE ocorrencias SET id = '$id', descricao = '$descricao', desDetalhada = '$desDetalhada', contatoEm = '$contatoEm', resolvido = '$resolvido', dataCadastro = '$dataCadastro', dataResolvido = NOW(), dataUltimoParecer = '$dataUltimoParecer', cor = 'verde' WHERE id='$id'"; }
else if($resolvido=='nao' && $contatoEm == $hoje) {
    $atualiza = "UPDATE ocorrencias SET id = '$id', descricao = '$descricao', desDetalhada = '$desDetalhada', contatoEm = '$contatoEm', resolvido = '$resolvido', dataCadastro = '$dataCadastro', dataResolvido = '$dataResolvido', dataUltimoParecer = '$dataUltimoParecer', cor = 'vermelho' WHERE id='$id'"; } 
    else {
        $atualiza = "UPDATE ocorrencias SET id = '$id', descricao = '$descricao', desDetalhada = '$desDetalhada', contatoEm = '$contatoEm', resolvido = '$resolvido', dataCadastro = '$dataCadastro', dataResolvido = '$dataResolvido', dataUltimoParecer = '$dataUltimoParecer', cor = 'amarelo' WHERE id='$id'"; } 
    
$atualiz = mysqli_query($conn, $atualiza);
header("Location:visualizarOcorrencias.php");
?>
