<?php
include("conexao.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}



$escolha = filter_input(INPUT_GET, 'escolha', FILTER_SANITIZE_STRING);
?>

<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="../imagens/logo.png">
        <link href="../styles/css.css" rel="stylesheet" type="text/css">
<title>Escolha de Parâmetros</title>
</head>
<body>
<div class="total">
            <div class="inicial">
                <?php include("session.php"); ?>
                <img src="../imagens/logo.png"/>


<h3>Escolha os parâmetros para a tabela</h3>

<?php
echo "<form action='tabela.php?escolha=$escolha' method='post'>" 

?>


<table>
<tr>
<th>
<input name="data" type="radio" value="data"/>
Data<br>
</th>

<th>
<input name="usuario" type="radio" value="usuario"/>
Usuário<br>
</th>
</tr>

<tr>
<th>
<input name="paginas" type="radio" value="paginas"/>
Páginas<br>
</th>

<th>
<input name="copias" type="radio" value="copias"/>
Cópias<br>
</th>
</tr>

<tr>
<th>
<input name="calculo" type="radio" value="calculo"/>
Calculo(PágsxCópias)<br>
</th>

<th>
<input name="setor" type="radio" value="setor"/>
Setor<br>
</th>
</tr>

<tr>
<th>
<input name="nomedodocumento" type="radio" value="nomedodocumento"/>
Nome do doc<br>
</th>

<th>
<input name="computador" type="radio" value="computador"/>
Computador<br>
</th>
</tr>
</table>
<br>



<input type="submit" value="Enviar Parâmetros" class="botao">

<input type="reset" value="Limpar" class="botao">

<a href="logmeses.php"><input type="button" value="Voltar" class="botao"></a>

<?php
echo "<a href='topimpressao.php?escolha=$escolha'><input type='button' value='Top Usuários/Impressão' class='botao'>"
?>

</form>
</div>
</div>
</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>
