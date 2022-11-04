<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.png">
<link href="./styles/tabela.css" rel="stylesheet" type="text/css">
<title>Movimentacoes</title>
</head>
<body>
	<div class="inicial">
		<img src="imagens/logo.png"/>

		<p>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="parametro" placeholder="Filtrar" class="filtro" />
			<input type="submit" value="Ordenar" class="botaoFiltro" />
			</form>
		</p>

<?php
include("connection.php");

$login = filter_input(INPUT_GET, "login");
echo $login;

//criando tabela e o cabeçalho de dados:
echo "<table>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Nome </th>";
echo "<th> Quantidade Anterior </th>";
echo "<th> Quantidade Atual </th>";
echo "<th> Chamado </th>";
echo "<th> Setor </th>";
echo "<th> IP </th>";
echo "<th> hora </th>";
echo "<th> Mensagem </th>";
echo "<th> Preco </th>";
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
$sql = "SELECT * from produtosretirada where nome like ('%$parametro%') or ID like ucase('%$parametro%') or chamado like ('%$parametro%') or setor like ('%$parametro%') or ip like ucase('%$parametro%') or mensagem like ('%$parametro%') order by hora desc";

$total_registros = "5000";
}

else{
	$sql = "SELECT * FROM produtosretirada order by hora desc";
	$total_registros = "50";
}


$inicio = $paginamarcada - 1;
$inicio = $inicio * $total_registros;


$todos = mysql_query("$sql");



$todos2 = mysqli_query($strcon, "$sql");
$totalregistros = mysqli_num_rows($todos2);


$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");



$totalpaginas = $totalregistros / $total_registros;	

echo "<h3>Lista de Movimentações de Equipamentos</h3>";


//obtendo os dados por meio de um loop while:
while ($registro = mysqli_fetch_array($resultado))

{


	
    $rid = $registro['ID']; 
	$rnome = $registro['nome'];
	$rquantidadeant = $registro['quantidadeant'];
	$rquantidadetotal = $registro['quantidadetotal'];
	$rchamado = $registro['chamado'];
	$rsetor = $registro['setor'];
	$rip = $registro['ip'];
	$rhora = $registro['hora'];
	$rmensagem = $registro['mensagem'];
	$rpreco = $registro['preco'];
	echo "<tr>";
	echo "<td>".$rid."</td>";
    echo "<td>".$rnome."</td>";
	echo "<td>".$rquantidadeant."</td>";
	echo "<td>".$rquantidadetotal."</td>";
	echo "<td>".$rchamado."</td>";
	echo "<td>".$rsetor."</td>";
	echo "<td>".$rip."</td>";
	echo "<td>".$rhora."</td>";
	echo "<td>".$rmensagem."</td>";
	echo "<td>".$rpreco."</td>";
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


<a href="cadastrarproduto.php"><input type="button" value="Cadastrar Equip" class="botao"></a>
<a href="visualizar.php"><input type="button" value="Visualizar Inventário" class="botao"></a>
<a href="editarproduto.php"><input type="button" value="Editar Equip" class="botao"></a>
<br>
<br>


<a href="gerarplanilha2.php"><input type="button" value="EXCEL Completo" class="botao"></a>
<?php
echo "<a href='gerarplanilhafiltro2.php?parametro=".$parametro."'><input type='button' class='botao' value='EXCEL Filtro'></a>";
?>
<a href="gerarplanilhaultimomes.php"><input type="button" value="Último Mês" class="botao"></a>


</div>
</body>
</html>