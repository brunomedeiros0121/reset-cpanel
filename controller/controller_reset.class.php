<?php

/**
 * Description of Model_Servidor
 *
 * @author Bruno Medeiros, brunomedeiros0121@gmail.com
 * @copyright (c) 2017, Bruno Medeiros
 * 
 */
class Controller_Reset extends Model_Reset {
	public function __construct() {
	}
	
	/**
	 * Função responsavel pela comunicação com o banco.
	 * 
	 * @author Bruno Medeiros <brunomedeiros0121@gmail.com>
	 *        
	 * @return json
	 */
	public function controllerResetar() {
		$id = $_POST ['serv'];
		$servico = $_POST ['servico'];
		
		$this->setId ( $id );
		$this->setServico ( $servico );
		
		$retorno = $this->resetar ();
		return $retorno;
	}
}
?>