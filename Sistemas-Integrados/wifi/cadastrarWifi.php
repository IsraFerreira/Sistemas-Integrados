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
        <title>Cadastrar Ramal</title>
    </head>

    <body>
        <div class="total">
            <div class="inicial">
                <?php include("session.php"); ?>
                <img src="../imagens/logo.png"/>
                <h3>Cadastre Nova Solicitação de Ramal</h3>

                <form action="dadosWifi.php" method="post"> 
                    Nome do Colaborador (Caso tenha sido informado):
                    <input type="text" name="nome" placeholder="Nome do Colaborador" required> <br><br>
                    Setor:
                    <input type="int" name="setor" placeholder="Setor" required> <br><br>
                    Prédio:
                    <input type="text" name="predio" placeholder="Predio" required> <br><br>

                    <input type="submit" value="Cadastrar Ramal" class="botao">
                    <input type="reset" value="Limpar" class="botao">
                    <a href="visualizarWifi.php"><input type="button" value="Ver Lista de Ramais" class="botao"></a>
                </form>
            </div>  
        </div>

    </body>
</html>