<?php include_once 'dao/QuestaoDAO.php';
@session_start();

$radioOpcoes = $_POST['radioOpcoes'];
$radioOpcoes = explode('_', $radioOpcoes);
$raAluno = $_SESSION['raAluno'];
$id_questao = $radioOpcoes[0];
$id_opcao = $radioOpcoes[1];

$questaoDAO = new QuestaoDAO();

$verificaResposta = $questaoDAO->verificarResposta($id_questao,$raAluno);

if($verificaResposta != false){
	echo "<script> window.alert('Questão já respondida para esse aluno.');</script>";
	//header("Location: http://localhost/AppQuestoesEnade/lançarRespostas.php");
}else{
	
	$responde = $questaoDAO->responderQuestao($id_questao, $id_opcao, $raAluno);
	if($responde != false){
		echo "<script> window.alert('Questão respondida com sucesso.');</script>";
		//header("Location: http://localhost/AppQuestoesEnade/lançarRespostas.php");
	}else{
		echo "<script> window.alert('Erro ao registrar a Resposta do aluno.');</script>";
		//header("Location: http://localhost/AppQuestoesEnade/lançarRespostas.php");
	}
}

?>