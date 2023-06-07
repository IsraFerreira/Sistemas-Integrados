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

<title>Listagem de Tarefas</title>
</head>
<body>
	<div class="inicial">
	<?php include("session.php"); ?>
	<div class="btn">
	    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"><button class="VermelhoB" type="submit" name="parametro" value="ocorrenciaHoje"></button></form>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>"> <button class="AmareloB"type="submit" name="parametro" value="ocorrencia"></button> </form>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>"> <button class="VerdeB" type="submit" name="parametro" value="ocorrenciaSim"></button></form>
    </div>
		<img src="../imagens/logo.png"/>


		<div class="formulario">
        <form action="dadosOcorrencia.php" method="post"> 
            Descricao:
            <input type="text" name="descricao" placeholder="Cadastre uma nova Tarefa" required> <br><br>
            Contatar Em:
            <input type="date" name="contatoEm" required> <br><br>

            <input type="submit" value="Cadastrar Tarefa" class="botaoForm1">
            <input type="reset" value="Limpar" class="botaoForm2">
        </form>
		</div>



		<h3>Lista de Tarefas</h3>

		<p>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="parametro" placeholder="Filtrar" class="filtro" />
			<input type="submit" value="Ordenar" class="botaoFiltro" />
			</form>
		</p>


		<div class="flex-containerOcorrencia">

<?php



$pagina = $_GET['pagina'];
if (!$pagina) {
$paginamarcada = "1";
} else {
$paginamarcada = $pagina;
}

$hoje = date("Y-m-d");


//conectando ao banco de dados;
$parametro = filter_input(INPUT_GET, "parametro");

$strcon = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Erro ao conectar ao banco de dados');


if($parametro=="ocorrenciaHoje"){
$sql = "SELECT * from ocorrencias where cor like ('vermelho') OR contatoEm like ('$hoje') order by id desc";
$total_registros = "5000"; 
}
else if($parametro=="ocorrencia"){
$sql = "SELECT * from ocorrencias where cor like ('amarelo') AND contatoEm != ('$hoje') order by id desc";
$total_registros = "5000";	
}
else if($parametro=="ocorrenciaSim"){
$sql = "SELECT * from ocorrencias where cor like ('verde') order by id desc";
$total_registros = "5000";	
}
else if($parametro){
$sql = "SELECT * from ocorrencias where id like ('%$parametro%') or descricao like ucase('%$parametro%') or resolvido like ucase('%$parametro%') order by id desc";
$total_registros = "5000";
}
else{
	$sql = "SELECT * FROM ocorrencias order by id desc";
	$total_registros = "50";
}



$dataAtual = date("Y-m-d");

$inicio = $paginamarcada - 1;
$inicio = $inicio * $total_registros;


$todos = mysql_query("$sql");

$todos2 = mysqli_query($strcon, "$sql");
$totalregistros = mysqli_num_rows($todos2);

$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");

 // verifica o número total de registros
$totalpaginas = $totalregistros / $total_registros;	



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
	$rcor = $registro['cor'];

	if($rresolvido == "sim"){
		echo "<div class='ocorrenciaSim'>";}
	else if($rcontatoEm == $dataAtual || $dataAtual > $rcontatoEm){
		echo "<div class='ocorrenciaHoje'>";
	} else {
		echo "<div class='ocorrencia'>";
	}
	echo $rid;
	echo "<br>";
	echo $rdescricao;
	echo "<br>";
	echo "<h1>Contatar: $rcontatoEm </h1>";

	echo "<h1>Ultimo Parecer: $rdataUltimoParecer</h1> ";

	echo "<a href='inserirParecer.php?id=".$rid."&descricao=".$rdescricao."&contatoEm=".$rcontatoEm."&resolvido=".$rresolvido."&dataCadastro=".$rdataCadastro."&dataResolvido=".$rdataResolvido."&dataUltimoParecer=".$rdataUltimoParecer."&cor=".$rcor."'><i class='fa-solid fa-pen-to-square' id='icone1'></i></a>";
	echo "<a href='apagarOcorrencia.php?id=".$rid."'><i class='fa-solid fa-trash' id='icone2'></i></a>";
	echo "</div>";

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