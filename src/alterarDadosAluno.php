<?php include_once 'dao/AlunoDAO.php';
@session_start();
$raAluno = $_SESSION['raAluno'];
$novoSemestre = $_POST['novoSemestre'];




if($novoSemestre == "default"){
	echo '<script> window.alert("Por favor selecione uma opção válida."); window.location.href="http://localhost/AppQuestoesEnade/consultarAlunos.php";</script>';
}else{

	$alunoDAO = new AlunoDAO();
	$deuCerto = $alunoDAO->update($raAluno, $novoSemestre);
	if($deuCerto){
		echo '<script> window.alert("Semestre do Aluno alterado com sucesso."); window.location.href="http://localhost/AppQuestoesEnade/consultarAlunos.php";</script>';
	}else{
		echo '<script> window.alert("Erro na alteração do Semestre do Aluno."); window.location.href="http://localhost/AppQuestoesEnade/consultarAlunos.php";</script>';
	}
}

?>