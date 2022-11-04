<html>
     <meta charset="UTF-8">
     <head>
     <LINK REL="SHORTCUT ICON" href="imagens/logo.png">
          <link href="styles/css.css" rel="stylesheet" type="text/css">
          <title>Edição de Equipamento</title>
     </head>
     <body>
          <div class="total">
               <div class="inicial">
                    <img src="imagens/logo.png"/>

<?php
include("connection.php");


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_GET, 'quantidade', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_GET, 'preco', FILTER_SANITIZE_STRING);


?>

                    <h3>Atualizar dados do Equipamento</h3>
                    <form action="inserir.php" method="post">
                         ID:
                         <input type="int" name="id2" placeholder="ID" value="<?php echo $id; ?>" readonly="true" class="bloqueado"> <br><br>
                         <label class="editavel" id="editavel1">Nome:</label>
                         <input type="text" name="nome2" placeholder="Nome" value="<?php echo $nome; ?>" class="editavel" /> <br><br>
                         <label class="editavel">Quantidade:</label>
                         <input type="int" name="quantidade2" value="<?php echo $quantidade; ?>" class="editavel" /><h5>Não dê saída / entrada por aqui</h5><br>
                         <label class="editavel">Preço R$:</label>
                         <input type="text" name="preco2" value="<?php echo $preco; ?>" class="editavel" /><br><br>
                         <input type="submit" value="Atualizar" class="botao">
                    </form>
               </div>
          </div>
     </body>
</html>
