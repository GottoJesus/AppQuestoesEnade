<?php
class Aluno{
	private $ra;
	private $nomeUsuario;
	private $dataMatricula;
	private $nota;
	private $semestre;
	
	public function getRa() {
		return $this->ra;
	}
	public function setRa($ra) {
		$this->ra = $ra;
	}
	public function getNomeUsuario() {
		return $this->nomeUsuario;
	}
	public function setNomeUsuario($nomeUsuario) {
		$this->nomeUsuario = $nomeUsuario;
	}
	public function getDataMatricula() {
		return $this->dataMatricula;
	}
	public function setDataMatricula($dataMatricula) {
		$this->dataMatricula = $dataMatricula;
	}
	public function getNota() {
		return $this->nota;
	}
	public function setNota($nota) {
		$this->nota = $nota;
	}
	public function getSemestre() {
		return $this->semestre;
	}
	public function setSemestre($semestre) {
		$this->semestre = $semestre;
	}
	
}
?>