<?php  
$servidor = "localhost";
$usuario = "root";
$senha = "9L@d@$9";
$dbname = "estoque";

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(mysqli_connect_errno($conn)){
	 echo "Falha na conexão com o banco de dados";
}else{
     echo "";
}
?>