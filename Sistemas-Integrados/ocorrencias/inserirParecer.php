<?php
include("connection.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}


$idOcorrencia = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_GET, 'descricao', FILTER_SANITIZE_STRING);
$contatoEm = filter_input(INPUT_GET, 'contatoEm', FILTER_SANITIZE_STRING);
$resolvido = filter_input(INPUT_GET, 'resolvido', FILTER_SANITIZE_STRING);
$dataCadastro = filter_input(INPUT_GET, 'dataCadastro', FILTER_SANITIZE_STRING);
$dataResolvido = filter_input(INPUT_GET, 'dataResolvido', FILTER_SANITIZE_STRING);
$dataUltimoParecer = filter_input(INPUT_GET, 'dataUltimoParecer', FILTER_SANITIZE_STRING);

?>

<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="../imagens/logo.png">
<link href="tabela.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/959cbca264.js" crossorigin="anonymous"></script>

<title>Listagem de Parecer e edição</title>
</head>
<body>
	<div class="inicial">
	<?php include("session.php"); ?>
		<img src="../imagens/logo.png"/>

		<h3>Listagem de Parecer e edição</h3>
		<div class="formulario">
        <form action="editarOcorrencia.php" method="post">
			<input type="int" name="idOcorrencia" placeholder="ID" value="<?php echo $idOcorrencia; ?>" readonly="true" class="bloqueado"><br><br>
            Descricao:
            <input type="text" name="descricao" placeholder="Cadastre uma nova Tarefa" value="<?php echo $descricao; ?>" required> <br><br>
            Contatar Em:
            <input type="date" name="contatoEm" required> <br><br>

			<?php 
			if($resolvido == "sim"){    
			echo "Resolvido:";
			echo "<input type='text' name='resolvido' value='$resolvido' readonly='true'> <br><br>";}
			else { ?>
			Resolvido:
			<select name="resolvido" class="editavel">
                              <option value="nao">Não</option>
                              <option value="sim">Sim</option>
            </select><br><br>
			<?php } ?>
			Data Cadastro:
			<input type="date" name="dataCadastro" placeholder="data cadastro" value="<?php echo $dataCadastro; ?>" readonly="true" class="bloqueado"><br><br>
			Data Resolvido:
			<input type="date" name="dataResolvido" placeholder="data resolvido" value="<?php echo $dataResolvido; ?>" readonly="true" class="bloqueado"><br><br>
			Data Ultimo Parecer:
            <input type="date" name="dataUltimoParecer" placeholder="data ultimo parecer" value="<?php echo $dataUltimoParecer; ?>" readonly="true" class="bloqueado"><br><br>
			
			<?php 
			if($resolvido == "sim"){    
			
			} else {
			echo "<input type='submit' value='Atualizar' class='botao'>"; } 
			?>
        </form>
		</div>




		<div class="formulario2">
        <form action="adicionarParecer.php" method="post">
			Cadastrar novo parecer <br><br>
            Descricao:
            <input type="text" name="parecerDescricao" placeholder="Cadastre novo Parecer" required> <br><br>
            Ocorrência ID:
            <input type="text" name="ocorrenciaId" placeholder="Cadastre novo parecer" value="<?php echo $idOcorrencia; ?>" readonly="true"> <br><br>
			<input type="submit" value="Atualizar" class="botaoForm1">
        </form>
		</div>





		<div class="flex-container">

<?php
//criando tabela e o cabeçalho de dados:
echo "<table>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Parecer </th>";
echo "<th> Data</th>";
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


$sql = "SELECT * FROM ocorrenciasParecer where ocorrenciaId='$idOcorrencia' order by id desc";
$total_registros = "5000";



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
	$rparecerDescricao = $registro['parecerDescricao'];
	$rocorrenciaId = $registro['ocorrenciaId'];
	$rdataParecer = $registro['dataParecer'];


	echo "<tr>";
    echo "<td>".$rid."</td>";
	echo "<td>".$rparecerDescricao."</td>";
	echo "<td>".$rdataParecer."</td>";	
	echo "</tr>";

}
mysqli_close($strcon);

echo "</table>";

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

<a href="visualizarOcorrencias.php"><input type="button" value="Voltar Tarefas" class="botao"></a>

</div>
</body>
</html>