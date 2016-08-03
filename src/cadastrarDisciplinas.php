<?php include 'dao/ToolsDAO.php';

$curso = $_POST['curso'];
$codigoDisciplina = $_POST['codigoDisciplina'];
$nomeDisciplina = $_POST['nomeDisciplina'];
$semestre = $_POST['semestre'];

$toolsDAO = new ToolsDAO();

if($curso == 'default' || $nomeDisciplina == ''){
	echo '<script> window.alert("Erro no cadastro da Disciplina!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarDisciplinas.php";</script>';
}else{
	
	$disciplina = $toolsDAO->insertDisciplina($curso, $nomeDisciplina, $semestre, $codigoDisciplina);
	if($disciplina){
		echo '<script> window.alert("Disciplina cadastrada com Sucesso!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarDisciplinas.php";</script>';
	}else{
		echo '<script> window.alert("Erro no cadastro da Disciplina!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarDisciplinas.php";</script>';
	}
}