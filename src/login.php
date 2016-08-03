<?php include_once 'dao/UsuarioDAO.php';
include_once 'dao/AlunoDAO.php';
@session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->findByLogin($login);

if($usuario != false){
	if(password_verify($senha, $usuario->getSenha())){
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $usuario->getSenha();
		$_SESSION['id'] = $usuario->getIdUsuario();
		$_SESSION['nome'] = $usuario->getNomeUsuario();
		$_SESSION['tipo_usuario'] = $usuario->getTipoUsuario();
		
		if($usuario->getTipoUsuario() == 'aluno'){
			$alunoDAO = new AlunoDAO();
			$dadosAluno = $alunoDAO->findDadosByRA($login);
			$_SESSION['raAluno'] = $login;
			$_SESSION['curso'] = $dadosAluno['idCurso'];
			$_SESSION['semestre'] = $dadosAluno['semestre'];
			$_SESSION['nomeCurso'] = $dadosAluno['nomeCurso'];
			$_SESSION['nomeAluno'] = $usuario->getNomeUsuario();
		}
		if($senha == $login){
			//echo '<script type="javascript" >alert("Login feito com sucesso. Bem-vindo '.$usuario->getNomeUsuario().'.");</script>';
			header("Location: http://localhost/AppQuestoesEnade/alterarSenha.php");
		}else{
			//echo '<script type="javascript" >alert("Login feito com sucesso. Bem-vindo '.$usuario->getNomeUsuario().'.");</script>';
			header("Location: http://localhost/AppQuestoesEnade/index.php");
		}
		
		
	}else{
		echo '<script> window.alert("Usuario ou senha invalidos!!!"); window.location.href="http://localhost/AppQuestoesEnade/entrar.php";</script>';
	}
}else{
	echo '<script> window.alert("Usuario ou senha invalidos!!!"); window.location.href="http://localhost/AppQuestoesEnade/entrar.php";</script>';
}

?>