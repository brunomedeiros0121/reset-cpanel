<?php

/**
 * Description of Model_Servidor
 *
 * @author Bruno Medeiros, brunomedeiros0121@gmail.com
 * @copyright (c) 2017, Bruno Medeiros
 * 
 */
require_once 'db.class.php';
class Model_Servidor {
	private $id;
	private $nome;
	private $ip;
	private $chave;
	private $descricao;
	/**
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getNome() {
		return $this->nome;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getIp() {
		return $this->ip;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getChave() {
		return $this->chave;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDescricao() {
		return $this->descricao;
	}
	
	/**
	 *
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 *
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	/**
	 *
	 * @param string $ip
	 */
	public function setIp($ip) {
		$this->ip = $ip;
	}
	
	/**
	 *
	 * @param string $chave
	 */
	public function setChave($chave) {
		$this->chave = $chave;
	}
	
	/**
	 *
	 * @param string $descricao
	 */
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	/**
	 * Função responsavel por manter os os dados do servidor no banco.
	 *
	 * nome -> recebe o nome do servidor.
	 * ip -> receber o ip do servidor
	 * chave -> recebe o token do servidor cPanel.
	 * descricao -> opcional.
	 *
	 * @author Bruno Medeiros
	 *        
	 *        
	 * @return string
	 */
	public function insert() {
		try {
			$sql = ("INSERT INTO `tb_servidores`(`nome`, `ip`, `chave`, `descricao`) VALUES (:nome,:ip,:chave,:descricao)");
			$sql = DB::prepare ( $sql );
			$sql->bindParam ( ":nome", $this->nome );
			$sql->bindParam ( ":ip", $this->ip );
			$sql->bindParam ( ":chave", $this->chave );
			$sql->bindParam ( ":descricao", $this->descricao );
			$sql->execute ();
			$retorno = "ok";
			return $retorno;
		} catch ( Exception $e ) {
			$retorno = "erro" . $e->getMessage ();
			return $retorno;
		}
	}
	
	/**
	 * Função responsavel por selecionar os servidores do banco , assim gerando os options e populando o select.
	 *
	 * @author Bruno Medeiros <brunomedeiros0121@gmail.com>
	 *        
	 * @return array|string
	 */
	public function select() {
		try {
			$sql = ("SELECT `id`, `nome`, `ip`, `chave`, `descricao` FROM `tb_servidores` WHERE 1");
			$sql = DB::prepare ( $sql );
			$sql->execute ();
			$retorno = $sql->fetchAll ();
			return $retorno;
		} catch ( Exception $e ) {
			$retorno = "Desculpe houve algum erro...." . $e->getMessage ();
			return $retorno;
			;
		}
	}
}

?>