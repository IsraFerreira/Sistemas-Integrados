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
<link href="../styles/tabela.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/959cbca264.js" crossorigin="anonymous"></script>

<title>Listagem de Chamados Externos</title>
</head>
<body>
	<div class="inicial">
	<?php include("session.php"); ?>
		<img src="../imagens/logo.png"/>

		<p>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="parametro" placeholder="Filtrar" class="filtro" />
			<input type="submit" value="Ordenar" class="botaoFiltro" />
			</form>
		</p>


<?php
//criando tabela e o cabeçalho de dados:
echo "<table>";
echo "<tr>";
echo "<th> Empresa </th>";
echo "<th> Solicitacao </th>";
echo "<th> Data Aberto </th>";
echo "<th> Ações </th>";
echo "<th> Resolvido </th>";
echo "<th> Data Resolvido </th>";
echo "</tr>";


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
$sql = "SELECT * from chamadosExt where empresa like ucase('%$parametro%') or resolvido like ucase('%$parametro%') or solicitacao like ucase('%$parametro%') order by ID asc";
$total_registros = "5000";
}
else{
	$sql = "SELECT * FROM chamadosExt order by ID asc";
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

echo "<h3>Lista de Chamados Externos Solicitados</h3>";

//obtendo os dados por meio de um loop while:
while ($registro = mysqli_fetch_array($resultado))

{
    $rid = $registro['ID']; 
	$rempresa = $registro['empresa'];
	$rsolicitacao = $registro['solicitacao'];
	$rdata = $registro['data'];
	$rresolvido = $registro['resolvido'];
	$rdataresolvido = $registro['dataResolvido'];

	echo "<tr>";
    echo "<td>".$rempresa."</td>";
	echo "<td>".$rsolicitacao."</td>";
	echo "<td>".$rdata."</td>";
	echo "<td><a href='alterarChamadosExt.php?id=".$rid."&empresa=".$rempresa."&solicitacao=".$rsolicitacao."&data=".$rdata."&resolvido=".$rresolvido."&dataresolvido=".$rdataresolvido."'><i class='fa-solid fa-pen-to-square' id='icone1'></i></a>";
	echo "<a href='apagarChamadosExt.php?id=".$rid."&empresa=".$rempresa."&solicitacao=".$rsolicitacao."&data=".$rdata."&resolvido=".$rresolvido."&dataresolvido=".$rdataresolvido."'><i class='fa-solid fa-trash' id='icone2'></i></a></td>";
	echo "<td>".$rresolvido."</td>";
	echo "<td>".$rdataresolvido."</td>";	
	echo "</tr>";

}
mysqli_close($strcon);
echo "</table>";

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

<a href="cadastrarChamadosExt.php"><input type="button" value="Cadastrar Chamado Externo" class="botao"></a>
<a href="../escolha.php"><input type="button" value="Voltar Sistemas" class="botao"></a>

</div>
</body>
</html>