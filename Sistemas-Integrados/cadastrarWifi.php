<?php
include("connection.php");
?>

<html>
    <meta charset="UTF-8">
    <head>
    <LINK REL="SHORTCUT ICON" href="imagens/logo.png">
        <link href="styles/css.css" rel="stylesheet" type="text/css">
        <title>Cadastrar Wifi</title>
    </head>

    <body>
        <div class="total">
            <div class="inicial">
                <img src="imagens/logo.png"/>
                <h3>Cadastre Novo Wifi</h3>

                <form action="dadosWifi.php" method="post"> 
                    Nome do Colaborador / Paciente:
                    <input type="text" name="nome" placeholder="Nome do Colaborador / Paciente" required> <br><br>
                    Setor / Leito:
                    <input type="int" name="setorleito" placeholder="Setor / Leito" required> <br><br>
                    Aparelho (SMRT / NOTE / TBT):
                    <input type="text" name="aparelho" placeholder="Aparelho" required> <br><br>

                    <input type="submit" value="Cadastrar Wifi" class="botao">
                    <input type="reset" value="Limpar" class="botao">
                    <a href="visualizarWifi.php"><input type="button" value="Ver Lista Wifi" class="botao"></a>
                </form>
            </div>  
        </div>

    </body>
</html>