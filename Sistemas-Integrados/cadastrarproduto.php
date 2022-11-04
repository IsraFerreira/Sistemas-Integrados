<?php
include("connection.php");
?>

<html>
    <meta charset="UTF-8">
    <head>
    <LINK REL="SHORTCUT ICON" href="imagens/logo.png">
        <link href="styles/css.css" rel="stylesheet" type="text/css">
        <title>Cadastrar Equipamento</title>
    </head>

    <body>
        <div class="total">
            <div class="inicial">
                <img src="imagens/logo.png"/>
                <h3>Cadastre Novo Equipamento</h3>

                <form action="dadosproduto.php" method="post"> 
                    Nome do Produto:
                    <input type="text" name="nome" placeholder="Nome" required> <br><br>
                    Quantidade:
                    <input type="int" name="quantidade" placeholder="Quantidade" required> <br><br>
                    Preço R$:
                    <input type="text" name="preco" placeholder="preco" required> <br><br>


                    <input type="submit" value="Cadastrar Equip" class="botao">
                    <input type="reset" value="Limpar" class="botao">
                    <a href="visualizar.php"><input type="button" value="Visualizar Inventário" class="botao"></a>
                </form>
            </div>  
        </div>

    </body>
</html>