<html>
    <meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.png">
    <link href="styles/css.css" rel="stylesheet" type="text/css">
    <title>Confirmação de Remoção</title>
</head>
<body>
    <div class="total">
        <div class="inicial">
            <img src="imagens/logo.png"/>

<?php
include("connection.php");

$login = filter_input(INPUT_GET, "login");
echo $login;

$conn2 = mysqli_connect($servidor, $usuario, $senha, $dbname);

$id = filter_input(INPUT_GET, 'id2', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome2', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_GET, 'quantidade2', FILTER_SANITIZE_STRING);
$result_paciente = "DELETE FROM produtos WHERE nome='$nome'";
$resultado_paciente = mysqli_query($conn2, $result_paciente);

if(mysqli_connect_errno($conn3)){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Equipamento Removido</h3>";
}

?>
            <a href="visualizar.php"><input type="button" value="Visualizar Inventário" class="botao"></a>
            <a href="cadastrarproduto.php"><input type="button" value="Cadastrar Equip" class="botao"></a>
        </div>
    </div>
</body>

</html>
