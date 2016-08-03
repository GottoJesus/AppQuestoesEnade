<?php include_once 'dao/QuestaoDAO.php';
$curso = $_POST['curso'];
$disciplina = $_POST['disciplinas'];
$ano = $_POST['ano'];
$textoquestao = $_POST['textoquestao'];
$radioOpcoes = $_POST['radioOpcoes'];
$opcao1 = $_POST['opcao1'];
$opcao2 = $_POST['opcao2'];
$opcao3 = $_POST['opcao3'];
$opcao4 = $_POST['opcao4'];
$opcao5 = $_POST['opcao5'];

$questaoDao = new QuestaoDAO();

if($curso == "default" || $ano == "default" || $textoquestao == "" ||$opcao1 == "" ||$opcao2 == "" 
		||$opcao3 == "" ||$opcao4 == "" || $opcao5 == "" || $disciplina == "default"){
	echo '<script> window.alert("Por favor selecione uma opção válida.");  window.location.href="http://localhost/AppQuestoesEnade/cadastrarPerguntas.php";</script>';
}else{
	$deuCerto = $questaoDao->insert($curso, $ano, $textoquestao, $radioOpcoes, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5, $disciplina);
	if($deuCerto){
		unset($_POST['curso']);
		unset($_POST['semestre']);
		unset($_POST['ano']);
		unset($_POST['ano']);
		unset($_POST['textoquestao']);
		unset($_POST['radioOpcoes']);
		unset($_POST['opcao1']);	
		unset($_POST['opcao2']);
		unset($_POST['opcao3']);
		unset($_POST['opcao4']);
		unset($_POST['opcao5']);

		echo '<script> window.alert("Questão Inserida com sucesso.");  window.location.href="http://localhost/AppQuestoesEnade/cadastrarPerguntas.php";</script>';
	}else{
		echo '<script> window.alert("Erro no registro da questão no banco.");  window.location.href="http://localhost/AppQuestoesEnade/cadastrarPerguntas.php";</script>';
	}
}





?>