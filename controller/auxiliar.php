<?php
if (isset ( $_POST ["acao"] ) && isset ( $_POST ['acao'] ) == "insert_servico") {
	require_once "../inc/autoload.inc.php";
	$obj = new Controller_Servico ();
	exit ( $obj->controllerInsert () );
} else if (isset ( $_POST ["acao_server"] ) && isset ( $_POST ['acao_server'] ) == "insert_server") {
	require_once "../inc/autoload.inc.php";
	$obj = new Controller_Servidor ();
	exit ( $obj->controllerInsert () );
} else if (isset ( $_POST ["reset"] ) && isset ( $_POST ['reset'] ) == "reset_server") {
	require_once "../inc/autoload.inc.php";
	$obj = new Controller_Reset ();
	exit ( $obj->controllerResetar () );
} else {
	$retorno = "erro";
	exit ( $retorno );
}

?>