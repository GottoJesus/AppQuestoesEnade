<?php include_once 'dao/QuestaoDAO.php';
@session_start();
$ano = $_POST['ano'];
$semestre = $_SESSION['semestre'];
$curso = $_SESSION['curso'];


$questaoDAO = new QuestaoDAO();

if($ano == "default"){
	if($_SESSION['tipo_usuario'] == 'aluno'){
		echo '<script> window.alert("Por favor selecione uma opção válida."); window.location.href="http://localhost/AppQuestoesEnade/listarQuestoes.php";</script>';
	}else{
		echo '<script> window.alert("Por favor selecione uma opção válida."); window.location.href="http://localhost/AppQuestoesEnade/consultarAlunos.php";</script>';
	}
	
}else{
	
	$listaQuestoes = $questaoDAO->find($curso, $ano, $semestre);
	if($listaQuestoes){
		$_SESSION['listaQuestoes'] = $listaQuestoes;
		$_SESSION['ano'] = $ano;
		header("Location: http://localhost/AppQuestoesEnade/lancarRespostas.php");
	}else{
		if($_SESSION['tipo_usuario'] == 'aluno'){
			echo '<script> window.alert("Por favor selecione uma opção válida."); window.location.href="http://localhost/AppQuestoesEnade/listarQuestoes.php";</script>';
		}else{
			echo '<script> window.alert("Não há questões para estes parâmetros."); window.location.href="http://localhost/AppQuestoesEnade/consultarAlunos.php";</script>';
		}
		
	}
}


?>