<?php include_once 'ferramentas/ConexaoBD.php';

class QuestaoDAO{	
	protected $con;
	var $questao;
	
	public function __construct(){
		$this->con = new ConexaoBD();
	}
	
	
	public function findAll(){
		
	}
	
	public function find($curso, $ano, $semestre){
		$curso = $this->con->previneSQLInjection($curso);
		$ano = $this->con->previneSQLInjection($ano);
		$semestre = $this->con->previneSQLInjection($semestre);
		
		$query = "SELECT * FROM `questoes` 
				WHERE `id_curso` = ".$curso." and `semestre` = ".$semestre." and `ano` = ".$ano."";
		
		try {
			$result = $this->con->query($query);
			if($result != false){
				$questao = new Questao();
				$questao->setIdDisciplina($result[0]['id_disciplina']);
				$questao->setIdQuestao($result[0]['id_questoes']);
				$questao->setTextoPergunta($result[0]['texto_questao']);
				$questao->setSemestre($result[0]['semestre']);
				
				$query = "SELECT id_opcoes, texto_opcoes FROM `opcoes_questoes` WHERE `id_questao` = ".$questao->getIdQuestao()."";
				$result = $this->con->query($query);
				if($result != false){
					foreach ($result as $opcao) {
						array_push($questao->getOpcoes(), $opcao);
					}
					return $questao;
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
	
	public function findById($id){
		
	}
		
	public function insert($idCurso, $ano, $textoquestao, $semestre, $radioOpcoes, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5){
		$idCurso = $this->con->previneSQLInjection($idCurso);
		$semestre = $this->con->previneSQLInjection($semestre);
		$ano = $this->con->previneSQLInjection($ano);
		$textoquestao = $this->con->previneSQLInjection($textoquestao);
		$radioOpcoes = $this->con->previneSQLInjection($radioOpcoes);
		$opcao1 = $this->con->previneSQLInjection($opcao1);
		$opcao2 = $this->con->previneSQLInjection($opcao2);
		$opcao3 = $this->con->previneSQLInjection($opcao3);
		$opcao4 = $this->con->previneSQLInjection($opcao4);
		$opcao5 = $this->con->previneSQLInjection($opcao5);
		
		$query = "INSERT INTO `questoes`(`id_questoes`, `id_curso`, `texto_questao`, `semestre`, `ano`) 
				  VALUES (NULL,".$idCurso.",'".$textoquestao."',".$semestre.",".$ano.")";
		try {
			$result = $this->con->prepare($query);
			if($result){
				$idQuestao = $result;
				$idOpcao1Sucesso = $this->insertOpcoes("1",$radioOpcoes, $opcao1, $idQuestao);
				$idOpcao2Sucesso = $this->insertOpcoes("2",$radioOpcoes, $opcao2, $idQuestao);
				$idOpcao3Sucesso = $this->insertOpcoes("3",$radioOpcoes, $opcao3, $idQuestao);
				$idOpcao4Sucesso = $this->insertOpcoes("4",$radioOpcoes, $opcao4, $idQuestao);
				$idOpcao5Sucesso = $this->insertOpcoes("5",$radioOpcoes, $opcao5, $idQuestao);
				
				if($idOpcao1Sucesso || $idOpcao2Sucesso || $idOpcao3Sucesso || $idOpcao4Sucesso || $idOpcao5Sucesso){
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
	
	public function update($object){
		
	}
	
	public function delete($id){
		
	}
	
	public function getIdDisciplina($disciplina){
		$query = "SELECT `id_disciplina` FROM `disciplina` WHERE `nome_disciplina` = ".$disciplina."";
		try {
			$result = $this->con->query($query);
			if($result != false){
				$id = $result[0]['id_disciplina'];
				return $id;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
		
	}
	
	public function insertOpcoes($controle, $radioOpcoes, $opcao, $idQuestao){
		if($controle == $radioOpcoes){
			$correto = "TRUE";
		}else{
			$correto = "FALSE";
		}
		
		$query = "INSERT INTO `opcoes_questoes`(`id_opcoes`, id_questao, `texto_opcoes`, `opcao_correta`) 
				  VALUES (NULL, ".$idQuestao.",'".$opcao."',".$correto.")";
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
	
	public function verificarResposta($idQuestao, $idOpcao, $raAluno){
		$query = "SELECT * FROM `opcoes_questoes_has_questoes` 
				WHERE `opcoes_questoes_id_opcoes` = ".$idOpcao." and `questoes_id_questoes` = ".$idQuestao." and `ra_aluno` = ".$raAluno."";
		try {
			$result = $this->con->query($query);
			if($result != false){
				$result = $result[0];
				return $result;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
		
	}
	
	public function responderQuestao($idQuestao, $idOpcao, $raAluno){
		$query = "INSERT INTO `opcoes_questoes_has_questoes`(`opcoes_questoes_id_opcoes`, `questoes_id_questoes`, `ra_aluno`) 
					VALUES (".$idOpcao.",".$idQuestao.",".$raAluno.")";
		try {
			$result = $this->con->query($query);
			if($result != false){ 
				$id = $this->con->con->lastInsertId();
				return $id;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	
	}
}
?>