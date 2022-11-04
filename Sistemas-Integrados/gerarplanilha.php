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
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Inventario.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Inventario</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Quantidade</b></td>';
		$html .= '<td><b>Preco</b></td>';
		$html .= '<td><b>Valor total</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM produtos";
		$resultado = mysqli_query($conn , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["ID"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$row["preco"].'</td>';
			$preco = $row["preco"];
			$quantidade = $row["quantidade"];
			$total = ($preco * $quantidade);
			$html .= '<td>'.$total.'</td>';
			$html .= '</tr>';
			;
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