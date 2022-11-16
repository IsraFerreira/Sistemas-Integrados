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
          <title>Edição de Chamado Externo</title>
     </head>
     <body>
          <div class="total">
               <div class="inicial">
               <?php include("session.php"); ?>
                    <img src="../imagens/logo.png"/>

<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$empresa = filter_input(INPUT_GET, 'empresa', FILTER_SANITIZE_STRING);
$solicitacao = filter_input(INPUT_GET, 'solicitacao', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_STRING);
$resolvido = filter_input(INPUT_GET, 'resolvido', FILTER_SANITIZE_STRING);
$dataresolvido = filter_input(INPUT_GET, 'dataresolvido', FILTER_SANITIZE_STRING);


?>

                    <h3>Atualizar dados do Chamado Ext</h3>
                    <form action="inserirChamadosExt.php" method="post">
                         <label class="editavel">ID:</label>
                         <input type="int" name="id2" placeholder="ID" value="<?php echo $id; ?>" readonly="true" class="bloqueado"> <br><br>
                         <label class="editavel" id="editavel1">Empresa:</label>
                         <input type="text" name="empresa2" placeholder="Empresa" value="<?php echo $empresa; ?>" class="editavel" /> <br><br>
                         <label class="editavel">Solicitacao:</label>
                         <input type="text" name="solicitacao2" value="<?php echo $solicitacao; ?>" class="editavel" /><br><br>
                         <label class="editavel">Data aberto:</label>
                         <input type="int" name="data2" placeholder="data" value="<?php echo $data; ?>" readonly="true" class="bloqueado"> <br><br>
                         <label class="editavel">Resolvido:</label>
                         <select name="resolvido2" class="editavel">
                              <option value="nao">Não</option>
                              <option value="sim">Sim</option>
                         </select><br><br>
                         <input type="submit" value="Atualizar" class="botao">
                    </form>
               </div>
          </div>
     </body>
</html>
