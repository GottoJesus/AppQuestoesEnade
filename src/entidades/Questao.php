<?php
class Questao{
	private $idQuestao;
	private $idDisciplina;
	private $semestre;
	private $textoPergunta;
	private $numAlt;
	private $opcoes = array();
	
	
	public function getIdQuestao() {
		return $this->idQuestao;
	}
	public function setIdQuestao($idQuestao) {
		$this->idQuestao = $idQuestao;
	}
	public function getIdDisciplina() {
		return $this->idDisciplina;
	}
	public function setIdDisciplina($idDisciplina) {
		$this->idDisciplina = $idDisciplina;
	}
	public function getSemestre() {
		return $this->semestre;
	}
	public function setSemestre($semestre) {
		$this->semestre = $semestre;
	}
	public function getTextoPergunta() {
		return $this->textoPergunta;
	}
	public function setTextoPergunta($textoPergunta) {
		$this->textoPergunta = $textoPergunta;
	}
	public function getNumAlt() {
		return $this->numAlt;
	}
	public function setNumAlt($numAlt) {
		$this->numAlt = $numAlt;
	}
	public function getOpcoes() {
		return $this->opcoes;
	}
	public function setOpcoes($opcoes) {
		$this->opcoes = $opcoes;
	}
}
?>