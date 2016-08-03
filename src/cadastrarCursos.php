<?php include 'dao/ToolsDAO.php';
$nomeCurso = $_POST['nomeCurso'];
$codigoCurso = $_POST['codigoCurso'];

$toolsDAO = new ToolsDAO();

$curso = $toolsDAO->insertCurso($nomeCurso, $codigoCurso);
if($curso != false){
	echo '<script> window.alert("Curso cadastrado com Sucesso!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarCursos.php";</script>';
}else{
	echo '<script> window.alert("Erro no cadastro do Curso!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarCursos.php";</script>';
}

?>