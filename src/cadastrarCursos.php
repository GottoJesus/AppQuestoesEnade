<?php include 'dao/ToolsDAO.php';
$nomeCurso = $_POST['nomeCurso'];

$toolsDAO = new ToolsDAO();

$curso = $toolsDAO->insertCurso($nomeCurso);
if($curso != false){
	echo '<script type="text/javascript" lang="javascript"> window.alert("Curso cadastrado com Sucesso!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/cadastrarCursos.php");
}else{
	echo '<script type="text/javascript" lang="javascript"> window.alert("Erro no cadastro do Curso!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/cadastrarCursos.php");
}

?>