<?php
include("conexao.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../login.html';</script>";  
}


$escolha = filter_input(INPUT_GET, 'escolha', FILTER_SANITIZE_STRING);
$ano1 = 2022;
$ano2 = 2023;

if($escolha == 1){
$tabela = '1janeiro2022';
$ano = $ano1;
$mes = 'janeiro';
} else if($escolha == 2){
$tabela = '2fevereiro2022';
$ano = $ano1;
$mes = 'fevereiro';
} else if($escolha == 3){
  $tabela = '3marco2022';
  $ano = $ano1;
  $mes = 'marco';
} else if($escolha == 4){
  $tabela = '4abril2022';
  $ano = $ano1;
  $mes = 'abril';
  } else if($escolha == 5){
    $tabela = '5maio2022';
    $ano = $ano1;
    $mes = 'maio';
    } else if($escolha == 6){
      $tabela = '6junho2022';
      $ano = $ano1;
      $mes = 'junho';
      } else if($escolha == 7){
        $tabela = '7julho2022';
        $ano = $ano1;
        $mes = 'julho';
        } else if($escolha == 8){
          $tabela = '8agosto2022';
          $ano = $ano1;
          $mes = 'agosto';
          } else if($escolha == 9){
            $tabela = '9setembro2022';
            $ano = $ano1;
            $mes = 'setembro';
            } else if($escolha == 10){
              $tabela = '10outubro2022';
              $ano = $ano1;
              $mes = 'outubro';
              } else if($escolha == 11){
                $tabela = '11novembro2022';
                $ano = $ano1;
                $mes = 'novembro';
                } else if($escolha == 12){
                  $tabela = '12dezembro2022';
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


?>
<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="../imagens/logo.png">
<link href="../styles/tabela.css" rel="stylesheet" type="text/css">
<?php echo"<title> Top Impressões $mes de $ano </title>"; ?>
</head>
<body>
<div class="inicial">
	<?php include("session.php"); ?>
		<img src="../imagens/logo.png"/>


<?php 

echo "<h3> Top Impressoes $mes de $ano </h3>";
echo "<table>";
echo "<tr>";
echo "<th> Posicao </th>";
echo "<th> Setor </th>";
echo "<th> Usuario </th>";
echo "<th> Calculo </th>";
echo "</tr>";


$sql = "SELECT printer, user, sum(calculo) FROM $tabela group by user order by sum(calculo) desc";


$cont = 0;
$resultado = mysqli_query($conn, $sql) or die ("Erro ao tentar realizar registro");
while ($registro = mysqli_fetch_array($resultado))

{	
    $cont = $cont + 1;
    $rprinter = $registro['printer'];
	$ruser = $registro['user'];
	$rcalculo = $registro['sum(calculo)'];
	echo "<tr>";
	echo "<td>".$cont."</td>";
	echo "<td>".$rprinter."</td>";
	echo "<td>".$ruser."</td>";
	echo "<td>".$rcalculo."</td>";
    echo "</tr>";
	
	
}


mysqli_close($con);
echo "</table>";

echo "<br>";
echo "<br>";
echo "<center>";
echo "<a href='escolha.php?escolha=$escolha'><input type='button' value='Voltar' class='botao'></a>   <a href='logmeses.php'><input type='button' value='Escolher Mes' class='botao'></a>";

?>
</div>
</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>
