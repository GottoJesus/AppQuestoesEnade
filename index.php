<?php @session_start();
if(isset($_SESSION['login'])){
	
	if($_SESSION['tipo_usuario'] == 'aluno'){
		$site = "Location: http://localhost/AppQuestoesEnade/listarQuestoes.php";
	}else{
		$site = "Location: http://localhost/AppQuestoesEnade/consultarAlunos.php";
	}
	header($site);
}else{
	header("Location: http://localhost/AppQuestoesEnade/entrar.php");
}

?>