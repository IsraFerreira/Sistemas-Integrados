<?php
include('conexao.php');
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}


$escolha = filter_input(INPUT_GET, 'escolha', FILTER_SANITIZE_STRING);
$data = $_POST['data'];
$usuario = $_POST['usuario'];
$paginas = $_POST['paginas'];
$copias = $_POST['copias'];
$calculo = $_POST['calculo'];
$setor = $_POST['setor'];
$nomedodocumento = $_POST['nomedodocumento'];
$computador = $_POST['computador'];



$ano1 = 2024;
$ano2 = 2023;
if($escolha == 1){
$tabela = '1janeiro2024';
$ano = $ano1;
$mes = 'janeiro';
} else if($escolha == 2){
$tabela = '2fevereiro2024';
$ano = $ano1;
$mes = 'fevereiro';
} else if($escolha == 3){
  $tabela = '3marco2024';
  $ano = $ano1;
  $mes = 'marco';
} else if($escolha == 4){
  $tabela = '4abril2024';
  $ano = $ano1;
  $mes = 'abril';
  } else if($escolha == 5){
    $tabela = '5maio2024';
    $ano = $ano1;
    $mes = 'maio';
    } else if($escolha == 6){
      $tabela = '6junho2024';
      $ano = $ano1;
      $mes = 'junho';
      } else if($escolha == 7){
        $tabela = '7julho2024';
        $ano = $ano1;
        $mes = 'julho';
        } else if($escolha == 8){
          $tabela = '8agosto2024';
          $ano = $ano1;
          $mes = 'agosto';
          } else if($escolha == 9){
            $tabela = '9setembro2024';
            $ano = $ano1;
            $mes = 'setembro';
            } else if($escolha == 10){
              $tabela = '10outubro2024';
              $ano = $ano1;
              $mes = 'outubro';
              } else if($escolha == 11){
                $tabela = '11novembro2024';
                $ano = $ano1;
                $mes = 'novembro';
                } else if($escolha == 12){
                  $tabela = '12dezembro2024';
                  $ano = $ano1;
                  $mes = 'dezembro';
                  } else if($escolha == 13){
                    $tabela = '13janeiro2023';
                    $ano = $ano2;
                    $mes = 'janeiro';
                    } else if($escolha == 14){
                      $tabela = '14fevereiro2023';
                      $ano = $ano2;
                      $mes = 'fevereiro';
                      } else if($escolha == 15){
                        $tabela = '15marco2023';
                        $ano = $ano2;
                        $mes = 'marco';
                        } else if($escolha == 16){
                          $tabela = '16abril2023';
                          $ano = $ano2;
                          $mes = 'abril';
                          } else if($escolha == 17){
                            $tabela = '17maio2023';
                            $ano = $ano2;
                            $mes = 'maio';
                            } else if($escolha == 18){
                              $tabela = '18junho2023';
                              $ano = $ano2;
                              $mes = 'junho';
                              } else if($escolha == 19){
                                $tabela = '19julho2023';
                                $ano = $ano2;
                                $mes = 'julho';
                                } else if($escolha == 20){
                                  $tabela = '20agosto2023';
                                  $ano = $ano2;
                                  $mes = 'agosto';
                                  } else if($escolha == 21){
                                    $tabela = '21setembro2023';
                                    $ano = $ano2;
                                    $mes = 'setembro';
                                    } else if($escolha == 22){
                                      $tabela = '22outubro2023';
                                      $ano = $ano2;
                                      $mes = 'outubro';
                                      } else if($escolha == 23){
                                        $tabela = '23novembro2023';
                                        $ano = $ano2;
                                        $mes = 'novembro';
                                        } else if($escolha == 24){
                                          $tabela = '24dezembro2023';
                                          $ano = $ano2;
                                          $mes = 'dezembro';
                                          }



										  $servidor = "localhost";
										  $usuario = "root";
										  $senha = "9L@d@$9";
										  $dbname = "impressora";
										  
$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>
<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="../imagens/logo.png">
<link href="../styles/tabela.css" rel="stylesheet" type="text/css">
<?php echo"<title> Tabela $mes de $ano </title>"; ?>
</head>
<body>
<div class="inicial">
	<?php include("session.php"); ?>
		<img src="../imagens/logo.png"/>

<!-- A PARTIR DE AGORA SERÃO OS GRUPOS COM 8 -->

<?php 
//com tudo
if($data == "data" && $usuario == "usuario" && $paginas == "paginas" && $copias == "copias" && $calculo == "calculo" && $setor == "setor" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){

echo "<table>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuario </th>";
echo "<th> Paginas </th>";
echo "<th> Copias </th>";
echo "<th> Calculo </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";

$parametro = filter_input(INPUT_GET, "parametro");


if($parametro){
$sql = "SELECT * from $tabela where user like ucase('$parametro%') or printer like ucase('$parametro%') or client like ucase('$parametro%') order by printer";
}
else{
$sql = "SELECT * FROM $tabela order by printer";
}

$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['pages'];
	$rcopies = $registro['copies'];
	$rcalculo = $registro['calculo'];
	$rprinter = $registro['printer'];
	$rdocumentname = $registro['documentname'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rcalculo."</td>";
	$cont1 = $cont1+$rpages;
	$cont2 = $cont2+$rcopies;
	$cont3 = $cont3+$rcalculo;
	echo "<td>".$rprinter."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
	echo "<td>".$rclient."</td>";
    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td>".$cont3."</td>";
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<!-- A PARTIR DE AGORA SERÃO OS GRUPOS COM 7 -->

<?php
// tudo menos data 
if($usuario == "usuario" && $paginas == "paginas" && $copias == "copias" && $calculo == "calculo" && $setor == "setor" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuario </th>";
echo "<th> Paginas </th>";
echo "<th> Copias </th>";
echo "<th> Calculo </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT user, sum(pages), sum(copies), sum(calculo), printer, documentname, client FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$ruser = $registro['user'];
	$rpages = $registro['sum(pages)'];
	$rcopies = $registro['sum(copies)'];
	$rcalculo = $registro['sum(calculo)'];
	$rprinter = $registro['printer'];
	$rdocumentname = $registro['documentname'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rcalculo."</td>";
	echo "<td>".$rprinter."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
	echo "<td>".$rclient."</td>";
	$cont1 = $cont1+$rpages;
$cont2 = $cont2+$rcopies;
$cont3 = $cont3+$rcalculo;

    echo "</tr>";
	
	
}


echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td>".$cont3."</td>";
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";


mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<?php 
//tudo menos usuario
if($data == "data" && $paginas == "paginas" && $copias == "copias" && $calculo == "calculo" && $setor == "setor" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Paginas </th>";
echo "<th> Copias </th>";
echo "<th> Calculo </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, sum(pages), sum(copies), sum(calculo), printer, documentname, client FROM $tabela Group by time";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$rpages = $registro['sum(pages)'];
	$rcopies = $registro['sum(copies)'];
	$rcalculo = $registro['sum(calculo)'];
	$rprinter = $registro['printer'];
	$rdocumentname = $registro['documentname'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rcalculo."</td>";
	echo "<td>".$rprinter."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
	echo "<td>".$rclient."</td>";
    echo "</tr>";
	$cont1 = $cont1+$rpages;
$cont2 = $cont2+$rcopies;
$cont3 = $cont3+$rcalculo;

	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td>".$cont3."</td>";
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";
mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<?php 
// todos menos paginas
if($data == "data" && $usuario == "usuario" && $copias == "copias" && $calculo == "calculo" && $setor == "setor" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
		echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Copias </th>";
echo "<th> Calculo </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(copies), sum(calculo), printer, documentname, client FROM $tabela Group by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 = 0;
$cont2 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rcopies = $registro['sum(copies)'];
	$rcalculo = $registro['sum(calculo)'];
	$rprinter = $registro['printer'];
	$rdocumentname = $registro['documentname'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rcalculo."</td>";
	echo "<td>".$rprinter."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
	echo "<td>".$rclient."</td>";
    echo "</tr>";
	$cont1 = $cont1+$rcopies;
    $cont2 = $cont2+$rcalculo;
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<?php 
// todos menos copias
if($data == "data" && $usuario == "usuario" && $paginas == "paginas" && $calculo == "calculo" && $setor == "setor" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
		echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Calculo </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(pages), sum(calculo), printer, documentname, client FROM $tabela Group by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 = 0;
$cont2 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['sum(pages)'];
	$rcalculo = $registro['sum(calculo)'];
	$rprinter = $registro['printer'];
	$rdocumentname = $registro['documentname'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcalculo."</td>";
	echo "<td>".$rprinter."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
	echo "<td>".$rclient."</td>";
    echo "</tr>";
	
$cont1 = $cont1+$rpages;
$cont2 = $cont2+$rcalculo;

	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";
mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<?php 
// todos menos calculo
if($data == "data" && $usuario == "usuario" && $paginas == "paginas" && $copias == "copias" && $setor == "setor" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(pages), sum(copies), printer, documentname, client FROM $tabela Group by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 = 0;
$cont2 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['sum(pages)'];
	$rcopies = $registro['sum(copies)'];
	$rprinter = $registro['printer'];
	$rdocumentname = $registro['documentname'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rprinter."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
	echo "<td>".$rclient."</td>";
    echo "</tr>";
	
	
$cont1 = $cont1+$rpages;
$cont2 = $cont2+$rcopies;
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<?php 
// todos menos setor
if($data == "data" && $usuario == "usuario" && $paginas == "paginas" && $copias == "copias" && $calculo == "calculo" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "<th> Calculo </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(pages), sum(copies), sum(calculo), documentname, client FROM $tabela Group by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

$cont1 = 0;
$cont2 = 0;
$cont3 = 0;

while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['sum(pages)'];
	$rcopies = $registro['sum(copies)'];
	$rcalculo = $registro['sum(calculo)'];
	$rdocumentname = $registro['documentname'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rcalculo."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
	echo "<td>".$rclient."</td>";
    echo "</tr>";
	
$cont1 = $cont1+$rpages;
$cont2 = $cont2+$rcopies;
$cont3 = $cont3+$rcalculo;

	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td>".$cont3."</td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";
mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<?php 
// todos menos nome do documento
if($data == "data" && $usuario == "usuario" && $paginas == "paginas" && $copias == "copias" && $calculo == "calculo" && $setor == "setor" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "<th> Calculo </th>";
echo "<th> Setor </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(pages), sum(copies), sum(calculo), printer, client FROM $tabela Group by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['sum(pages)'];
	$rcopies = $registro['sum(copies)'];
	$rcalculo = $registro['sum(calculo)'];
	$rprinter = $registro['printer'];
	$rclient = $registro['client'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rcalculo."</td>";
	echo "<td>".$rprinter."</td>";
	echo "<td>".$rclient."</td>";
    echo "</tr>";
	
$cont1 = $cont1+$rpages;
$cont2 = $cont2+$rcopies;
$cont3 = $cont3+$rcalculo;

	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td>".$cont3."</td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";
mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<?php 
// todos menos computador
if($data == "data" && $usuario == "usuario" && $paginas == "paginas" && $copias == "copias" && $calculo == "calculo" && $setor == "setor" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "<th> Calculo </th>";
echo "<th> Setor </th>";
echo "<th> Nome do documento </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(pages), sum(copies), sum(calculo), printer, documentname FROM $tabela Group by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['sum(pages)'];
	$rcopies = $registro['sum(copies)'];
	$rcalculo = $registro['sum(calculo)'];
	$rprinter = $registro['printer'];
	$rdocumentname = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rpages."</td>";
	echo "<td>".$rcopies."</td>";
	echo "<td>".$rcalculo."</td>";
	echo "<td>".$rprinter."</td>";
	if($rdocumentname == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$rdocumentname."</td>";}
    echo "</tr>";
	
$cont1 = $cont1+$rpages;
$cont2 = $cont2+$rcopies;
$cont3 = $cont3+$rcalculo;

	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td>".$cont3."</td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";
mysqli_close($con);
echo "</table>";



echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;

}
?>

<!-- A PARTIR DE AGORA SERÃO OS GRUPOS COM 6 -->


<!-- (NEXT TOTAL)A PARTIR DE AGORA SERÃO OS GRUPOS COM 3 -->

<?php
if($data == "data" && $usuario == "usuario" && $paginas == "paginas"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(pages) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['sum(pages)'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
    echo "<td>".$rpages."</td>";
$cont = $cont+$rpages;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $usuario == "usuario" && $copias == "copias"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(copies) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rpages = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
    echo "<td>".$rcopies."</td>";
$cont = $cont+$rcopies;


    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $usuario == "usuario" && $calculo == "calculo"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT time, user, sum(calculo) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$rtime = $registro['time'];
	$ruser = $registro['user'];
	$rcalculo = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$rtime."</td>";
	echo "<td>".$ruser."</td>";
    echo "<td>".$rcalculo."</td>";
$cont = $cont+$rcalculo;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $usuario == "usuario" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT time, user, printer FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['user'];
	$r3 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $usuario == "usuario" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT time, user, documentname FROM $tabela ORDER BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['user'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $usuario == "usuario" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, user, client FROM $tabela ORDER BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['user'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $paginas == "paginas" && $copias == "copias"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT time, sum(pages), sum(copies) FROM $tabela GROUP BY time";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $paginas == "paginas" && $calculo == "calculo"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Páginas </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT time, sum(pages), sum(calculo) FROM $tabela GROUP BY time";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $paginas == "paginas" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Páginas </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT time, sum(pages), printer FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td></td>";
echo"</tr>";


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $paginas == "paginas" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Páginas </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT time, sum(pages), documentname FROM $tabela GROUP BY time";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
$cont1 = $cont1+$r2;
    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td></td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $paginas == "paginas" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Páginas </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, sum(pages), client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td></td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $copias == "copias" && $calculo == "calculo"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cópias </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT time, sum(copies), sum(calculo) FROM $tabela GROUP BY time";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $copias == "copias" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cópias </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT time, sum(copies), printer FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td></td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}

?>

<?php
if($data == "data" && $copias == "copias" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cópias </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT time, sum(copies), documentname FROM $tabela GROUP BY time";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"<td></td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $copias == "copias" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cópias </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, sum(copies), client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $calculo == "calculo" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cálculo </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT time, sum(calculo), printer FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $calculo == "calculo" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cálculo </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT time, sum(calculo), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $calculo == "calculo" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cálculo </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, sum(calculo), client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $setor == "setor" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT time, printer, documentname FROM $tabela GROUP BY time";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['printer'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $setor == "setor" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Setor </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, printer, client FROM $tabela ORDER BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['printer'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($data == "data" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, documentname, client FROM $tabela ORDER BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['documentname'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	if($r2 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r2."</td>";}
    echo "<td>".$r3."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $paginas == "paginas" && $copias == "copias"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT user, sum(pages), sum(copies) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $paginas == "paginas" && $calculo == "calculo"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT user, sum(pages), sum(calculo) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

$cont1 == 0;
$cont2 == 0;

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $paginas == "paginas" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT user, sum(pages), printer FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $paginas == "paginas" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT user, sum(pages), documentname FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $paginas == "paginas" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT user, sum(pages), client FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $copias == "copias" && $calculo == "calculo"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cópias </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT user, sum(copies), sum(calculo) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;



    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $copias == "copias" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cópias </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT user, sum(copies), printer FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $copias == "copias" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cópias </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT user, sum(copies), documentname FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $copias == "copias" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cópias </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT user, sum(copies), client FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $calculo == "calculo" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cálculo </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT user, sum(calculo), printer FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $calculo == "calculo" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cálculo </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT user, sum(calculo), documentname FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $calculo == "calculo" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cálculo </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT user, sum(calculo), client FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $setor == "setor" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT user, printer, documentname FROM $tabela order by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['printer'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $setor == "setor" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Setor </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT user, printer, client FROM $tabela order by printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['printer'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($usuario == "usuario" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Nome do Documento </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT user, documentname, client FROM $tabela order by user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	$r2 = $registro['documentname'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	if($r2 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r2."</td>";}
    echo "<td>".$r3."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>



<?php
if($paginas == "paginas" && $copias == "copias" && $calculo == "calculo"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT sum(pages), sum(copies), sum(calculo) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['sum(pages)'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";

$cont1 = $cont1+$r1;
$cont2 = $cont2+$r2;
$cont3 = $cont3+$r3;


    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td></td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"<td>".$cont3."</td>";
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $copias == "copias" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT printer, sum(pages), sum(copies) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $copias == "copias" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Documento </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT documentname, sum(pages), sum(copies) FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['documentname'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $copias == "copias" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT client, sum(pages), sum(copies) FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;

while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['client'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $calculo == "calculo" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Páginas </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT printer, sum(pages), sum(calculo) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $calculo == "calculo" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Documento </th>";
echo "<th> Páginas </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT documentname, sum(pages), sum(calculo) FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['documentname'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	if($r1 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r1."</td>";}
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $setor == "setor" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Páginas </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT printer, sum(pages), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $setor == "setor" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Páginas </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT printer, sum(pages), client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($paginas == "paginas" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Páginas </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT client, sum(pages), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['client'];
	$r2 = $registro['sum(pages)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($copias == "copias" && $calculo == "calculo" && $setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Cópias </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT printer, sum(copies), sum(calculo) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($copias == "copias" && $calculo == "calculo" && $nomedodocumento == "nomedodocumento"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Documento </th>";
echo "<th> Cópias </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT documentname, sum(copies), sum(calculo) FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['documentname'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	if($r1 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r1."</td>";}
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($copias == "copias" && $calculo == "calculo" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Cópias </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT client, sum(copies), sum(calculo) FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

$cont1 == 0;
$cont2 == 0;

while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['client'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	
$cont1 = $cont1+$r2;
$cont2 = $cont2+$r3;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($copias == "copias" && $setor == "setor" && $nomedodocumento == "nomedodocumento"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Cópias </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT printer, sum(copies), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($copias == "copias" && $setor == "setor" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Cópias </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT printer, sum(copies), client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($copias == "copias" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Cópias </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT client, sum(copies), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['client'];
	$r2 = $registro['sum(copies)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($calculo == "calculo" && $setor == "setor" && $nomedodocumento == "nomedodocumento"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Cálculo </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT printer, sum(calculo), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($calculo == "calculo" && $setor == "setor" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Cálculo </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT printer, sum(calculo), client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    echo "<td>".$r3."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($calculo == "calculo" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Cálculo </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT client, sum(calculo), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['client'];
	$r2 = $registro['sum(calculo)'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php
if($setor == "setor" && $nomedodocumento == "nomedodocumento" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Cálculo </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT client, printer, documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
    $r1 = $registro['printer'];
	$r2 = $registro['client'];
	$r3 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	echo "<td>".$r2."</td>";
    if($r3 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r3."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<!-- A PARTIR DE AGORA SERÃO OS GRUPOS COM 2 -->

<?php 
if($data == "data" && $usuario == "usuario"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Usuário </th>";
echo "</tr>";


$sql = "SELECT time, user FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['user'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($data == "data" && $paginas == "paginas"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Páginas </th>";
echo "</tr>";


$sql = "SELECT time, pages FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['pages'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($data == "data" && $copias == "copias"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT time, copies FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['copies'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($data == "data" && $calculo == "calculo"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT time, calculo FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['calculo'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($data == "data" && $setor == "setor"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT time, printer FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($data == "data" && $nomedodocumento == "nomedodocumento"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT time, documentname FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    if($r2 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r2."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($data == "data" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT time, client FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	$r2 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($usuario == "usuario" && $paginas == "paginas"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Páginas </th>";
echo "</tr>";


$sql = "SELECT user, sum(pages) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(pages)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($usuario == "usuario" && $copias == "copias"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT user, sum(copies) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($usuario == "usuario" && $calculo == "calculo"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT user, sum(calculo) FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['user'];
	$r2 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($usuario == "usuario" && $setor == "setor"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT user, printer FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['user'];
	$r2 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($usuario == "usuario" && $nomedodocumento == "nomedodocumento"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT user, documentname FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['user'];
	$r2 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    if($r2 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r2."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($usuario == "usuario" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT user, client FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['user'];
	$r2 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($paginas == "paginas" && $copias == "copias"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Páginas </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT sum(pages), sum(copies) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

$cont1 == 0;
$cont2 == 0;

while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['sum(pages)'];
	$r2 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	
$cont1 = $cont1+$r1;
$cont2 = $cont2+$r2;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"</tr>";
echo"<tr>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($paginas == "paginas" && $calculo == "calculo"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Páginas </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT sum(pages), sum(calculo) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;

while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['sum(pages)'];
	$r2 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	
$cont1 = $cont1+$r1;
$cont2 = $cont2+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"</tr>";
echo"<tr>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($paginas == "paginas" && $setor == "setor"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Páginas </th>";
echo "</tr>";


$sql = "SELECT printer, sum(pages) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['printer'];
	$r2 = $registro['sum(pages)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($paginas == "paginas" && $nomedodocumento == "nomedodocumento"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Documento </th>";
echo "<th> Páginas </th>";
echo "</tr>";


$sql = "SELECT documentname, sum(pages) FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['documentname'];
	$r2 = $registro['sum(pages)'];
	echo "<tr>";
	if($r1 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r1."</td>";}
    echo "<td>".$r2."</td>";
$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($paginas == "paginas" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Páginas </th>";
echo "</tr>";


$sql = "SELECT client, sum(pages) FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['client'];
	$r2 = $registro['sum(pages)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($copias == "copias" && $calculo == "calculo"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Cópias </th>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT sum(copies), sum(calculo) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont1 == 0;
$cont2 == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['sum(copies)'];
	$r2 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	
$cont1 = $cont1+$r1;
$cont2 = $cont2+$r2;

    echo "</tr>";
	
	
}
echo"<tr>";
echo"<td>Total</td>";
echo"</tr>";
echo"<tr>";
echo"<td>".$cont1."</td>";
echo"<td>".$cont2."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($copias == "copias" && $setor == "setor"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT sum(copies), printer FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['printer'];
	$r2 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($copias == "copias" && $nomedodocumento == "nomedodocumento"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Documento </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT sum(copies), documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['documentname'];
	$r2 = $registro['sum(copies)'];
	echo "<tr>";
	if($r1 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r1."</td>";}
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($copias == "copias" && $computador == "computador"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT sum(copies), client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))
{	
	$r1 = $registro['client'];
	$r2 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($calculo == "calculo" && $setor == "setor"){
echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Calculo </th>";
echo "</tr>";


$sql = "SELECT printer, sum(calculo) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['printer'];
	$r2 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($calculo == "calculo" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Documento </th>";
echo "<th> Calculo </th>";
echo "</tr>";


$sql = "SELECT documentname, sum(calculo) FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['documentname'];
	$r2 = $registro['sum(calculo)'];
	echo "<tr>";
	if($r1 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r1."</td>";}
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($calculo == "calculo" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Calculo </th>";
echo "</tr>";


$sql = "SELECT client, sum(calculo) FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['client'];
	$r2 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
	$cont = $cont+$r2;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($setor == "setor" && $nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT printer, documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['printer'];
	$r2 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    if($r2 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r2."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($setor == "setor" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT printer, client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['printer'];
	$r2 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "<td>".$r2."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($nomedodocumento == "nomedodocumento" && $computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT client, documentname FROM $tabela ORDER BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['client'];
	$r2 = $registro['documentname'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    if($r2 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r2."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<!--a partir daqui serão com 1 apenas -->

<?php 
if($data == "data"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Data </th>";
echo "</tr>";


$sql = "SELECT time FROM $tabela";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['time'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($usuario == "usuario"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Usuário </th>";
echo "</tr>";


$sql = "SELECT user FROM $tabela GROUP BY user";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['user'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($paginas == "paginas"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Páginas </th>";
echo "</tr>";


$sql = "SELECT sum(pages) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;


while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['sum(pages)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
	$cont = $cont+$r1;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"</tr>";
echo"<tr>";
echo"<td>".$cont."</td>";
echo"</tr>";
mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($copias == "copias"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Cópias </th>";
echo "</tr>";


$sql = "SELECT sum(copies) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['sum(copies)'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
$cont = $cont+$r1;
    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"</tr>";
echo"<tr>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($calculo == "calculo"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Cálculo </th>";
echo "</tr>";


$sql = "SELECT sum(calculo) FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");
$cont == 0;
while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$r1."</td>"; 
$cont = $cont+$r1;

    echo "</tr>";
	
	
}

echo"<tr>";
echo"<td>Total</td>";
echo"</tr>";
echo"<tr>";
echo"<td>".$cont."</td>";
echo"</tr>";

mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($setor == "setor"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Setor </th>";
echo "</tr>";


$sql = "SELECT printer FROM $tabela GROUP BY printer";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['printer'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($nomedodocumento == "nomedodocumento"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Documento </th>";
echo "</tr>";


$sql = "SELECT documentname FROM $tabela GROUP BY documentname";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['documentname'];
	echo "<tr>";
	if($r1 == "DataWindow"){
	echo "<td>Salux</td>";}
	else{
	echo "<td>".$r1."</td>";}
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>

<?php 
if($computador == "computador"){
	echo "<table border = 1>";
echo "<tr>";
echo "<th> Computador </th>";
echo "</tr>";


$sql = "SELECT client FROM $tabela GROUP BY client";
$resultado = mysqli_query($con, $sql) or die ("Erro ao tentar cadastrar registro");

while ($registro = mysqli_fetch_array($resultado))

{	
	$r1 = $registro['client'];
	echo "<tr>";
	echo "<td>".$r1."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a></center>";
die;
}
?>


</div>
</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>
