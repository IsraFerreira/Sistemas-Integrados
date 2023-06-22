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
$nome = $_POST['nome2'];
$setor = $_POST['setor2'];
$predio = $_POST['predio2'];

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Wifi Atualizado";

// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$atualizawifi = "UPDATE wifi SET ID = '$id', nome = '$nome', setor = '$setor', predio = '$predio' WHERE ID='$id'";
$atualizwifi = mysqli_query($conn, $atualizawifi);
header("Location:visualizarWifi.php");
?>
