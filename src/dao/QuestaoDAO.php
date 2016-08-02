<?php include_once 'ferramentas/ConexaoBD.php';
include_once 'entidades/Questao.php';

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
			$results = $this->con->query($query);
			if($results != false){
				$listaQuestao = array();
				foreach ($results as $result) {
					$questao = array();
					$questao['id_disciplina'] = $result['id_disciplina'];
					$questao['id_questoes'] = $result['id_questoes'];
					$questao['texto_questao'] = $result['texto_questao'];
					$questao['semestre'] = $result['semestre'];
					
					$query = "SELECT id_opcoes, texto_opcoes FROM `opcoes_questoes` WHERE `id_questao` = ".$questao['id_questoes']."";
					$result = $this->con->query($query);
					if($result != false){
						$opcoes = array();
						foreach ($result as $opcao) {
							array_push($opcoes, $opcao);
						}
						$questao['opcoes'] = $opcoes;
						array_push($listaQuestao, $questao);
					}else{
						return false;
					}	
				}
				return $listaQuestao;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
		
	}
	
	public function findById($id){
		
	}
		
	public function insert($idCurso, $ano, $textoquestao,$radioOpcoes, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5, $disciplina){
		$idCurso = $this->con->previneSQLInjection($idCurso);
		$disciplina = $this->con->previneSQLInjection($disciplina);
		$ano = $this->con->previneSQLInjection($ano);
		$textoquestao = $this->con->previneSQLInjection($textoquestao);
		$radioOpcoes = $this->con->previneSQLInjection($radioOpcoes);
		$opcao1 = $this->con->previneSQLInjection($opcao1);
		$opcao2 = $this->con->previneSQLInjection($opcao2);
		$opcao3 = $this->con->previneSQLInjection($opcao3);
		$opcao4 = $this->con->previneSQLInjection($opcao4);
		$opcao5 = $this->con->previneSQLInjection($opcao5);
		
		$query = "SELECT cd.semestre FROM `disciplina` d
					LEFT JOIN curso_has_disciplina cd on cd.disciplina_nome = d.`nome_disciplina`
					WHERE `id_disciplina` = ".$disciplina."";
		$result = $this->con->query($query);
		$semestre = $result[0]['semestre'];
		
		$query = "INSERT INTO `questoes`(`id_questoes`, `id_curso`, `id_disciplina`, `texto_questao`, `semestre`, `ano`)
					VALUES (NULL,".$idCurso.", ".$disciplina.",'".$textoquestao."',".$semestre.",".$ano.")";
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
	
	public function verificarResposta($idQuestao, $raAluno){
		$query = "SELECT * FROM `opcoes_questoes_has_questoes` 
				WHERE `questoes_id_questoes` = ".$idQuestao." and `ra_aluno` = ".$raAluno."";
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
}
?>