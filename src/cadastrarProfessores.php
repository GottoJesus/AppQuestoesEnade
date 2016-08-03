<?php include_once 'dao\UsuarioDAO.php';

$nomeProf = $_POST['nomeProf'];
$matrProf = $_POST['matrProf'];

$usuarioDAO = new UsuarioDAO();

$usuario = $usuarioDAO->findByLogin($matrProf);

if($usuario != false){
	echo '<script> window.alert("Atenção, professor já cadastrado!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarProfessores.php";</script>';
}else{
	
	$usuario = new Usuario();
	$usuario->setLogin($matrProf);
	$usuario->setNomeUsuario($nomeProf);
	$usuario->setSenha($matrProf);
	$usuario->setTipoUsuario("professor");
	
	$prof = $usuarioDAO->insert($usuario);
	
	if($prof != false){
		echo '<script> window.alert("Professor cadastrado com sucesso!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarProfessores.php";</script>';
	}else{
		echo '<script> window.alert("Erro no cadastro do Professor!!!"); window.location.href="http://localhost/AppQuestoesEnade/cadastrarProfessores.php";</script>';
	}
}

?>
