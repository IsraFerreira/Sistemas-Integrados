<?php
echo "<div class='sessao'>";
echo "<h4>Usuário: ".$_SESSION['usuario']."</h4>";
echo "<a href='logout.php'><input type='button' value='Sair' class='botaoSessao'></a>";
echo "</div>";
?>