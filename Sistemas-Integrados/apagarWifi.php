<?php
include("connection.php");

$login = filter_input(INPUT_GET, "login");
echo $login;

$conn2 = mysqli_connect($servidor, $usuario, $senha, $dbname);

$id = filter_input(INPUT_GET, 'id2', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome2', FILTER_SANITIZE_STRING);
$setorleito = filter_input(INPUT_GET, 'setorleito2', FILTER_SANITIZE_STRING);
$aparelho = filter_input(INPUT_GET, 'aparelho2', FILTER_SANITIZE_STRING);

$result_wifi = "DELETE FROM wifi WHERE nome='$nome'";
$resultado_pwifi = mysqli_query($conn2, $result_wifi);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Wifi Removido</h3>";
}

header("Location:visualizarWifi.php");
?>

