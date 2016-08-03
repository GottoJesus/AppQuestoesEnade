<?php include_once 'dao\UsuarioDAO.php';
@session_start();
$novaSenha = $_POST['novaSenha'];

$usuarioDAO = new UsuarioDAO();
$deuCerto = $usuarioDAO->update($novaSenha, $_SESSION['login']);

if($deuCerto != false){
	echo '<script> window.alert("Senha Alterada com Sucesso!!!"); window.location.href="http://localhost/AppQuestoesEnade/index.php";</script>';;
}else{
	echo '<script> window.alert("Erro na alteração da Senha!!!"); window.location.href="http://localhost/AppQuestoesEnade/alterarSenha.php";</script>';
}