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

<title>Listagem de Wifi</title>
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
echo "<th> ID </th>";
echo "<th> Nome </th>";
echo "<th> Setor/Leito </th>";
echo "<th> Aparelho </th>";
echo "<th> Dias </th>";
echo "<th> Ações </th>";
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
$sql = "SELECT * from wifi where nome like ucase('%$parametro%') or setorleito like ucase('%$parametro%') or aparelho like ucase('%$parametro%') order by ID asc";
$total_registros = "5000";
}
else{
	$sql = "SELECT * FROM wifi order by ID asc";
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

echo "<h3>Lista de Wifi para Cadastrar</h3>";

//obtendo os dados por meio de um loop while:
while ($registro = mysqli_fetch_array($resultado))

{
    $rid = $registro['ID']; 
	$rnome = $registro['nome'];
	$rsetorleito = $registro['setorleito'];
	$raparelho = $registro['aparelho'];
	$rdata = $registro['data'];

	$hoje = date('Y-m-d');
	$dif = strtotime($hoje) - strtotime($rdata);
	$rdiasnafila= ($dif/86400);


	echo "<tr>";
	echo "<td>".$rid."</td>";
    echo "<td>".$rnome."</td>";
	echo "<td>".$rsetorleito."</td>";
	echo "<td>".$raparelho."</td>";
	echo "<td>".round($rdiasnafila)."</td>";
	echo "<td><a href='alterarWifi.php?id=".$rid."&nome=".$rnome."&setorleito=".$rsetorleito."&aparelho=".$raparelho."'><i class='fa-solid fa-pen-to-square' id='icone1'></i></a>";
	echo "<a href='apagarWifi.php?id=".$rid."&nome=".$rnome."&setorleito=".$rsetorleito."&aparelho=".$raparelho."'><i class='fa-solid fa-trash' id='icone2'></i></a></td>";
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

<a href="cadastrarWifi.php"><input type="button" value="Cadastrar Wifi" class="botao"></a>
<a href="../escolha.php"><input type="button" value="Voltar Sistemas" class="botao"></a>

</div>
</body>
</html>