<?php
$login = filter_input(INPUT_GET, "login");
echo $login;
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
        <img src="imagens/logo.png"/>
        <h3>Escolha uma das opções</h3>

        <a href="visualizar.php"><input type="button" value="Visualizar Inventário" class="botao"></a>
        <a href="cadastrarproduto.php"><input type="button" value="Cadastrar Equip" class="botao"></a>
        <a href="editarproduto.php?login=".$login><input type="button" value="Editar Equip" class="botao"></a>


</div>
</div>

<?php 
// include("config.php");
?>
    </body>
</html>