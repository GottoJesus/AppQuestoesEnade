<?php
include_once 'entidades/Aluno.php';
include_once 'ferramentas/ConexaoBD.php';


class AlunoDAO{

	protected $con;
	var $arrAluno = array();
	public function __construct(){
		$this->con = new ConexaoBD();
	}
	
	
	public function findAll(){

	}

	public function findById($id){

	}

	public function find($curso, $semestre){
		$curso = $this->con->previneSQLInjection($curso);
		$semestre = $this->con->previneSQLInjection($semestre);
		
		$query = "SELECT a.*, u.nome FROM `aluno` a 
					LEFT JOIN usuario u on u.id_usuario = a.`usuario_id_usuario`
					WHERE `curso_id_curso` = ".$curso." and `semestre` = ".$semestre."";
		try {
			$result = $this->con->query($query);
			if($result != false){
				foreach ($result as $alunosql) {
					$aluno = array();
					$aluno['ra'] = $alunosql['ra'];
					$aluno['nomeUsuario'] = $alunosql['nome'];
					$aluno['semestre'] = $alunosql['semestre'];
					array_push($this->arrAluno, $aluno) ;
				}
				
				return $this->arrAluno;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
		
	}

	public function insert($object, $id, $dados = NULL, $semestre= NUll){
		$query = "INSERT INTO `aluno`(`ra`, `dt_matricula`, `nota`, `usuario_id_usuario`, `curso_id_curso`, `semestre`) 
				  VALUES (".$object->getLogin().",NULL,NULL,".$id.",".$dados.", ".$semestre.")";
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

	public function update($object){

	}

	public function delete($id){

	}
}
?>