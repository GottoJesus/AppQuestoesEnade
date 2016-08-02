<?php include 'dao/ToolsDAO.php';

$curso = $_POST['curso'];
$codigoDisciplina = $_POST['codigoDisciplina'];
$nomeDisciplina = $_POST['nomeDisciplina'];
$semestre = $_POST['semestre'];

$toolsDAO = new ToolsDAO();

if($curso == 'default' || $nomeDisciplina == ''){
	echo '<script type="text/javascript" lang="javascript"> window.alert("Erro no cadastro da Disciplina!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/cadastrarDisciplinas.php");
}else{
	
	$disciplina = $toolsDAO->insertDisciplina($curso, $nomeDisciplina, $semestre, $codigoDisciplina);
	
	if($disciplina){
		echo '<script type="text/javascript" lang="javascript"> window.alert("Disciplina cadastrada com Sucesso!!!");</script>';
		header("Location: http://localhost/AppQuestoesEnade/cadastrarDisciplinas.php");
	}else{
		echo '<script type="text/javascript" lang="javascript"> window.alert("Erro no cadastro da Disciplina!!!");</script>';
		header("Location: http://localhost/AppQuestoesEnade/cadastrarDisciplinas.php");
	}
}