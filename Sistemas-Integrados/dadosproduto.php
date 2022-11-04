<?php
include("connection.php");

$login = filter_input(INPUT_GET, "login");
echo $login;

$login = $_POST['login'];
$nome = $_POST['nome'];
$id = $_POST['id'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];


$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Equipamento adicionado";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$dadospaciente = "INSERT INTO produtos(ID, nome, quantidade, preco) VALUES ('$id', '$nome', '$quantidade', '$preco')";
$dadopaciente = mysqli_query($conn, $dadospaciente)
?>


<html>
    <meta charset="UTF-8">
    <head>
        <LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
        <link href="styles/css.css" rel="stylesheet" type="text/css">
        <title> Confirmação de Cadastro </title>
    </head>
    <body>
        <div class="total">
            <div class="inicial">
                <h3>Equipamento Cadastrado com Sucesso!</h3>
                <img src="./imagens/logo.png" alt="Logo Cérebro">
                <form>
                    <a href="visualizar.php"><input type="button" value="Visualizar Inventário" class="botao"></a>
                    <a href="cadastrarproduto.php"><input type="button" value="Cadastrar Novamente" class="botao"></a>
                </form>
            </div>
        </div>
    </body>

</html>