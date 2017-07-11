<?php

/**
 * Description of Controller_Servidor
 *
 * @author Bruno Medeiros, brunomedeiros0121@gmail.com
 * @copyright (c) 2017, Bruno Medeiros
 * 
 */
class Controller_Servidor extends Model_Servidor {
	public function __construct() {
	}
	/**
	 * Função responsavel pala comunucação com o Banco
	 *
	 * @author Bruno Medeiros <brunomedeiros0121@gmail.com>
	 *        
	 * @return string
	 */
	public function controllerInsert() {
		$nome = $_POST ['nome'];
		$ip = $_POST ['ip'];
		$chave = $_POST ['chave'];
		$descricao = $_POST ['descricao'];
		
		$this->setNome ( $nome );
		$this->setIp ( $ip );
		$this->setChave ( $chave );
		$this->setDescricao ( $descricao );
		
		$retorno = $this->insert ();
		return $retorno;
	}
	
	/**
	 * Função responsavel pala comunucação com o Banco
	 *
	 * @author Bruno Medeiros <brunomedeiros0121@gmail.com>
	 *        
	 * @return string
	 */
	public function controllerSelect() {
		$retorno = $this->select ();
		return $retorno;
	}
}

?>