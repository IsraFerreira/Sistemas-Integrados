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
          <link href="../styles/css.css" rel="stylesheet" type="text/css">
          <title>Edição de Ramal</title>
     </head>
     <body>
          <div class="total">
               <div class="inicial">
               <?php include("session.php"); ?>
                    <img src="../imagens/logo.png"/>

<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$setor = filter_input(INPUT_GET, 'setor', FILTER_SANITIZE_STRING);
$predio = filter_input(INPUT_GET, 'predio', FILTER_SANITIZE_STRING);


?>

                    <h3>Atualizar dados do Ramal</h3>
                    <form action="inserirWifi.php" method="post">
                         <label class="editavel">ID:</label>
                         <input type="int" name="id2" placeholder="ID" value="<?php echo $id; ?>" readonly="true" class="bloqueado"> <br><br>
                         <label class="editavel" id="editavel1">Nome:</label>
                         <input type="text" name="nome2" placeholder="Nome" value="<?php echo $nome; ?>" class="editavel" /> <br><br>
                         <label class="editavel">Setor:</label>
                         <input type="text" name="setor2" value="<?php echo $setor; ?>" class="editavel" /><br><br>
                         <label class="editavel">Predio:</label>
                         <input type="text" name="predio2" value="<?php echo $predio; ?>" class="editavel" /><br><br>
                         <input type="submit" value="Atualizar" class="botao">
                    </form>
               </div>
          </div>
     </body>
</html>
