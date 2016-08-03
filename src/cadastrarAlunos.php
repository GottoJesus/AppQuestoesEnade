<?php include_once 'dao\UsuarioDAO.php';

$nomeAluno = $_POST['nomeAluno'];
$raAluno = $_POST['raAluno'];
$curso = $_POST['curso'];
$semestre = $_POST['semestre'];

if($curso == "default" || $semestre == "default"){
	echo '<script> window.alert("Por favor selecione uma opção válida."); window.location.href="http://localhost/AppQuestoesEnade/cadastrarAlunos.php";</script>';
}else{
	$usuarioDAO = new UsuarioDAO();
	$usuario = $usuarioDAO->findByLogin($raAluno);
	
	if($usuario != false){
		echo '<script> window.alert("Atenção, aluno já cadastrado!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarAlunos.php";</script>';
	}else{
	
		$usuario = new Usuario();
		$usuario->setLogin($raAluno);
		$usuario->setNomeUsuario($nomeAluno);
		$usuario->setSenha($raAluno);
		$usuario->setTipoUsuario("aluno");
	
		$aluno = $usuarioDAO->insert($usuario, $curso, $semestre);
	
		if($aluno != false){
			echo '<script> window.alert("Aluno cadastrado com sucesso!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarAlunos.php";</script>';
		}else{
			echo '<script> window.alert("Erro no cadastro do aluno!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarAlunos.php";</script>';
		}
	}
}



?>
