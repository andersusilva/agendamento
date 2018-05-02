
		<TITLE><?php echo $L_TITULO; ?></TITLE>

			<style type="text/css">
			<!--
			.bordas {
				border: 1px solid #999999;
			}
			-->
			</style>


						<SCRIPT LANGUAGE="JavaScript">
					
						function alterarsala(){
							
							form = document.altsala
							form.action = 'apagar.php'
							form.submit();	
						}

						function envapa(){

							/*
							marcado = -1

							for (i = 0; i < document.apagar.apagar1.length; i++){
								if(document.apagar.apagar1[i].checked == true){
									marcado = 1;
								}
							}

							if(marcado==-1){
								alert('<?php echo $L_MENSAGEM_15; ?>')
								return;
							}
							*/


							form = document.apagar
							form.action = 'apagar3.php'
							form.submit();
						}




				
						</SCRIPT>


<?php

		
			include('conecta.php');

			$nome=$_SESSION["nome"];
			$matricula=$_SESSION["matricula"];
			$datatempo=$_GET["datatempo"];
			$cod_sala=$_POST["cod_sala"];
	
			if(($nome)||($cod_sala)){ // INICIO 


								$tempo1 = date("D");
								$dia_da_semana=$tempo1;

								if($dia_da_semana=="Mon"){    $dia_da_semana="Segunda"; $inicio=0;  }
								if($dia_da_semana=="Tue"){   $dia_da_semana="Terça";   $inicio=-1; }
								if($dia_da_semana=="Wed"){ $dia_da_semana="Quarta";  $inicio=-2; }
								if($dia_da_semana=="Thu"){  $dia_da_semana="Quinta";  $inicio=-3; }
								if($dia_da_semana=="Fri"){    $dia_da_semana="Sexta";   $inicio=-4; }
								if($dia_da_semana=="Sat"){  $dia_da_semana="Sábado";  $inicio=-5; }
								if($dia_da_semana=="Sun"){    $dia_da_semana="Domingo"; $dia++; $inicio=0; $inicio2=0; } //CASO SEJA DOMINGO


								$tempo=date("Y-m-d");

								$tempo=explode("-",$tempo);

								$ano=$tempo[0];
								$mes=$tempo[1];
								$dia=$tempo[2];

								$dia_inicio=$dia;
								$desconto=13+$inicio;
								$dia_final=$dia_inicio+$desconto;

								$tempo_inicio=$ano."-".$mes."-".$dia_inicio." 08:00:00";






					if(($mes==1)||($mes==3)||($mes==5)||($mes==7)||($mes==8)||($mes==10)||($mes==12)){

						if($dia_final>=32){
							$mes++;
							if($mes==12){ $ano++; $mes=1; }
							if($mes<10){ $mes="0".$mes; }
							$marc=1;
							$dia_final=$dia_final-31;
							
						}
						if($marc!=1){
							if($dia_final<=0){
								$dia_final=31+$inicio;
								if($mes==3){ $dia_final=28+$inicio; } 
								$mes--;
								if($mes<10){ $mes="0".$mes; }
								$marc=1;
							}
						}

					}

					if($marc!=1){
						if(($mes==4)||($mes==6)||($mes==9)||($mes==11)){
							if($dia_final>=31){
								$marc=1;
								$dia_final=$dia_final-30;
							
							}
							if($marc!=1){
								if($dia_final<=0){
									$dia_final=30+$inicio;
									$mes--;
									if($mes<10){ $mes="0".$mes; }
									$marc=1;
								}
							}
						}
					}

					if($marc!=1){
						if($mes==2){
							if($dia_final>=29){
								$mes++;
								if($mes<10){ $mes="0".$mes; }
								$marc=1;
								$dia_final=$dia_final-28;
							}
							if($dia_final<=0){
								$dia_final=30+$inicio;
								$mes--;
								if($mes<10){ $mes="0".$mes; }
								$marc=1;
							}
						}
					}

					if($dia_final<10){ $dia_final="0".$dia_final; }

					$tempo_final=$ano."-".$mes."-".$dia_final." 21:00:00";

					$tempo_final2=$ano."-".$mes."-".$dia_final;


					// echo date("D",$tempo_final2);


			?>

				<table width="500" align="center">
					<tr align="center">	
						<td align="center" >
							<br>
							<table width="100%" align="center" >
								<tr align="center">	
									<td align="left">
										<font size=3 face="arial" color="#000000"><?php echo $L_BEM_VINDOA; ?> <b><?php echo $nome; ?></b>.<font size=2 face="arial" color="#000000"><br><?php echo $L_MENSAGEM_16; ?>
										<br>
										<br>
										<?php // echo $dia_final; echo("/"); echo $mes; echo("/"); echo $ano; ?>
									</td>
								</tr>
							</table>
							<br>

						
							<table width="100%">
								<form name="altsala" method="post" action="apagar2.php">
								<tr>	
									<td>
									<font size=2 face="arial">Sala: &nbsp;
		
										<?php
											mysql_select_db("sala");

											$sql = "SELECT * from salas ORDER BY nome_sala";
											$resultado = mysql_query($sql) or die(mysql_error());
										?>
										<select name="cod_sala" OnChange="javascript: alterarsala();">
										<option value=""> </option>
										<?php
										while($linha_sup=mysql_fetch_array($resultado)) { // INICIO WHILE_SUP
										?>
											<option value="<?php echo $linha_sup["cod_sala"]; ?>" <?php if($linha_sup["cod_sala"]==$cod_sala){ echo(" selected"); $nome_sala=$linha_sup["nome_sala"]; } ?> > <?php echo $linha_sup["nome_sala"]; ?> </option>
										<?php
										}
										?>
										</select>
										<input type="hidden" name="nome" value="<?php echo $nome; ?>">
										<input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
									</td>
								</tr>
								</form>
							</table>
							<br>

							<table border="0" width="100%" bgcolor="#9EC8FF">
								<tr align="center">	
									<td align="left">

										<BUTTON border="0" class="bordas" OnClick="AAA=window.open('index.php','_self');">
											SAIR
										</BUTTON>
									</td>
									<td align="right">

										<?php
	
										$sqlus1 = "SELECT * from reservas WHERE matricula = '$matricula' AND datatempo >= '$tempo_inicio' AND cod_sala = '$cod_sala' ORDER BY cod_sala, datatempo ";
										$resultado1 = mysql_query($sqlus1) or die(mysql_error());
										$linha_us1=mysql_fetch_array($resultado1);

										if($linha_us1["matricula"]!=""){ // INICIO IF 001

										?>

										<BUTTON border="0" class="bordas" onclick="javascript: envapa();">
											Apagar
										</BUTTON>

										<?php

										} // FIM IF 001

										?>
									</td>
								</tr>
							</table>

							<table border="0" width="100%" bgcolor="#9EC8FF">
								<form name="apagar" method="post" action="apagar3.php">
								<tr bgcolor="#EDF5FF">

									<td width="5%" align="center"><font size=2 face="arial">

										<center>
										<font color='#4682B4'>

										<input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
										<input type="hidden" name="cod_sala" value="<?php echo $cod_sala; ?>">
										<input type="hidden" name="nome" value="<?php echo $nome; ?>">

										<IMG SRC="img/apagar.gif" alt="Marcar/Desmarcar (Apagar)" border="0">
									</td>
									<td  width="50%" align="left"><font size=2 face="arial"><font color='#4682B4'>
										<b><center>Data
									</td>
									<td  width="45%" align="left"><font size=2 face="arial"><font color='#4682B4'>
										<b><center>Hora
									</td>
								</tr>

								<?php


								
								$sqlus = "SELECT * from reservas WHERE matricula = '$matricula' AND datatempo >= '$tempo_inicio' AND cod_sala = '$cod_sala' ORDER BY cod_sala, datatempo ";
								$resultado = mysql_query($sqlus) or die(mysql_error());
								$ci=0;


								while($linha_us=mysql_fetch_array($resultado)) { // INICIO WHILE_US

									$cod_sala=$linha_us["cod_sala"];
									$sqlus2 = "SELECT * FROM salas WHERE cod_sala = '$cod_sala' ";
									$resultado2 = mysql_query($sqlus2) or die(mysql_error());
									$linha_us2=mysql_fetch_array($resultado2);

								?>

								<tr bgcolor="#<?php if($ci==0){ echo("FFFFFF"); $ci=1; } else { echo("F5F5F5"); $ci=0; } ?>">
									<td align="center"><font size=1 face="arial">
										<center>

										<input type="checkbox" name="apagarc[]" value="<?php echo $linha_us["datatempo"]; ?>">


									</td>
									<td align="left"><font size=1 face="arial">
										<center><?php

												$tempo4=$linha_us["datatempo"];
												$tempo4=explode(" ",$tempo4);
												$data=explode("-",$tempo4[0]);
												$hora=explode(":",$tempo4[1]);
												
												echo $data[2];
												echo("/");
												echo $data[1];
												echo("/");
												echo $data[0];

												$dia_da_semana=date("D",mktime(0, 0, 0, $data[1], $data[2], $data[0]));
	
												if($dia_da_semana=="Sun"){ echo(" ($L_DOMINGO)"); }
												if($dia_da_semana=="Mon"){ echo(" ($L_SEUNDA_FEIRA)"); }
												if($dia_da_semana=="Tue"){ echo(" ($L_TERCA_FEIRA)"); }
												if($dia_da_semana=="Wed"){ echo(" ($L_QUARTA_FEIRA)"); }
												if($dia_da_semana=="Thu"){ echo(" ($L_QUINTA_FEIRA)"); }
												if($dia_da_semana=="Fri"){ echo(" ($L_SEXTA_FEIRA)"); }
												if($dia_da_semana=="Sat"){ echo(" ($L_SABADO)"); }


											?>
									</td>
									<td align="left"><font size=1 face="arial">
										<center><?php echo $hora[0]; echo(":"); echo $hora[1]; ?>
									</td>

								</tr>

								<?php

								} // FIM WHILE_US
								
								?>

								</form>
							</table>
							<br>
							<table width="100%" align="center"  >
								<tr align="center">	
									<td align="left">

									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

			<?php

			} // FIM SALAS


			// -------------------------------------------------------------------------------


			$edsala=$_GET["edsala"];

			if($edsala){ // INICIO ED_SALA

				$nova=$_GET["nova"];

				if($nova=="sim"){

					echo("");

				} else {

				$sql = "SELECT * from salas WHERE cod_sala = $edsala";
				$result = mysql_query($sql) or die(mysql_error());
				$linha=mysql_fetch_array($result);

				}
	
			?>

				<table width="100%" align="center">
					<tr align="center">	
						<td align="center" class="bordas" bgcolor="#ffffff">
	
							<table width="100%" align="center" class="bordas" bgcolor="#483D8B">
								<tr align="center">	
									<td align="left">
										<font size=4 face="arial" color="#ffffff"><b><?php if($nova){ echo("Nova Sala."); } else { echo("Editar Sala"); } ?>
									</td>
								</tr>
							</table>
							
							<table width="100%" align="center">
								<tr>	
									<td  align="right">
										<form name="edusersform" method="post" action="salas.php">
										<font face="arial,verdana" size="2">Nome: </font><br>
									</td>
									<td align="left">	
										
										<input type=text size="40" name="nome" value="<?php if($nova){ echo(""); } else { echo $linha["nome_sala"]; } ?>"><br>
										
									</td>
								</tr>
							</table>
							<table border="0">
								<tr>
									<td align="center">
										<center>
											<?php

											if($nova){
	
											?>
												<input border="0" class="bordas" type="Submit" name="edsala_nova" border=0 value="Adicionar"> 
	
											<?php
	
											} else {
	
											?>

												<input type="Hidden" name="cod_sala" border=0 value="<?php echo $edsala; ?>">
						
												<input border="0" class="bordas" type="Submit" name="edsala_env" border=0 value="Alterar">
												<br><br>
												
										
											<?php

											}	

											?>

										</form>
										
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

			<?php
	
			} // FIM NOVO_SALA


			// ------------------------------------------------------------

	// ----------------------------------------------------------- 

		$edsala_env=$_POST["edsala_env"];

		if($edsala_env){ // INICIO SALA_ENV

			$nome=$_POST["nome"];
			$cod_sala=$_POST["cod_sala"];

			$sql = "UPDATE salas SET nome_sala='$nome',cod_sala='$cod_sala' WHERE cod_sala = $cod_sala";

			if(mysql_query($sql)){

				echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('Sala Atualizada'); window.navigate('salas.php?salas=sim'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
			} else {
				echo ("<i><b><font face=\"arial,verdana\" size=\"-1\">SALA NAO ATUALIZADA. CONTATE O SUPORTE LOCAL!!!</i><br> ERRO MySQL:</b> ". mysql_error());
			}

		} // FIM SALA_ENV	

		// CONTINUAR AQUI


		// -----------------------------------------------------------

		$edsala_nova=$_POST["edsala_nova"];

		if($edsala_nova){ // INICIO SALA_NOVA

			$nome=$_POST["nome"];

			$sql = "INSERT INTO salas (nome_sala) VALUES ('$nome')";

			if(mysql_query($sql)){

				echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('Sala Adicionada'); window.navigate('salas.php?salas=sim'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
			} else {
				echo ("<i><b><font face=\"arial,verdana\" size=\"-1\">SALA NAO ADICIONADA. CONTATE O SUPORTE LOCAL!!!</i><br> ERRO MySQL:</b> ". mysql_error());
			}

		} // FIM SALA_NOVA	


		// ----------------------------------------------------------- USUÁRIOS


		if($datatempo){ // INICIO APAGAR

			// $confirmado=$_GET["confirmado"];

			$matricula=$_GET["matricula"];
			$cod_sala=$_GET["cod_sala"];

			mysql_select_db('sala');

			$sql1 = "SELECT * from sups WHERE matsup = $matricula";
			$result1 = mysql_query($sql1) or die(mysql_error());
			$linha1=mysql_fetch_array($result1);

			$nome=$linha1["nome_sup"];

				mysql_select_db('sala');

				$sql = "DELETE FROM reservas WHERE datatempo = '$datatempo' AND matricula = '$matricula' AND cod_sala = $cod_sala";
			
				if(mysql_query($sql)){

					?>
					<HTML>
					<HEAD>
						<SCRIPT LANGUAGE="JavaScript">
					
						function tela(){
		
							alert('Agendamento apagado!')
							form = document.verifica
							form.action = 'apagar.php'
							form.submit();	
						}
						
						</SCRIPT>
					<HEAD>
					<BODY>
					
							<form name="verifica" method="post" action="apagar.php">
								<input type="hidden" name="matricula" border=0 value="<?php echo $matricula; ?>">
								<input type="hidden" name="nome" border=0 value="<?php echo $nome; ?>">
							</form>

						<SCRIPT LANGUAGE="JavaScript">
							tela();
						</SCRIPT>
					</BODY>
					</HTML>				
					<?php

					exit();

				} else {
					echo ("<i><b><font face=\"arial,verdana\" size=\"-1\">SALA NAO APAGADA. CONTATE O SUPORTE LOCAL!!!</i><br> ERRO MySQL:</b> ". mysql_error());
				}
	

		} // FIM APAGAR
