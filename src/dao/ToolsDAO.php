<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/AppQuestoesEnade/src/ferramentas/ConexaoBD.php';

class ToolsDAO{
	protected $con;	var $cursos = array();
	var $disciplina = array();
	
	public function __construct(){
		$this->con = new ConexaoBD();
	}
	
	public function findCursos(){
		$query = "SELECT DISTINCT * FROM `curso`";
		try {
			$result = $this->con->query($query);
			if($result != false){
				foreach ($result as $curso) {
					array_push($this->cursos, $curso);
				}
				return $this->cursos;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function findSemestre($ra){
		$ra = $this->con->previneSQLInjection($ra);
		$query = "SELECT `semestre` FROM `aluno` WHERE `ra` = ".$ra."";
		try {
			$result = $this->con->query($query);
			if($result != false){
				
				return $result[0]['semestre'];
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	

	public function findDisciplinas($idCurso){
		$query = "SELECT d.* FROM `disciplina` d 
					LEFT JOIN curso_has_disciplina cd on cd.disciplina_nome = d.`nome_disciplina`
					WHERE cd.`curso_idCurso` = ".$idCurso."";
		try {
			$result = $this->con->query($query);
			if($result != false){
				foreach ($result as $disciplina) {
					array_push($this->disciplina, $disciplina);
				}
				return $this->disciplina;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function findAllDisciplinas(){
		$query = "SELECT * FROM `curso_has_disciplina`";
		try {
			$result = $this->con->query($query);
			if($result != false){
				foreach ($result as $disciplina) {
					array_push($this->disciplina, $disciplina);
				}
				return $this->disciplina;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	

	public function insertCurso($nomeCurso, $codigoCurso) {
		$nomeCurso = $this->con->previneSQLInjection($nomeCurso);
		$query = "INSERT INTO `curso`(`idCurso`, `nome`, `codigoCurso`) VALUES (NULL,'".$nomeCurso."', '".$codigoCurso."')";

		try {
			$result = $this->con->prepare($query);
			if($result != false){
				return $result;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function insertDisciplina($idCurso, $nomeDisciplina, $semestre, $codigoDisciplina) {
		$idCurso = $this->con->previneSQLInjection($idCurso);
		$nomeDisciplina = $this->con->previneSQLInjection($nomeDisciplina);
		$codigoDisciplina = $this->con->previneSQLInjection($codigoDisciplina);
		$semestre = $this->con->previneSQLInjection($semestre);
		
		$query = "INSERT INTO `disciplina`(`id_disciplina`, `nome_disciplina`,`codigo_disciplina`,  `questoes_id_questoes`) 
				  VALUES (NULL,'".$nomeDisciplina."','".$codigoDisciplina."',NULL)";

		try {
			$result = $this->con->prepare($query);
			if($result != false){
				$query = "INSERT INTO `curso_has_disciplina`(`curso_idCurso`, `disciplina_nome`, `semestre`) 
						  VALUES (".$idCurso.",'".$nomeDisciplina."',".$semestre.")";
				$result = $this->con->prepare($query);
				if($result !== false){
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


	public function findById($id) {
		$query = "SELECT `nome` FROM `curso` WHERE `idCurso` = ".$id."";
			try {
				$result = $this->con->query($query);
				if($result != false){
					return $result[0]['nome'];
				}else{
					return false;
				}
		} catch (Exception $e) {
			return false;
		}
	}


	public function findAll() {
		// TODO: Auto-generated method stub

	}


	public function update($object) {
		// TODO: Auto-generated method stub

	}


	public function delete($id) {
		// TODO: Auto-generated method stub

	}

	
}
?>