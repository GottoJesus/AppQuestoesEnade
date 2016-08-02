<?php include_once 'dao\UsuarioDAO.php';

$nomeProf = $_POST['nomeProf'];
$matrProf = $_POST['matrProf'];

$usuarioDAO = new UsuarioDAO();

$usuario = $usuarioDAO->findByLogin($matrProf);

if($usuario != false){
	echo '<script type="text/javascript" lang="javascript"> window.alert("Atenção, professor já cadastrado!!!");</script>';
	header("Location: http://localhost/AppQuestoesEnade/cadastrarProfessores.php");
}else{
	
	$usuario = new Usuario();
	$usuario->setLogin($matrProf);
	$usuario->setNomeUsuario($nomeProf);
	$usuario->setSenha($matrProf);
	$usuario->setTipoUsuario("professor");
	
	$prof = $usuarioDAO->insert($usuario);
	
	if($prof != false){
		echo '<script type="text/javascript" lang="javascript"> window.alert("Professor cadastrado com sucesso!!!");</script>';
		header("Location: http://localhost/AppQuestoesEnade/cadastrarProfessores.php");
	}else{
		echo '<script type="text/javascript" lang="javascript"> window.alert("Erro no cadastro do Professor!!!");</script>';
		header("Location: http://localhost/AppQuestoesEnade/cadastrarProfessores.php");
	}
}

?>
