<?php 

/**
 * Description of Model_Servico
 *
 * @author Bruno Medeiros, brunomedeiros0121@gmail.com
 * @copyright (c) 2017, Bruno Medeiros
 * 
 */
require_once 'db.class.php';
class Model_Servico {
	
	private $id;
	private $text_id;
	private $text_name;
	private $label;
	
	/**
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * @param string $label
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
	 * @return int $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string $text_id
	 */
	public function getText_id() {
		return $this->text_id;
	}

	/**
	 * @return string $text_name
	 */
	public function getText_name() {
		return $this->text_name;
	}

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param string $text_id
	 */
	public function setText_id($text_id) {
		$this->text_id = $text_id;
	}

	/**
	 * @param string $text_name
	 */
	public function setText_name($text_name) {
		$this->text_name = $text_name;
	}

	
	
	/**
	 * Função responsavel por manter os os dados do serviço no banco.
	 * 
	 * text_id -> Recebe o nome do serviço a ser reiniciado.
	 * text_name -> Recebe o name do input a ser listado.
	 * @author Bruno Medeiros
	 *
	 *   
	 * @return string
	 */
	public function insert(){		
		
		try {
			$sql = ("INSERT INTO `tb_servicos`(`text_id`, `text_name`,`label`) VALUES (:text_id,:text_name,:label)");
			$sql = DB::prepare($sql);
			$sql->bindParam(":text_id", $this->text_id);
			$sql->bindParam(":text_name", $this->text_name);
			$sql->bindParam(":label", $this->label);
			$sql->execute();
			$retorno = "ok";
			return $retorno;			
			
		} catch (Exception $e) {
			$retorno = "erro";
			return $retorno.$e->getMessage();
		}
				
	}
	
	/**
	 * Função responsavel selecionar os serviços do banco , assim gerando os botões com os serviços a serem reiniciados.
	 *
	 * @author Bruno Medeiros
	 *
	 *
	 * @return array
	 */
	public function select(){
		
		try {
			$sql = ("SELECT  `text_id`, `text_name`,`label` FROM `tb_servicos` WHERE 1");
			$sql = DB::prepare($sql);
			$sql->execute();
			$retorno = $sql->fetchAll();
			return $retorno;
			
		} catch (Exception $e) {
			$retorno = "Desculpe houve algum erro....".$e->getMessage();
			return $retorno;
		}
	}
	
	
}

?>