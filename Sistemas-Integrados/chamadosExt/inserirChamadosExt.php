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


$id = $_POST['id2'];
$empresa = $_POST['empresa2'];
$solicitacao = $_POST['solicitacao2'];
$data = $_POST['data2'];
$resolvido = $_POST['resolvido2'];

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Chamado Ext Atualizado";

// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

if($resolvido == 'sim') {
$atualiza = "UPDATE chamadosExt SET ID = '$id', empresa = '$empresa', solicitacao = '$solicitacao', data = '$data', resolvido = '$resolvido', dataResolvido = NOW() WHERE ID='$id'"; }
else if ($resolvido == 'nao') {
$atualiza = "UPDATE chamadosExt SET ID = '$id', empresa = '$empresa', solicitacao = '$solicitacao', data = '$data', resolvido = '$resolvido', dataResolvido = NULL WHERE ID='$id'";   
}
$atualiz = mysqli_query($conn, $atualiza);
header("Location:visualizarChamadosExt.php");
?>
