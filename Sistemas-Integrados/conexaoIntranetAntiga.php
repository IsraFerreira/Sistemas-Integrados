<?php  
$servidor2 = "localhost";
$usuario2 = "root";
$senha2 = "9L@d@$9";
$dbname2 = "estoque";

//criar a conexão
$conn2 = mysqli_connect($servidor2, $usuario2, $senha2, $dbname2);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados(ANTIGO)";
}else{
     echo "";
}
?>