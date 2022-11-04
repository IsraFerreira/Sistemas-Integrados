<?php  
include("connection.php");

  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senhaLogin = md5($_POST['senha']);
  $connect = mysql_connect($servidor,$usuario, $senha);
  $db = mysql_select_db($dbname);
    if (isset($entrar)) {
             
      $verifica = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senhaLogin'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else{
          setcookie("login",$login);
		  
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Nova entrada no Inventario";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);
          header('Location:escolha.php?login='.$login);
        }
    }
?>