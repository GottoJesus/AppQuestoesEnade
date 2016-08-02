<?php include_once 'dao/AlunoDAO.php';
@session_start();
$raAluno = $_SESSION['raAluno'];
$novoSemestre = $_POST['novoSemestre'];




if($novoSemestre == "default"){
	echo "<script type='text/javascript' lang='javascript'> window.alert('Por favor selecione uma opção válida.');</script>";
	header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
}else{

	$alunoDAO = new AlunoDAO();
	$deuCerto = $alunoDAO->update($raAluno, $novoSemestre);
	if($deuCerto){
		echo "<script type='text/javascript' lang='javascript'> window.alert('Semestre do Aluno alterado com sucesso.');</script>";
		header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
	}else{
		echo "<script type='text/javascript' lang='javascript'> window.alert('Erro na alteração do Semestre do Aluno.');</script>";
		header("Location: http://localhost/AppQuestoesEnade/consultarAlunos.php");
	}
}

?>