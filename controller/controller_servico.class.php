<?php 
	

/**
 * Description of Controller_Servico
 *
 * @author Bruno Medeiros, brunomedeiros0121@gmail.com
 * @copyright (c) 2017, Bruno Medeiros
 * 
 */


class Controller_Servico extends Model_Servico {
	
	
	public function __construct() {}
	
	
	/**
	 * Função responsavel por setar os dados e enviar para a model.
	 * @author Bruno Medeiros <contato@devworld.net.br>
	 *
	 * @return string
	 */
	public function controllerInsert(){
		
	    $text_id = $_POST['text_id'];
		$text_name = $_POST['text_name'];
		$label = $_POST['lbl_servico'];
		
		
		$this->setText_id($text_id);
		$this->setText_name($text_name);
		$this->setLabel($label);
		
		$retorno = $this->insert();
		return  $retorno;
		
	}
	
	/**
	 * Função responsavel por buscar os dados na model e enviar para a view.
	 * @author Bruno Medeiros <contato@devworld.net.br>
	 *
	 * @return array
	 */
	public function controllerSelect() {
		
		$retorno = $this->select();
		return $retorno;
	}
	
	
	
	
	
}
?>