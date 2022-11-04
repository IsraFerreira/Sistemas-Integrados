<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Planilha</title>
	<head>
	<body>
		<?php
		$parametro = filter_input(INPUT_GET, "parametro");
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'InventarioFiltro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="11">Planilha Transições Inventario Filtrada</tr>';
		$html .= '</tr>';
		
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Quantidadeanterior</b></td>';
		$html .= '<td><b>Quantidadetotal</b></td>';
		$html .= '<td><b>chamado</b></td>';
		$html .= '<td><b>setor</b></td>';
		$html .= '<td><b>ip</b></td>';
		$html .= '<td><b>hora</b></td>';
		$html .= '<td><b>mensagem</b></td>';
		$html .= '<td><b>preco</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * from produtosretirada where nome like ('%$parametro%') or ID like ('%$parametro%') or chamado like ('%$parametro%') or setor like ('%$parametro%') or ip like ucase('%$parametro%') or mensagem like ('%$parametro%') order by hora desc";

		$resultado = mysqli_query($conn , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			if($row["hora"] >= ("2020-05-01 00:00:00")){
			$html .= '<tr>';
			$html .= '<td>'.$row["ID"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["quantidadeant"].'</td>';
			$html .= '<td>'.$row["quantidadetotal"].'</td>';
			$html .= '<td>'.$row["chamado"].'</td>';
			$html .= '<td>'.$row["setor"].'</td>';
			$html .= '<td>'.$row["ip"].'</td>';
			$html .= '<td>'.$row["hora"].'</td>';
			$html .= '<td>'.$row["mensagem"].'</td>';
			if($row["mensagem"] == "Produto Acrescentado"){
			$html .= '<td>'.$row["preco"].'</td>';}
			else {
			$html .= '<td> -'.$row["preco"].'</td>';	}
			$html .= '</tr>';
			;
			}
			else{}
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>