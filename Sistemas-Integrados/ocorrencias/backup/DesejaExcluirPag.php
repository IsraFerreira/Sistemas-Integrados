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

<title>Excluir Tarefa</title>
</head>
<body>
  <?php include("session.php"); 

$id = $_GET['id'];

$query = "SELECT * from ocorrencias WHERE id=$id";
$todos = mysqli_query($conn, "$query");
$totalregistros = mysqli_num_rows($todos);

$resultado = mysqli_query($conn, "$query") or die ("Erro ao tentar excluir registro");

while ($registro = mysqli_fetch_array($resultado)) {
  $id = $registro['id']; 
  $desc = $registro['descricao'];
  
}

?>
<div class="container">
   <h1>Você tem certeza que deseja excluir esta tarefa?</h1>
    <div class="bloco">

    <p>Conteudo da Tarefa</p>
      <textarea type="textarea" name="descricao" rows="15" class="descricao" readonly><?php echo $desc; ?></textarea> <br>
      <div class="conteudo">
      
      <h2> Após ser excluída, a página não poderá ser resgatada<h2>
        <h3>Deseja continuar?</h3>
        
      <?php
              echo "<a href='apagarOcorrencia.php?id=".$id."' class='excluir'>Excluir pagina</a>";
              echo "<a href='visualizarOcorrencias.php' class='cancelar'>Cancelar</a>";
        ?>
        </div>
  
  </div>
</body>
</html>