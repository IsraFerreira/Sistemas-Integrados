
<html>
    <meta charset="UTF-8">
    <head>
    <LINK REL="SHORTCUT ICON" href="imagens/logo.png">
        <link href="styles/css.css" rel="stylesheet" type="text/css">
        <title> Edicao de Produto </title>
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

                <h3>Atualizar dados do Produto</h3>


                <form action="inserirmudanca.php" method="post"><h3> 
                    ID:
                    <input type="int" name="id2" placeholder="ID" value="<?php echo $id; ?>" readonly="true" class="bloqueado" /> <br><br>
                    <label class="editavel">Nome:</label>
                    <input type="text" name="nome2" placeholder="Nome" value="<?php echo $nome; ?>" class="editavel"> <br><br>
                    Quantidade Anterior:
                    <input type="int" name="quantidade2" value="<?php echo $quantidade; ?>" readonly="true" class="bloqueado" /> <br><br>
                    <label class="editavel">Quantidade Atual:</label>
                    <input type="int" name="quantidadeacr" value="<?php echo $quantidade; ?>" class="editavel" required/> <br><br>
                    <label class="editavel">Chamado:</label>
                    <input type="int" name="chamado2" value="Informe o chamado" class="editavel" required/> <br><br>
                    <label class="editavel">Setor:</label>
                    <input type="text" name="setor2" value="Informe o setor" class="editavel" required/> <br><br>
                    Preco:
                    <input type="text" name="preco2" placeholder="preco" value="<?php echo $preco; ?>" readonly="true" class="bloqueado" /> <br><br>
                    <input type="submit" value="Atualizar" class="botao">
                </form>
            </div>
        </div>
    </body>
</html>
