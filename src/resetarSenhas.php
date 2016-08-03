<?php include_once 'dao\UsuarioDAO.php';
$codigo = $_POST['codigo'];

$usuarioDAO = new UsuarioDAO();

$deuCerto = $usuarioDAO->update($codigo, $codigo);

if($deuCerto != false){
	echo '<script> window.alert("Senha voltou a configuração padrão!!!"); window.location.href="http://localhost/AppQuestoesEnade/resetarSenhas.php";</script>';
}else{
	echo '<script> window.alert("Erro na alteração da Senha!!!"); window.location.href="http://localhost/AppQuestoesEnade/resetarSenhas.php";</script>';
}