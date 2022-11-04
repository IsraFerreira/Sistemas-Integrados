<?php
include("connection.php");

$login = filter_input(INPUT_GET, "login");
echo $login;

$id = $_POST['id2'];
$nome = $_POST['nome2'];
$quantidade = $_POST['quantidade2'];
$preco = $_POST['preco2'];

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Equipamento Atualizado";

// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$atualizapaciente = "UPDATE produtos SET ID = '$id', nome = '$nome', quantidade = '$quantidade', preco = '$preco' WHERE id='$id'";
$atualizpaciente = mysqli_query($conn, $atualizapaciente);
header("Location:visualizar.php");
?>
