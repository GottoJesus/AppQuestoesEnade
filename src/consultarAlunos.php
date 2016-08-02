<?php include_once 'dao/AlunoDAO.php';
@session_start();
$curso = $_POST['curso'];
$semestre = $_POST['semestre'];

$alunoDAO = new AlunoDAO();

if($curso == "default" || $semestre == "default" ){
	echo "<script type='text/javascript' lang='javascript'> window.alert('Por favor selecione uma opção válida.');</script>";
	header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
}else{
	$arrAluno = $alunoDAO->find($curso, $semestre);
	
	if($arrAluno != false){
		$_SESSION['arrAluno'] = $arrAluno;
		$_SESSION['semestre'] = $semestre;
		$_SESSION['curso'] = $curso;
		header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
	}else{
		echo "<script type='text/javascript' lang='javascript'> window.alert('Não há alunos para estes parâmetros.');</script>";
		header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
	}
}