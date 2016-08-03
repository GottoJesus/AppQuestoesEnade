<?php include_once 'dao/QuestaoDAO.php';
@session_start();

$pergunta = $_POST['radioOpcoes'];
foreach ($pergunta as $radioOpcoes) {
	$radioOpcoes = explode('_', $radioOpcoes);
	$raAluno = $_SESSION['raAluno'];
	$id_questao = $radioOpcoes[0];
	$id_opcao = $radioOpcoes[1];
	
	$questaoDAO = new QuestaoDAO();
	
	$verificaResposta = $questaoDAO->verificarResposta($id_questao,$raAluno);
	
	
	if($verificaResposta != false){
		echo '<script> window.alert("Questão já respondida para esse aluno.");</script>';
	}else{
		
		$responde = $questaoDAO->responderQuestao($id_questao, $id_opcao, $raAluno);
		if($responde != false){
			echo '<script> window.alert("Questão respondida com sucesso.");</script>';
		}else{
			echo '<script> window.alert("Erro ao registrar a Resposta do aluno.");</script>';
		}
	}
}
echo '<script> window.location.href="http://localhost/AppQuestoesEnade/lancarRespostas.php";</script>';
?>