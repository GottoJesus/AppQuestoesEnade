<?php include_once 'dao/AlunoDAO.php';
@session_start();
$curso = $_POST['curso'];
$semestre = $_POST['semestre'];

$alunoDAO = new AlunoDAO();

if($curso == "default" || $semestre == "default" ){
	echo '<script> window.alert("Por favor selecione uma opção válida."); window.location.href="http://localhost/AppQuestoesEnade/consultarAlunos.php";</script>';
}else{
	$arrAluno = $alunoDAO->find($curso, $semestre);
	
	if($arrAluno != false){
		$_SESSION['arrAluno'] = $arrAluno;
		$_SESSION['semestre'] = $semestre;
		$_SESSION['curso'] = $curso;
		header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
	}else{
		echo '<script> window.alert("Não há alunos para estes parâmetros."); window.location.href="http://localhost/AppQuestoesEnade/consultarAlunos.php";</script>';
	}
}