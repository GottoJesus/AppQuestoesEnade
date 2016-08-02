<?php 
@session_start();

// unset($_SESSION['login']);
// unset($_SESSION['senha']);

unset($_POST['login']);
unset($_POST['senha']);

@session_destroy();
header("Location: http://localhost/AppQuestoesEnade/index.php");
?>