<?php
include_once 'entidades/Usuario.php';
include_once 'AlunoDAO.php';
include_once 'ferramentas/ConexaoBD.php';

class UsuarioDAO{	
	
	protected $con;
	var $usuario;
	
	public function __construct(){
		$this->con = new ConexaoBD();
	}
	
	public function findAll(){
		
	}
	
	public function findById($id){
		
	}
	
	public function findByLogin($login){
		$login = $this->con->previneSQLInjection($login);
		$query = "SELECT * FROM usuario WHERE usuario = ".$login."";
		
		//echo $query;
		try {
			$result = $this->con->query($query);
			if($result != false){
				$this->usuario = new Usuario();
				$this->usuario->setIdUsuario($result[0]['id_usuario']);
				$this->usuario->setNomeUsuario($result[0]['nome']);
				$this->usuario->setLogin($result[0]['usuario']);
				$this->usuario->setSenha($result[0]['senha']);
				$this->usuario->setTipoUsuario($result[0]['tipo_usuario']);
				return $this->usuario;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
		
	}
	
	public function insert($usuario, $dados = NULL, $semestre = null){
		$usuario->setNomeUsuario($this->con->previneSQLInjection($usuario->getNomeUsuario()));
		$usuario->setLogin($this->con->previneSQLInjection($usuario->getLogin()));
		$usuario->setSenha($this->con->previneSQLInjection($usuario->getSenha()));
		$usuario->setTipoUsuario($this->con->previneSQLInjection($usuario->getTipoUsuario()));
		
		$query = "INSERT INTO `usuario`(`id_usuario`, `nome`, `usuario`, `senha`, `tipo_usuario`) 
				  VALUES (NULL,'".$usuario->getNomeUsuario()."',".$usuario->getLogin().",
				  		'".password_hash($usuario->getSenha(), PASSWORD_BCRYPT)."','".$usuario->getTipoUsuario()."')";
		//echo $query;
		try {
			$result = $this->con->prepare($query);
			if($result != false){
				$id = $result;
				if($usuario->getTipoUsuario() == "professor"){
					$control = $this->insertProf($id, $usuario->getLogin());
				}elseif($usuario->getTipoUsuario() == "aluno"){
					$usuario->setIdUsuario($id);
					$alunoDAO = new AlunoDAO();
					$control = $alunoDAO->insert($usuario, $id, $dados, $semestre);
				}
		
				if($control !=false){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	
	
	public function insertProf($idUsuario, $matricula){
		$query = "INSERT INTO `professor`(`matricula`, `dt_adm`, `usuario_id`) 
				  VALUES (".$matricula.",NULL,".$idUsuario.")";
		try {
			$result = $this->con->prepare($query);
			if($result != false){
				return true;
			}else{
				return false;
			}				
		} catch (Exception $e) {
			return false;
		}
	}
		
	
	public function update($senha, $login){
		$login = $this->con->previneSQLInjection($login);
		$senha = $this->con->previneSQLInjection($senha);
		$query = "UPDATE `usuario` SET `senha`= '".password_hash($senha, PASSWORD_BCRYPT)."' WHERE `usuario` = ".$login."";
		try {
			$result = $this->con->prepare($query);
			if($result !== false){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function delete($id){
		
	}
	
}

?>