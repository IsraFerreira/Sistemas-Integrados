<?php
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='login.html';</script>";  
}


?>

<html>
<meta charset="UTF-8">
    <head>
        <LINK REL="SHORTCUT ICON" href="imagens/logo.png">
        <link href="styles/css.css" rel="stylesheet" type="text/css">
        <title>Opções</title>

    </head>

    <body>
    <div class="total">
    <div class="inicial">
    <?php include("session.php"); ?>
        <img src="imagens/logo.png"/>
        <h3>Escolha uma das opções</h3>
        <a href="wifi/visualizarWifi.php"><input type="button" value="Listagem de Wifi" class="botao"></a>
        <a href="http://intranet.iec.net/estoque/visualizar.php"><input type="button" value="Estoque" class="botao"></a>
        <!-- <a href="visualizar.php"><input type="button" value="Visualizar Inventário" class="botao"></a> -->
        <!-- <a href="cadastrarproduto.php"><input type="button" value="Cadastrar Equip" class="botao"></a> -->
        <!-- <a href="editarproduto.php?login=".$login><input type="button" value="Editar Equip" class="botao"></a> -->
</div>
</div>

    </body>
</html>