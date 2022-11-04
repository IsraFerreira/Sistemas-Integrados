<?php
include("connection.php");

$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Equipamento Removido";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_GET, 'quantidade', FILTER_SANITIZE_STRING);
// $result_paciente = "DELETE FROM produtos WHERE nome='$nome'";
// $resultado_paciente = mysqli_query($conn2, $result_paciente);
?>

<html>
    <meta charset="UTF-8">
<head>
    <LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
    <link href="styles/css.css" rel="stylesheet" type="text/css">
    <title>Remoção de Equipamento</title>
</head>
<body>
    <div class="total">
        <div class="inicial">
            <img src="imagens/logo.png"/>

<?php
$conn2 = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados";
}else{
     echo "";
}
?>

            <h3>Equipamento a ser removido</h3>
            <form action="produtoremovido.php" method="get">
                ID:
                <input type="int" name="id2" placeholder="ID" value="<?php echo $id; ?>" readonly="true"> <br><br>
                Nome:
                <input type="text" name="nome2" placeholder="Nome" value="<?php echo $nome; ?>"> <br><br>
                Quantidade:
                <input type="int" name="quantidade2" value="<?php echo $quantidade; ?>"/><br><br>
                <input type="submit" value="Ok" class="botao">
                <a href="visualizar.php"><input type="button" value="Visualizar Estoque" class="botao"></a>
            </form>
        </div>
    </div>
</body>
</html>
