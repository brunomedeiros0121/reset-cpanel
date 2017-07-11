<?php

/**
 * Description of Model_Reset
 *
 * @author Bruno Medeiros, brunomedeiros0121@gmail.com
 * @copyright (c) 2017, Bruno Medeiros
 * 
 */
class Model_Reset extends Model_Servidor {
	private $servico;
	
	/**
	 *
	 * @return string
	 */
	public function getServico() {
		return $this->servico;
	}
	
	/**
	 *
	 * @param string $servico
	 */
	public function setServico($servico) {
		$this->servico = $servico;
	}
	
	/**
	 * Função responsavel por selecionar a chave e o ip do servidor a serconectado.
	 *
	 * @author Bruno Medeiros <brunomedeiros0121@gmail.com>
	 *        
	 * @return array|string
	 */
	private function selectReset($id) {
		try {
			$sql = ("SELECT `ip`, `chave` FROM `tb_servidores` WHERE `id` = '$id'");
			$sql = DB::prepare ( $sql );
			$sql->execute ();
			$retorno = $sql->fetchAll ();
			return $retorno;
		} catch ( Exception $e ) {
			$retorno = "Desculpe houve algum erro...." . $e->getMessage ();
			return $retorno;
		}
	}
	/**
	 * Função resonsavel por se conectar ao servidor cPanel, enviando como parametros o serviço, ip e token.
	 * Ao termino do reboot o servidor responde em json com a resposta informando se houve sucesso ou não.
	 *
	 * [Resposta]
	 * {
	 * "data": {
	 * "service": "exim"
	 * },
	 * "metadata": {
	 * "version": 1,
	 * "reason": "OK",
	 * "output": {
	 * "raw":
	 * "Waiting for exim to restart....finished.\n\nexim (\/usr\/sbin\/exim
	 * -bd -q1h) running as mailnull with PID 3280 (pidfile check
	 * method)\n\nexim started ok\n"
	 * },
	 * "result": 1,
	 * "command": "restartservice"
	 * }
	 * }
	 * [FinalResposta]
	 *
	 * Logo após a resposta é retornada para a controler e depois a view para que seja tratada e apresentada ao usuario.
	 *
	 * @author Bruno Medeiros <brunomedeiros0121@gmail.com>
	 *        
	 * @return json
	 */
	public function resetar() {
		$retorno = $this->selectReset ( $this->getId () );
		
		if (! is_array ( $retorno )) {
			$auxiliar = array (
					'erro' => 'erro' 
			);
			array_push ( $retorno_r, $auxiliar );
			$retorno = json_encode ( $retorno_r );
			return $retorno;
		} else {
			
			foreach ( $retorno as $value ) {
				
				$ip = $value->ip;
				$chave = $value->chave;
			}
			
			$user = "root";
			$token = $chave;
			
			$query = "https://" . $ip . ":2087/json-api/restartservice?api.version=1&service=" . $this->getServico ();
			
			$curl = curl_init ();
			curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
			curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
			curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
			
			$header [0] = "Authorization: whm $user:$token";
			curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header );
			curl_setopt ( $curl, CURLOPT_URL, $query );
			
			$result = curl_exec ( $curl );
			$resultado = json_decode ( $result, true );
			
			// Realiza o acesso dentro dos array para capturar as informações a serem exibidas ao usuario.
			foreach ( $resultado as $key => $value ) {
				$info = $value ['output'] ['raw'];
				$resposta = $value ['reason'];
				
				$resultado = array (
						"info" => $info,
						"resultado" => $resposta 
				);
			}
			
			$retorno = json_encode ( $resultado, JSON_FORCE_OBJECT );
			
			return $retorno;
			
			curl_close ( $curl );
		}
	}
}
?>