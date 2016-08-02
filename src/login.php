<?php include_once 'dao/UsuarioDAO.php';
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
		
		if($senha == $login){
			//echo '<script type="text/javascript" lang="javascript"> window.alert("Login feito com sucesso. Bem-vindo '.$usuario->getNomeUsuario().'.");</script>';
			header("Location: http://localhost/AppQuestoesEnade/alterarSenha.php");
		}else{
			//echo '<script type="text/javascript" lang="javascript"> window.alert("Login feito com sucesso. Bem-vindo '.$usuario->getNomeUsuario().'.");</script>';
			header("Location: http://localhost/AppQuestoesEnade/index.php");
		}
		
		
	}else{
		echo '<script type="text/javascript" lang="javascript"> window.alert("Usuario ou senha invalidos!!!");</script>';
		header("Location: http://localhost/AppQuestoesEnade/entrar.php");
	}
}else{
	echo '<script type="text/javascript" lang="javascript"> window.alert("Usuario ou senha invalidos!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/entrar.php");
}

?>