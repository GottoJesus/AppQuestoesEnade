<?php @session_start();
if(isset($_SESSION['login'])){
	$site = "Location: http://localhost/AppQuestoesEnade/consultarAlunos.php";
	header($site);
}else{
	header("Location: http://localhost/AppQuestoesEnade/entrar.php");
}

?>