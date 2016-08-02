<?php
class Usuario{
	private $idUsuario;
	private $nomeUsuario;
	private $login;
	private $senha;
	private $tipoUsuario;
	
	
	public function __construct($data = null){
		if($data !== null){
			if (is_array($data)) {
				$this->idUsuario = $data['idUsuario'];
				$this->nomeUsuario = $data['nomeUsuario'];
				$this->login = $data['login'];
				$this->senha = $data['senha'];
				$this->tipoUsuario = $data['tipoUsuario'];
			}elseif (is_object($data)){
				$this->idUsuario = $data->idUsuario;
				$this->nomeUsuario = $data->nomeUsuario;
				$this->login = $data->login;
				$this->senha = $data->senha;
				$this->tipoUsuario = $data->tipoUsuario;
			}
		}
	}
	
	
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	
	public function setIdUsuario($idu){
		$this->idUsuario = $idu;
	}
	
	public function getNomeUsuario(){
		return $this->nomeUsuario;
	}
	
	public function setNomeUsuario($nu){
		$this->nomeUsuario = $nu;
	}
	
	public function getLogin(){
		return $this->login;
	}
	
	public function setLogin($l){
		$this->login = $l;
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	public function setSenha($s){
		$this->senha = $s;
	}
	
	public function getTipoUsuario(){
		return $this->tipoUsuario;
	}
	
	public function setTipoUsuario($tu){
		$this->tipoUsuario = $tu;
	}
}
?>