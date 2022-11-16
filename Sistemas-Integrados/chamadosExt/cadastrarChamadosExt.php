<?php
include("connection.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}

?>

<html>
    <meta charset="UTF-8">
    <head>
    <LINK REL="SHORTCUT ICON" href="../imagens/logo.png">
        <link href="../styles/css.css" rel="stylesheet" type="text/css">
        <title>Cadastrar Chamado Ext</title>
    </head>

    <body>
        <div class="total">
            <div class="inicial">
                <?php include("session.php"); ?>
                <img src="../imagens/logo.png"/>
                <h3>Cadastre Novo Chamado Externo</h3>

                <form action="dadosChamadosExt.php" method="post"> 
                    Empresa:
                    <input type="text" name="empresa" placeholder="Empresa" required> <br><br>
                    Solicitacao:
                    <input type="int" name="solicitacao" placeholder="Solicitacao" required> <br><br>

                    <input type="submit" value="Cadastrar Chamado Externo" class="botao">
                    <input type="reset" value="Limpar" class="botao">
                    <a href="visualizarChamadosExt.php"><input type="button" value="Ver Lista Chamados Ext" class="botao"></a>
                </form>
            </div>  
        </div>

    </body>
</html>