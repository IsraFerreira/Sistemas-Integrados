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
<link href="tabela.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/959cbca264.js" crossorigin="anonymous"></script>

<title>Listagem de Ocorrências</title>
</head>
<body>
	<div class="inicial">
	<?php include("session.php"); ?>
		<img src="../imagens/logo.png"/>


		<div class="formulario">
        <form action="dadosOcorrencia.php" method="post"> 
            Descricao:
            <input type="text" name="descricao" placeholder="Cadastre uma nova Ocorrência" required> <br><br>
            Contatar Em:
            <input type="date" name="contatoEm" required> <br><br>

            <input type="submit" value="Cadastrar Ocorrencia" class="botaoForm1">
            <input type="reset" value="Limpar" class="botaoForm2">
        </form>
		</div>



		<h3>Lista de Ocorrencias</h3>

		<p>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="parametro" placeholder="Filtrar" class="filtro" />
			<input type="submit" value="Ordenar" class="botaoFiltro" />
			</form>
		</p>


		<div class="flex-container">

<?php



$pagina = $_GET['pagina'];
if (!$pagina) {
$paginamarcada = "1";
} else {
$paginamarcada = $pagina;
}


//conectando ao banco de dados;
$parametro = filter_input(INPUT_GET, "parametro");

$strcon = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Erro ao conectar ao banco de dados');

if($parametro){
$sql = "SELECT * from ocorrencias where id like ('%$parametro%') or descricao like ucase('%$parametro%') or resolvido like ucase('%$parametro%') order by id desc";
$total_registros = "5000";
}
else{
	$sql = "SELECT * FROM ocorrencias order by id desc";
	$total_registros = "50";
}


$inicio = $paginamarcada - 1;
$inicio = $inicio * $total_registros;


$todos = mysql_query("$sql");

$todos2 = mysqli_query($strcon, "$sql");
$totalregistros = mysqli_num_rows($todos2);

$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");

 // verifica o número total de registros
$totalpaginas = $totalregistros / $total_registros;	

$dataAtual = date("Y-m-d");


//obtendo os dados por meio de um loop while:
while ($registro = mysqli_fetch_array($resultado))
{
    $rid = $registro['id']; 
	$rdescricao = $registro['descricao'];
	$rcontatoEm = $registro['contatoEm'];
	$rresolvido = $registro['resolvido'];
	$rdataCadastro = $registro['dataCadastro'];
	$rdataResolvido = $registro['dataResolvido'];
	$rdataUltimoParecer = $registro['dataUltimoParecer'];

	if($rresolvido == "sim"){
		echo "<div class='ocorrenciaSim'>";}
	else if($rcontatoEm == $dataAtual ){
		echo "<div class='ocorrenciaHoje'>";
	} else {
		echo "<div class='ocorrencia'>";
	}
	echo $rid;
	echo "<br>";
	echo $rdescricao;
	echo "<br>";
	echo "<h1>Contatar: $rcontatoEm </h1>";
	// echo "<h1>Cadastro: $rdataCadastro</h1>";
	echo "<h1>Ultimo Parecer: $rdataUltimoParecer</h1> ";
			// Empresa:
			// <input type="text" name="empresa" placeholder="Empresa" required> <br><br>
			// Solicitacao:
			// <input type="int" name="solicitacao" placeholder="Solicitacao" required> <br><br>

	// <input type="submit" value="Cadastrar Chamado Externo" class="botao">
	// <input type="reset" value="Limpar" class="botao">
	echo "<a href='inserirParecer.php?id=".$rid."&descricao=".$rdescricao."&contatoEm=".$rcontatoEm."&resolvido=".$rresolvido."&dataCadastro=".$rdataCadastro."&dataResolvido=".$rdataResolvido."&dataUltimoParecer=".$rdataUltimoParecer."'><i class='fa-solid fa-pen-to-square' id='icone1'></i></a>";
	echo "<a href='apagarOcorrencia.php?id=".$rid."'><i class='fa-solid fa-trash' id='icone2'></i></a>";
	echo "</div>";

	// echo "<tr>";
    // echo "<td>".$rempresa."</td>";
	// echo "<td>".$rsolicitacao."</td>";
	// echo "<td>".$rdata."</td>";
	// echo "<td><a href='alterarChamadosExt.php?id=".$rid."&empresa=".$rempresa."&solicitacao=".$rsolicitacao."&data=".$rdata."&resolvido=".$rresolvido."&dataresolvido=".$rdataresolvido."'><i class='fa-solid fa-pen-to-square' id='icone1'></i></a>";
	// echo "<a href='apagarChamadosExt.php?id=".$rid."&empresa=".$rempresa."&solicitacao=".$rsolicitacao."&data=".$rdata."&resolvido=".$rresolvido."&dataresolvido=".$rdataresolvido."'><i class='fa-solid fa-trash' id='icone2'></i></a></td>";
	// if($rresolvido == "nao"){
	// 	echo "<td style='background-color:#eb1913; color:white'>".$rresolvido."</td>";}
	// 	else{
	// 	echo "<td style='background-color:#1ff04a; color:white'>".$rresolvido."</td>";
	// }
	// echo "<td>".$rdataresolvido."</td>";	
	// echo "</tr>";

}
mysqli_close($strcon);
echo "</div>";

$anterior = $paginamarcada -1;

$proximo = $paginamarcada +1;


echo "<div class='marcador'>";
if ($totalpaginas >= $paginamarcada){
echo "<h4>Pagina $paginamarcada </h4>";
if ($paginamarcada>1) {
echo "<a href='?pagina=$anterior'><- Anterior</a> ";}
echo "<a href='?pagina=$proximo'>| Próxima -></a>";
}
elseif ($parametro){
echo "<h4>Pagina Unica - Filtrada </h4>";
echo "<input type='button' value='Voltar' onClick='history.go(-1)' class='botao'>"; 
}
else{	
echo "<h4>Pagina $paginamarcada </h4>";	
echo "<a href='?pagina=$anterior'><- Anterior</a>";
}
echo "</div>";

?>

<a href="../escolha.php"><input type="button" value="Voltar Sistemas" class="botao"></a>

</div>
</body>
</html>