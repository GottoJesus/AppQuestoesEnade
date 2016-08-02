<?php

class ConexaoBD{
	
	protected $query;
	protected $con;
	protected $result;
	
	public function ConexaoBD(){}
	
	public function abreConexao(){
		try {
			$this->con = new PDO("mysql:host=localhost;dbname=db_appenade","root", "");
			$this->con->exec("SET NAMES utf8");
			
			if(!$this->con){
				echo "Falha na conexao com o Banco de Dados!";
				die();
			}
			return $this->con;
		}catch (PDOException $pdoe){
			echo "Falha na conexao com o Banco de Dados!";
			echo '<br>';
			echo "Erro: ".$pdoe->getLine()." ".$pdoe->getMessage();
			die();
		}
	}
	
	public function query($query){
		$this->abreConexao();
		$this->query = $query;
		
		if($this->result = $this->con->query($this->query)){
			$this->result = $this->result->fetchAll(PDO::FETCH_ASSOC);
			$this->fechaConexao();
			return $this->result;
		}else{
			print_r($this->con->errorInfo());
			$this->fechaConexao();
			return false;
		}
	}
	
	
	public function prepare($query){
		$this->abreConexao();
		$this->query = $query;
		$stmt = $this->con->prepare($query);
		
		if($stmt->execute()){
			$id = $this->con->lastInsertId();
			$this->fechaConexao();
			return $id;
		}else{
			print_r($stmt->errorInfo());
			$this->fechaConexao();
			return false;
		}
	}
	
	
	public function fechaConexao(){
		if($this->con != null) $this->con = null;
	}
	
	public function previneSQLInjection($string){
	
		$string = str_ireplace("SELECT", "", $string);
		$string = str_ireplace("INSERT", "", $string);
		$string = str_ireplace("UPDATE", "", $string);
		$string = str_ireplace("DELETE", "", $string);
		$string = str_ireplace(" AND ", "", $string);
		$string = str_ireplace(" OR ", "", $string);
		$string = str_ireplace("CREATE", "", $string);
		$string = str_ireplace("DROP", "", $string);
		$string = str_ireplace("TABLE", "", $string);
		$string = str_ireplace(" INTO ", "", $string);
		$string = str_ireplace("WHERE", "", $string);
		$string = addslashes($string);
		$string = strip_tags($string);
		$string = trim($string);
	
		return $string;
	}
	
	public function __destruct(){
		$this->fechaConexao();
	}
	
}

?>