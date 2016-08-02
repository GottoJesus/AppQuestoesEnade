<?php include_once 'dao\UsuarioDAO.php';
$codigo = $_POST['codigo'];

$usuarioDAO = new UsuarioDAO();

$deuCerto = $usuarioDAO->update($codigo, $codigo);

if($deuCerto != false){
	echo '<script type="text/javascript" lang="javascript"> window.alert("Senha voltou a configuração padrão!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/resetarSenhas.php");
}else{
	echo '<script type="text/javascript" lang="javascript"> window.alert("Erro na alteração da Senha!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/resetarSenhas.php");
}