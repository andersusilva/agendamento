<?php
	$host = "localhost";
	$user = "developf_sala";
	$pass = "j]8T2fkC?h6h";
	$base = "developf_agendamento";
	
	$conn = new mysqli($host, $user, $pass, $base);
	
	if($conn->connect_error){
		die("Erro: ".$conn->connect_error);
	}
?>