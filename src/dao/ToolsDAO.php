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

	public function findDisciplinas($idCurso){
		$query = "SELECT * FROM `curso_has_disciplina` WHERE `curso_idCurso` = ".$idCurso."";
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
	

	public function insertCurso($nomeCurso) {
		$nomeCurso = $this->con->previneSQLInjection($nomeCurso);
		$query = "INSERT INTO `curso`(`idCurso`, `nome`) VALUES (NULL,'".$nomeCurso."')";

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
	
	public function insertDisciplina($idCurso, $nomeDisciplina) {
		// TODO: Auto-generated method stub
	
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