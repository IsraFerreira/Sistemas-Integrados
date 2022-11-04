<?php
include("connection.php");

// $conn2 = mysqli_connect($servidor, $usuario, $senha, $dbname);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$setorleito = filter_input(INPUT_GET, 'setorleito', FILTER_SANITIZE_STRING);
$aparelho = filter_input(INPUT_GET, 'aparelho', FILTER_SANITIZE_STRING);

$result_wifi = "DELETE FROM wifi WHERE ID='$id'";
$resultado_wifi = mysqli_query($conn, $result_wifi);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Wifi Removido</h3>";
}

header("Location:visualizarWifi.php");
?>

