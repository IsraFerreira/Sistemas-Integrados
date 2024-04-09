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
<title>Escolha o Mês</title>
</head>
<body>
        <div class="total">
            <div class="inicial">
                <?php include("session.php"); ?>
                <img src="../imagens/logo.png"/>
<h3>Escolha o Mês desejado</h3>

<table>
	<tr>
<td>
<a href="escolha.php?escolha=1" class="linkImpressora">Janeiro 2024</a><br><br>
<a href="escolha.php?escolha=2" class="linkImpressora">Fevereiro 2024</a><br><br>
<a href="escolha.php?escolha=3" class="linkImpressora">Março 2024</a><br><br>
<a href="escolha.php?escolha=4" class="linkImpressora">Abril 2024</a><br><br>
<a href="escolha.php?escolha=5" class="linkImpressora">Maio 2024</a><br><br>
<a href="escolha.php?escolha=6" class="linkImpressora">Junho 2024</a><br><br>
<a href="escolha.php?escolha=7" class="linkImpressora">Julho 2024</a><br><br>
<a href="escolha.php?escolha=8" class="linkImpressora">Agosto 2024</a><br><br>
<a href="escolha.php?escolha=9" class="linkImpressora">Setembro 2024</a><br><br>
<a href="escolha.php?escolha=10" class="linkImpressora">Outubro 2024</a><br><br>
<a href="escolha.php?escolha=11" class="linkImpressora">Novembro 2024</a><br><br>
<a href="escolha.php?escolha=12" class="linkImpressora">Dezembro 2024</a><br><br>
</td>
<td>
<a href="escolha.php?escolha=13" class="linkImpressora">Janeiro 2023</a><br><br>
<a href="escolha.php?escolha=14" class="linkImpressora">Fevereiro 2023</a><br><br>
<a href="escolha.php?escolha=15" class="linkImpressora">Março 2023</a><br><br>
<a href="escolha.php?escolha=16" class="linkImpressora">Abril 2023</a><br><br>
<a href="escolha.php?escolha=17" class="linkImpressora">Maio 2023</a><br><br>
<a href="escolha.php?escolha=18" class="linkImpressora">Junho 2023</a><br><br>
<a href="escolha.php?escolha=19" class="linkImpressora">Julho 2023</a><br><br>
<a href="escolha.php?escolha=20" class="linkImpressora">Agosto 2023</a><br><br>
<a href="escolha.php?escolha=21" class="linkImpressora">Setembro 2023</a><br><br>
<a href="escolha.php?escolha=22" class="linkImpressora">Outubro 2023</a><br><br>
<a href="escolha.php?escolha=23" class="linkImpressora">Novembro 2023</a><br><br>
<a href="escolha.php?escolha=24" class="linkImpressora">Dezembro 2023</a><br><br>
</td>
</tr>
</table>

<a href="../escolha.php"><input type="button" value="Voltar sistemas" class="botao"></a>
</div>
</div>

</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>
