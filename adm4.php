<?php

	include('conecta.php');

	mysql_select_db('sala');

	$apagarc=$_POST["apagarc"];
	$matricula=$_POST["matricula"];
	$cod_sala=$_POST["cod_sala"];
	$nome=$_POST["nome"];

	function vazio($matricula,$cod_sala,$nome){

					?>
					<HTML>
					<HEAD>
						<SCRIPT LANGUAGE="JavaScript">
					
						function tela(){
		
							alert('POR FAVOR SELECIONE UM HORÁRIO Á SER APAGADO!')
							form = document.verifica
							form.action = 'adm.php'
							form.submit();	
						}
						
						</SCRIPT>
					<HEAD>
					<BODY>
					
							<form name="verifica" method="post" action="adm.php">
								<input type="hidden" name="sup" border=0 value="<?php echo $matricula; ?>">
								<input type="hidden" name="cod_sala" border=0 value="<?php echo $cod_sala; ?>">
								<input type="hidden" name="nome" border=0 value="<?php echo $nome; ?>">
								<input type="hidden" name="ver" border=0 value="1">
							</form>

						<SCRIPT LANGUAGE="JavaScript">
							tela();
						</SCRIPT>
					</BODY>
					</HTML>				
					<?php

					exit();


	}

	if($apagarc==""){ vazio($matricula,$cod_sala,$nome); }

	foreach ($apagarc as $k => $v) {

		/* echo "\$apagarc[$k] => $v.\n"; */

		$ex1=explode("/",$v);

		$datatempo1=$ex1[0];
		$matricula1=$ex1[1];
		$cod_sala=$ex1[2];

		$sql = "DELETE FROM reservas WHERE datatempo = '$datatempo1' AND matricula = '$matricula1' AND cod_sala = $cod_sala";

		if(mysql_query($sql)){
			$deletado=1;
		} else {
			$deletado=0;
		}

	}





	if($deletado==1){

					?>
					<HTML>
					<HEAD>
						<SCRIPT LANGUAGE="JavaScript">
					
						function tela(){
		
							alert('RESERVA(S) APAGADA(S)!')
							form = document.verifica
							form.action = 'adm.php'
							form.submit();	
						}
						
						</SCRIPT>
					<HEAD>
					<BODY>
					
							<form name="verifica" method="post" action="adm.php">
								<input type="hidden" name="sup" border=0 value="<?php echo $matricula1; ?>">
								<input type="hidden" name="cod_sala" border=0 value="<?php echo $cod_sala; ?>">
								<input type="hidden" name="nome" border=0 value="<?php echo $matricula1; ?>">
								<input type="hidden" name="ver" border=0 value="1">
							</form>

						<SCRIPT LANGUAGE="JavaScript">
							tela();
						</SCRIPT>
					</BODY>
					</HTML>				
					<?php

					exit();


	} else {

		echo ("<i><b><font face=\"arial,verdana\" size=\"-1\">REGISTROS NÃO APAGADOS. CONTATE O SUPORTE LOCAL!!!</i><br><br> ERRO MySQL:</b> ". mysql_error());

	}


	/*
	foreach($apagar1 as $apa) { 

		echo $apa; echo("<br>");

	} 
	*/

?>
