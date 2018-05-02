<?php
	// VOCÊ DEVE ALTERAR conf.inc.php !

	include('conf.inc.php');	

	$db=mysql_connect ($servidor, $usuario, $senhadb)
	or die ('Impossível conectar no bando de dados: ' . mysql_error());

	mysql_select_db($banco);

?>
