<?php include_once 'dao/QuestaoDAO.php';
@session_start();
$ano = $_POST['ano'];
$semestre = $_SESSION['semestre'];
$curso = $_SESSION['curso'];


$questaoDAO = new QuestaoDAO();

if($ano == "default"){
	echo "<script> window.alert('Por favor selecione uma opção válida.');</script>";
	header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
}else{
	
	$listaQuestoes = $questaoDAO->find($curso, $ano, $semestre);
	if($listaQuestoes){
		$_SESSION['listaQuestoes'] = $listaQuestoes;
		header("Location: http://localhost/AppQuestoesEnade/lancarRespostas.php");
	}else{
		echo "<script> window.alert('Não há questões para estes parâmetros.');</script>";
		header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
	}
}


?>