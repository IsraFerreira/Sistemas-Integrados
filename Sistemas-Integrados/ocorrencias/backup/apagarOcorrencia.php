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


$result = "DELETE FROM ocorrencias WHERE ID='$id'";
$resultado = mysqli_query($conn, $result);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Ocorrencia Removida</h3>";
}

header("Location:visualizarOcorrencias.php");
?>

