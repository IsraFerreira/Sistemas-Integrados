<?php
include("conexao.php");
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
  <title>Entrada no Log de Impressoras</title>

 </head>
 <body>
        <div class="total">
            <div class="inicial">
            <?php include("session.php"); ?>
<h3>Bem Vindo à Aplicação do Log de Impressoras </h3>
<img src="../imagens/logo.png" alt="Logo Cérebro">
</br>
<a href="logmeses.php"><input type="button" value="Entrar" class="botao"></a>
</div>
</div>
</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>
