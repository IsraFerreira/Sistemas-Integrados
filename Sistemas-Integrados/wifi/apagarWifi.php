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

// $conn2 = mysqli_connect($servidor, $usuario, $senha, $dbname);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$setor = filter_input(INPUT_GET, 'setor', FILTER_SANITIZE_STRING);
$predio = filter_input(INPUT_GET, 'predio', FILTER_SANITIZE_STRING);

$result_wifi = "DELETE FROM wifi WHERE ID='$id'";
$resultado_wifi = mysqli_query($conn, $result_wifi);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Ramal Removido</h3>";
}

header("Location:visualizarWifi.php");
?>

