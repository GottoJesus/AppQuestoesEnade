<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/AppQuestoesEnade/src/entidades/Aluno.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/AppQuestoesEnade/src/ferramentas/ConexaoBD.php';


class AlunoDAO{

	protected $con;
	var $arrAluno = array();
	public function __construct(){
		$this->con = new ConexaoBD();
	}
	
	
	public function findAll(){

	}

	public function findDadosByRA($ra){
		$query = "SELECT a.*, c.`nome` FROM `aluno` a 
					LEFT JOIN curso c on c.idCurso = a.`curso_id_curso`
					WHERE `ra` = ".$ra."";
		try {
			$result = $this->con->query($query);
			if($result != false){
				$dados = array();
				$dados['idCurso'] = $result[0]['curso_id_curso'];
				$dados['semestre'] = $result[0]['semestre'];
				$dados['nomeCurso'] = $result[0]['nome'];	
				return $dados;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
		
	}

	public function find($curso, $semestre){
		$curso = $this->con->previneSQLInjection($curso);
		$semestre = $this->con->previneSQLInjection($semestre);
		
		$query = "SELECT a.*, u.nome FROM `aluno` a 
					LEFT JOIN usuario u on u.id_usuario = a.`usuario_id_usuario`
					WHERE a.`curso_id_curso` = ".$curso." and a.`semestre` = ".$semestre."";
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

	public function update($ra, $semestre){
		$query = "UPDATE `aluno` SET `semestre`=".$semestre." WHERE `ra` = ".$ra."";
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

	public function getQuestoesResp($ra, $ano, $semestre){
		$query = "SELECT q.texto_questao, oq.texto_opcoes, oq.opcao_correta, q.id_questoes 
				FROM `opcoes_questoes_has_questoes` oqq 
				Left join opcoes_questoes oq on oq.id_opcoes = oqq.`opcoes_questoes_id_opcoes` 
				Left join questoes q on oqq.`questoes_id_questoes` = q.id_questoes 
				WHERE oqq.`ra_aluno` = ".$ra." and q.ano = ".$ano." and q.semestre = ".$semestre."";
		try {
			$results = $this->con->query($query);
			if($results != false){
				$listaResp = array();
				foreach ($results as $result) {
					$resposta = array();
					$resposta['id_questoes'] = $result['id_questoes'];
					$resposta['texto_questao'] = $result['texto_questao'];
					$resposta['opcaoResp'] = $result['texto_opcoes'];
					$resposta['opcao_eh_correta'] = $result['opcao_correta'];
					
					if($resposta['opcao_eh_correta'] == 1){
						$resposta['opcaoCorreta'] = $resposta['opcaoResp'];
					}else{
						$query = "SELECT `texto_opcoes` FROM `opcoes_questoes` 
								WHERE `id_questao` = ".$resposta['id_questoes']." and `opcao_correta` = 1";
						$result2 = $this->con->query($query);
						if($result2 != false){
							$resposta['opcaoCorreta'] = $result2[0]['texto_opcoes'];
						}else{
							return false;
						}
					}
					array_push($listaResp, $resposta);
				}
				return $listaResp;
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