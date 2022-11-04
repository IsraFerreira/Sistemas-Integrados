<?php
include("connection.php");

$id = $_POST['id2'];
$nome = $_POST['nome2'];
$quantidadeanterior = $_POST['quantidade2'];
$quantidadeacr = $_POST['quantidadeacr'];
$chamado = $_POST['chamado2'];
$setor = $_POST['setor2'];
$preco = $_POST['preco2'];

$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Equipamento Retirado/Acrescentado";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);


$quantidade = $quantidadeacr;
$mensagem = "Equipamento Movimentado";
$inserirmudanca3 = "INSERT INTO produtosretirada(ID, nome, quantidadeacr, quantidadeant, quantidadetotal, chamado, setor, ip, hora, mensagem, preco) VALUES ('$id', '$nome', '$quantidadeacr', '$quantidadeanterior', '$quantidade', '$chamado', '$setor', '$ip', '$hora', '$mensagem', '$preco')";
$inserirmudanca4 = mysqli_query($conn, $inserirmudanca3);




$atualizapaciente = "UPDATE produtos SET ID = '$id', nome = '$nome', quantidade = '$quantidade' WHERE ID='$id'";
$atualizpaciente = mysqli_query($conn, $atualizapaciente)
?>

<?php
header("Location:visualizarlog.php");
?>