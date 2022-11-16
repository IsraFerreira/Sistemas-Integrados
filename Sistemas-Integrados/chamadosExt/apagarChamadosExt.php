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
$empresa = filter_input(INPUT_GET, 'empresa', FILTER_SANITIZE_STRING);
$solicitacao = filter_input(INPUT_GET, 'solicitacao', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_STRING);
$resolvido = filter_input(INPUT_GET, 'resolvido', FILTER_SANITIZE_STRING);
$dataresolvido = filter_input(INPUT_GET, 'dataresolvido', FILTER_SANITIZE_STRING);

$result = "DELETE FROM chamadosExt WHERE ID='$id'";
$resultado = mysqli_query($conn, $result);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Chamado Externo Removido</h3>";
}

header("Location:visualizarChamadosExt.php");
?>

