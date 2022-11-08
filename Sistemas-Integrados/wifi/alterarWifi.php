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
          <title>Edição de Equipamento</title>
     </head>
     <body>
          <div class="total">
               <div class="inicial">
               <?php include("session.php"); ?>
                    <img src="../imagens/logo.png"/>

<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$setorleito = filter_input(INPUT_GET, 'setorleito', FILTER_SANITIZE_STRING);
$aparelho = filter_input(INPUT_GET, 'aparelho', FILTER_SANITIZE_STRING);


?>

                    <h3>Atualizar dados do Wifi</h3>
                    <form action="inserirWifi.php" method="post">
                         <label class="editavel">ID:</label>
                         <input type="int" name="id2" placeholder="ID" value="<?php echo $id; ?>" readonly="true" class="bloqueado"> <br><br>
                         <label class="editavel" id="editavel1">Nome:</label>
                         <input type="text" name="nome2" placeholder="Nome" value="<?php echo $nome; ?>" class="editavel" /> <br><br>
                         <label class="editavel">Setor / Leito:</label>
                         <input type="text" name="setorleito2" value="<?php echo $setorleito; ?>" class="editavel" /><br><br>
                         <label class="editavel">Aparelho:</label>
                         <input type="text" name="aparelho2" value="<?php echo $aparelho; ?>" class="editavel" /><br><br>
                         <input type="submit" value="Atualizar" class="botao">
                    </form>
               </div>
          </div>
     </body>
</html>
