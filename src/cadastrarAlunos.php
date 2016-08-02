<?php include_once 'dao\UsuarioDAO.php';

$nomeAluno = $_POST['nomeAluno'];
$raAluno = $_POST['raAluno'];
$curso = $_POST['curso'];
$semestre = $_POST['semestre'];

if($curso == "default" || $semestre == "default"){
	echo "<script type='text/javascript' lang='javascript'> window.alert('Por favor selecione uma opção válida.');</script>";
	header("Location: http://localhost/AppQuestoesEnade/cadastrarAlunos.php");
}else{
	$usuarioDAO = new UsuarioDAO();
	$usuario = $usuarioDAO->findByLogin($raAluno);
	
	if($usuario != false){
		echo '<script type="text/javascript" lang="javascript"> window.alert("Atenção, aluno já cadastrado!!!");</script>';
		header("Location: http://localhost/AppQuestoesEnade/cadastrarAlunos.php");
	}else{
	
		$usuario = new Usuario();
		$usuario->setLogin($raAluno);
		$usuario->setNomeUsuario($nomeAluno);
		$usuario->setSenha($raAluno);
		$usuario->setTipoUsuario("aluno");
	
		$aluno = $usuarioDAO->insert($usuario, $curso, $semestre);
	
		if($aluno != false){
			echo '<script type="text/javascript" lang="javascript"> window.alert("Aluno cadastrado com sucesso!!!");</script>';
			header("Location: http://localhost/AppQuestoesEnade/cadastrarAlunos.php");
		}else{
			echo '<script type="text/javascript" lang="javascript"> window.alert("Erro no cadastro do aluno!!!");</script>';
			header("Location: http://localhost/AppQuestoesEnade/cadastrarAlunos.php");
		}
	}
}



?>
