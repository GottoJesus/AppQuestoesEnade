<?php include_once 'dao\UsuarioDAO.php';
@session_start();
$novaSenha = $_POST['novaSenha'];

$usuarioDAO = new UsuarioDAO();

$deuCerto = $usuarioDAO->update($novaSenha, $_SESSION['login']);

if($deuCerto != false){
	echo '<script type="text/javascript" lang="javascript"> window.alert("Senha Alterada com Sucesso!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/index.php");
}else{
	echo '<script type="text/javascript" lang="javascript"> window.alert("Erro na alteração da Senha!!!");</script>';
	//header("Location: http://localhost/AppQuestoesEnade/alterarSenha.php");
}