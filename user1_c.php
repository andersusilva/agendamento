<?php
$destruir=$_GET["destruir"];
if($destruir){
	session_destroy();
	echo("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ /* window.navigate('index.php'); */ window.close(); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
	exit();
}
?>

		<TITLE><?php echo $L_TITULO; ?></TITLE>

			<style type="text/css">
			<!--
			.bordas {
				border: 1px solid #999999;
			}
			-->
			</style>

		<body topmargin="0" leftmargin="0" rightmargin="0" marginheight="0" marginwidth="0">


<?php

include('conecta.php');


function mostrarsemana($data,$cod_sala,$qual_semana,$prox_semana,$dia_atual){ // INICIO_FUNCTION_MOSTRARSEMANA

	include('languages/padrao.inc.php');
	include('conecta.php');

	?>

	<script Language="JavaScript">

		function alterarsala(){

			form = document.sala
			form.action = ''
			form.submit();	
	
		}


	</script>



<script Language="JavaScript">

		function checkna() {
			if(document.sas.na.checked == true){
				document.sas.ticket.value = "<?php echo $L_SEM_ADICIONAIS; ?>"
				document.sas.ticket.disabled = true
			}
			if(document.sas.na.checked == false){
				document.sas.ticket.value = ""
				document.sas.ticket.disabled = false
			}
		}

		function valida(){
		form = document.sas

		reservar = form.reservar
		tempo = form.tempo.value
		ticket = form.ticket.value

			marcado = -1

			for (i=0; i<form.reservar.length; i++) {
				if (document.sas.reservar[i].checked) {
					marcado = i
				}
			}
	
			if (marcado == -1) {
				alert("<?php echo $L_ALERTA_01; ?>");
				form.reservar[0].focus();
				return;
			}

			marcado2 = -1

			for (i=0; i<form.tempo.length; i++) {
				if (document.sas.tempo[i].checked) {
					marcado2 = i
				}
			}
	
			if (marcado2 == -1) {
				alert("<?php echo $L_ALERTA_02; ?>");
				form.tempo[0].focus();
				return;
			}

			if(ticket == ''){
				alert("<?php echo $L_MENSAGEM_01; ?>")
				form.ticket.focus()
				return;
			} 

			if(tempo == ''){
				alert("<?php echo $L_ALERTA_03; ?>")
				form.tempo.focus()
				return;
			} 

		
			form.action = '?enviar=sim'
			form.submit();	
	
		}


	</script>



	<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;"></div>

	<script language="JavaScript" src="overlib.js" type="text/javascript">
	</script>

	<?php


	$data1=$data;
	$data_prox=$data;
	$data2=$data;
	$data=explode("-",$data);

	$fgh=explode("-",$dia_atual);
	$mesfgh=$fgh[1];

	$dia=$data[2];  
	$dia2=$dia;
	$mes=$data[1]; 
	$mesd=$data[1];
	$ano=$data[0];

	$data_sem=$ano."-".$mes."-".$dia;

	$ano2=$ano;
	$mes2=$mes;

	$novomes=0;
	$novomes2=0;

	$tempo = date("w", mktime(0, 0, 0, $mes, $dia, $ano));

	$dia_da_semana2=$tempo;

	if($dia_da_semana2==1){ $dia_da_semana=$L_SEUNDA_FEIRA;   $inicio=0;  $inicio2=0;  $iniciok=1;  															$inicio_prox=7; }
	if($dia_da_semana2==2){ $dia_da_semana=$L_TERCA_FEIRA;     $inicio=-1; $inicio2=-1; $iniciok=2; if($dia==1){ $inicio6=0; } 												$inicio_prox=8; }
	if($dia_da_semana2==3){ $dia_da_semana=$L_QUARTA_FEIRA;    $inicio=-2; $inicio2=-2; $iniciok=3; if($dia==1){ $inicio6=-1; } if($dia==2){ $inicio6=0; } 								$inicio_prox=9; }
	if($dia_da_semana2==4){ $dia_da_semana=$L_QUINTA_FEIRA;    $inicio=-3; $inicio2=-3; $iniciok=4; if($dia==1){ $inicio6=-2; } if($dia==2){ $inicio6=-1; } if($dia==3){ $inicio6=0; }  					$inicio_prox=10; }
	if($dia_da_semana2==5){ $dia_da_semana=$L_SEXTA_FEIRA;     $inicio=-4; $inicio2=-4; $iniciok=5; if($dia==1){ $inicio6=-3; } if($dia==2){ $inicio6=-2; } if($dia==3){ $inicio6=-1; } if($dia==4){ $inicio6=0; } 	$inicio_prox=11; }
	if($dia_da_semana2==6){ $dia_da_semana=$L_SABADO;          $inicio=-5; $inicio2=-5; $iniciok=6; if($dia==1){ $inicio6=-4; } if($dia==2){ $inicio6=-3; } if($dia==3){ $inicio6=-2; } if($dia==4){ $inicio6=-1; } 	$inicio_prox=12; }
	if($dia_da_semana2==0){ $dia_da_semana=$L_DOMINGO; $dia++; $inicio=0;  $inicio2=0;  $iniciok=1; 															$inicio_prox=13; } //CASO SEJA DOMINGO


	$nomes_meses["01"]=$L_JANEIRO;
	$nomes_meses["02"]=$L_FEVEREIRO;
	$nomes_meses["03"]=$L_MARCO;
	$nomes_meses["04"]=$L_ABRIL;
	$nomes_meses["05"]=$L_MAIO;
	$nomes_meses["06"]=$L_JUNHO;
	$nomes_meses["07"]=$L_JULHO;
	$nomes_meses["08"]=$L_AGOSTO;
	$nomes_meses["09"]=$L_SETEMBRO;
	$nomes_meses["10"]=$L_OUTUBRO;
	$nomes_meses["11"]=$L_NOVEMBRO;
	$nomes_meses["12"]=$L_DEZEMBRO;

	$data_atual78=explode("-",$dia_atual);

	$dia78=$data_atual78[2];  
	$mes78=$data_atual78[1]; 
	$ano78=$data_atual78[0];

	$tempo78 = date("D", mktime(0, 0, 0, $mes78, $dia78, $ano78));

	if($tempo78=="Mon"){ $tempo78=$L_SEUNDA_FEIRA;  }
	if($tempo78=="Tue"){ $tempo78=$L_TERCA_FEIRA;   }
	if($tempo78=="Wed"){ $tempo78=$L_QUARTA_FEIRA;  }
	if($tempo78=="Thu"){ $tempo78=$L_QUINTA_FEIRA;  }
	if($tempo78=="Fri"){ $tempo78=$L_SEXTA_FEIRA;   }
	if($tempo78=="Sat"){ $tempo78=$L_SABADO;        }
	if($tempo78=="Sun"){ $tempo78=$L_DOMINGO;       }

	$horaagora05=date("H");

	if(($horaagora05>=00)&&($horaagora05<=11)){ echo("<b>$L_BOM_DIA</b> "); }
	if(($horaagora05>=12)&&($horaagora05<=17)){ echo("<b>$L_BOA_TARDE</b> "); }
	if(($horaagora05>=18)&&($horaagora05<=23)){ echo("<b>$L_BOA_NOITE</b> "); }

	echo $_SESSION["nome"];

	echo(".<br>$L_HOJE_E "); echo $dia78; echo(" $L_DE "); echo $nomes_meses["$mes78"]; echo(" $L_DE "); echo $ano78; echo(" ($tempo78)");


	$inicio3=$inicio;
	$inicio4=$inicio;

	$nome_semana[1]=$L_SEGUNDA;
	$nome_semana[2]=$L_TERCA;
	$nome_semana[3]=$L_QUARTA;
	$nome_semana[4]=$L_QUINTA;
	$nome_semana[5]=$L_SEXTA;
	$nome_semana[6]=$L_SABADO;

	$fonte[1]="<font face='arial' size='1'>";
	$fonte[2]="<font face='arial' size='2'><center>";
	$fonte[3]="<font face='arial' size='3'><center>";
	$cor_fonte["azulescura"]="<font color='#4682B4'>";
	$cor_fonte["azul"]="<font color='#4682B4'>";
	$cor_fonte["branca"]="<font color='#ffffff'>";
	$cor_fonte["preta"]="<font color='#000000'>";
	//$cor_celula["preta"]="BGCOLOR='#000000'";
	$cor_celula["preta"]="BGCOLOR='#B0B0B0'";
	$cor_celula["branca"]="BGCOLOR='#ffffff'";
	$cor_celula["azulescura"]="BGCOLOR='#4682B4'";
	$cor_celula["azulclara"]="BGCOLOR='#B0C4DE'";
	$cor_celula["cinza"]="BGCOLOR='#BEBEBE'";
	$cor_celula["cinzaclaro"]="BGCOLOR='#BfBfBf'";
	$cor_celula["marrom"]="BGCOLOR='#A52A2A'";
	$cor_celula["vermelha"]="BGCOLOR='#F08080'";
	$cor_celula["azul"]="BGCOLOR='#00BFFF'";
	//$cor_celula["azulnao"]="BGCOLOR='#104E8B'";
	$cor_celula["azulnao"]="BGCOLOR='#BfBfBf'";
	$hora_inicio=8; // HORA INICIAL 
	$hora_tab=8; // HORA INICIAL
	$hora_final=21; // HORA FINAL
	$total_horas=14; // TOTAL HORAS + 1
	$tamanho_celula=70; // LARGURA CELULAS
	$altura_celula=""; // ALTURA CELULAS

	?>

	<TABLE border="0" cellpadding="0" cellspacing="0">	
	<TR><TD>

	<TABLE width="520" border="0" cellpadding="0" cellspacing="0">
		<TR>
			<TD class="bl1">
			<form method="POST" action="" name="sala">
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?>
				<b><img src="img/arrow3.gif" width="14" height="11" alt="">
				<?php echo $L_SALA; ?>
				</b>


			</TD>
			<TD >  <br> 
				<input type="hidden" name="env_cod_sala" border=0 value="Alterar Sala">
					<input border="0" type="hidden" name="inicio1" border=0 value="<?php echo $inicio; ?>">
					<input border="0" type="hidden" name="prox_semana" border=0 value="<?php echo $prox_semana; ?>">
					<input border="0" type="hidden" name="dia_atual" border=0 value="<?php echo $dia_atual; ?>">
				<select name="cod_sala" OnChange="javascript:alterarsala();">
					<?php
						mysql_select_db('sala'); ($banco);
						$sql5 = "SELECT * from salas ORDER BY nome_sala";
						$result5 = mysql_query($sql5) or die(mysql_error());
		
						while($linha5=mysql_fetch_array($result5)) { 
					?>
						<option value="<?php echo $linha5["cod_sala"]; ?>" <?php if($cod_sala==$linha5["cod_sala"]){ echo ("selected=\"\""); } ?> ><?php echo $linha5["nome_sala"]; ?></option>
					<?php
						}
					?>
				</select>
				</form>
			</TD>
			<TD > <br>
				
				<?php echo $fonte[1]; echo $cor_fonte["azul"]; ?> <!-- visitas desde Jan/04.<br><br> -->

			</TD>
			<TD width="20" >  

					<?php
						if($qual_semana==2){
					?>

							<form method="POST" action="" name="anterior"><br>
								<input border="0" type="hidden" name="cod_sala" border=0 value="<?php echo $cod_sala; ?>">
								<input border="0" type="hidden" name="data1" border=0 value="<?php echo $data_prox; ?>">
								<input border="0" type="hidden" name="inicio1" border=0 value="<?php echo $inicio; ?>">
								<input border="0" type="hidden" name="prox_semana" border=0 value="<?php echo $prox_semana; ?>">
								<input border="0" type="hidden" name="dia_atual" border=0 value="<?php echo $dia_atual; ?>">
								<input border="0" class="bordas" type="Submit" name="anterior" border=0 value="<<">

							</form>

					<?php
						}
					?>
			</TD>
			<TD width="70" align="center"  >
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?> <b><?php echo $L_SEMANA; ?></b>
			</TD >
			<TD width="20" align="left"  >
	
					<?php
						if($qual_semana==1){ // INICIO_IF_X

					 ?>
							<form method="POST" action="" name="proxima"><br>
								<input border="0" type="hidden" name="cod_sala" border=0 value="<?php echo $cod_sala; ?>">
								<input border="0" type="hidden" name="data1" border=0 value="<?php echo $data1; ?>">
								<input border="0" type="hidden" name="inicio1" border=0 value="<?php echo $iniciok; ?>">
								<input border="0" type="hidden" name="inicio_prox" border=0 value="<?php echo $inicio_prox; ?>">
								<input border="0" type="hidden" name="prox_semana" border=0 value="<?php echo $prox_semana; ?>">
								<input border="0" type="hidden" name="dia_atual" border=0 value="<?php echo $dia_atual; ?>">
								<input border="0" class="bordas" type="Submit" name="proxima" border=0 value=">>">
							</form>
					<?php
						} // FIM IF_X
					?>
			</TD>
		</TR>
	</TABLE>

	<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td background="" bgcolor="#9EC8FF"><img src="img/spacer.gif" width="1" height="1" alt=""><br></td></tr></table>

	<br>
	<TABLE BORDER='0' background="" BGCOLOR='#9EC8FF'>
		<form method="POST" action="" name="sala">
		<?php
		
		for($x=0;$x<=$total_horas;$x++){ // INICIO_FOR_LINHA

		?>

		<TR>

			<?php

			for($y=0;$y<7;$y++){ // INICIO_FOR_COLUNA



			?>

			<!-- <TD WIDTH='<?php echo $tamanho_celula; ?>' -->

			<?php

					if(($x>=1)&&($y==0)){  } 

			?>

				

				<?php

				if(($x==0)&&($y==0)){
					?> <TD WIDTH='<?php echo $tamanho_celula; ?>' HEIGHT='<?php echo $altura_celula; ?>' <?php
					echo(" bgcolor='#4682B4' ");
					?> BORDER='0'> <?php
					echo $fonte[2]; echo $cor_fonte["branca"]; 

					echo("<b> $L_HORARIO_INICIAL </b>");
				}
				if(($x==0)&&($y>=1)){ // IMPRIMIR SEMANA 1a LINHA
					?> <TD colspan=2  WIDTH='<?php echo $tamanho_celula; ?>' HEIGHT='<?php echo $altura_celula; ?>' <?php
					echo ("bgcolor='#EDF5FF'");
					?> BORDER='0' > <?php


					if($qual_semana==2){

						$rt = date("d",mktime (0, 0, 0, date("m"), date("d")+$inicio+7, date("Y")));
						$mes = date("m",mktime (0, 0, 0, date("m"), date("d")+$inicio+7, date("Y")));
						$ano = date("Y",mktime (0, 0, 0, date("m"), date("d")+$inicio+7, date("Y")));

					} else {

						$rt = date("d",mktime (0, 0, 0, date("m"), date("d")+$inicio, date("Y")));
						$mes = date("m",mktime (0, 0, 0, date("m"), date("d")+$inicio, date("Y")));
						$ano = date("Y",mktime (0, 0, 0, date("m"), date("d")+$inicio, date("Y")));

					}
						echo $fonte[2]; echo $cor_fonte["azul"];
					
						echo("<b>"); echo $nome_semana[$y]; echo("</b>");
						echo ("<br>");

						// if($rt<10){ $rt="0".$rt; }
					
						echo $fonte[1]; echo $rt; echo ("-"); echo $mes; echo ("-"); echo $ano;

									
				} 



				if(($x>=1)&&($y==0)){ // IMPRIMIR HORA 1a COLUNA E DEFINIR HORA
					?> <TD WIDTH='<?php echo $tamanho_celula; ?>' HEIGHT='<?php echo $altura_celula; ?>' <?php
					echo ("bgcolor='#4F94CD'"); 
					?> BORDER='0' > <?php

					echo $fonte[2]; echo $cor_fonte["branca"];
						if($hora_inicio<=9){
							echo("<b>");echo("0");
						}
					echo("<b>"); echo $hora_inicio; 
					echo(":00"); echo("</b>");
					$hora_inicio++;

					if($hora_tab<=9){
						$hora="0".$hora_tab;
					} else {
						$hora=$hora_tab;
					}
					$hora_tab++;

				}

				
				
				if(($x>=1)&&($y>=1)){ // PREENCHER CELULAS DE RESERVA

					if($qual_semana==2){

						$rt2 = date("d",mktime (0, 0, 0, date("m"), date("d")+$inicio2+7, date("Y")));
						$mes2 = date("m",mktime (0, 0, 0, date("m"), date("d")+$inicio2+7, date("Y")));
						$ano2 = date("Y",mktime (0, 0, 0, date("m"), date("d")+$inicio2+7, date("Y")));

					} else { 

						$rt2 = date("d",mktime (0, 0, 0, date("m"), date("d")+$inicio2, date("Y")));
						$mes2 = date("m",mktime (0, 0, 0, date("m"), date("d")+$inicio2, date("Y")));
						$ano2 = date("Y",mktime (0, 0, 0, date("m"), date("d")+$inicio2, date("Y")));

					}


					// if($rt2<10){ $rt2="0".$rt2; }

					$datatempo=$ano2."-".$mes2."-".$rt2." ".$hora.":00:00";   /* echo $datatempo; echo ("MES: $mes"); echo ("- MES2: $mes2"); */

					$dataso=$ano2."-".$mes2."-".$rt2;

					$tempof=date("Y-m-d");
				
					$diaso=explode("-",$tempof);

					$diaso1=$diaso[2];

					$horaso=date("H");

					if($diaso1<=9){ $diaso1="0".$diaso1; }

					if($horaso<=9){ $horaso="0".$horaso; }

					mysql_select_db('sala'); ($banco);

					$sql = "SELECT * FROM reservas WHERE datatempo='$datatempo' AND cod_sala='$cod_sala'";
					$resultado = mysql_query($sql) or die(mysql_error());
	
					$linha=mysql_fetch_array($resultado);					


						$dia_atual1=date("d");

						$hora_atual=date("H");

						$min_atual1=date("i");

						$ano_atual=date("Y");

						$mes_atual=date("m");


					

						echo $fonte[1];
						echo $cor_fonte["preta"];


					if($linha["cod_sala"]==""){
	
						echo("<TD  bgcolor='#C6E2FF'><center>");

							?>

							<input type="radio" name="reservar" value="<?php echo $datatempo; ?>"

								<?php

									
									if($mes2<$mesfgh){ echo(" disabled "); } if($mes2==$mesfgh){ if($rt2<$dia_atual1){ echo(" disabled "); $gh=1; } else { $gh=2; } if($rt2==$dia_atual1){ if($hora<=$hora_atual){ echo(" disabled"); $gh=1; } else { $gh=2; } } } ?> OnClick="javascript: alert('<?php echo $L_HORARIO_INICIO; ?> <?php echo $hora; ?>:00');">

							<?php

						echo("</TD>");

					} else {

						echo("<TD bgcolor='#9FB6CD'><center>");

							$matricula=$linha["matricula"];

							mysql_select_db('sala'); ($banco);

							$sql1 = "SELECT * FROM sups WHERE matsup='$matricula'";
							$resultado1 = mysql_query($sql1) or die(mysql_error());
							$linha1=mysql_fetch_array($resultado1);
							$supervisor=$linha1["nome_sup"];
							$ticket=$linha["ticket"];
	
							echo("<a href=\"javascript:\" onMouseOver=\"return overlib('<html><table class=bordas bgcolor=#ffffff><tr><td><font face=arial color=#000000 size=2><b>Por:</b> $supervisor<br><b>Ticket:</b> $ticket</td></tr></table></html>',STATUS,'RESERVADO',FULLHTML)\" onMouseOut=\"nd()\"><b>R</b></a>");

						echo("</TD>");
	
					}


					

					mysql_select_db('sala'); ($banco);

					$datatempo=$ano2."-".$mes2."-".$rt2." ".$hora.":30:00";

					$sql = "SELECT * FROM reservas WHERE datatempo='$datatempo' AND cod_sala='$cod_sala'";
					$resultado = mysql_query($sql) or die(mysql_error());
	
					$linha=mysql_fetch_array($resultado);

					if($linha["cod_sala"]==""){

						echo("<TD bgcolor='#B9D3FF'><center>");

	
							?> <input type="radio" name="reservar" value="<?php echo $datatempo; ?>"

									<?php

									if($mes2<$mesfgh){ echo(" disabled "); } if($mes2==$mesfgh){ if($rt2<$dia_atual1){ echo(" disabled "); $gh=1; } else { $gh=2; } if($rt2==$dia_atual1){ if($hora<$hora_atual){ echo(" disabled"); } if($min_atual>=30){ echo(" disabled"); $gh=1; } else { $gh=2; } } } ?> OnClick="javascript: alert('<?php echo $L_HORARIO_INICIO; ?> <?php echo $hora; ?>:30');">
							

							<?php

						echo("</TD>");

					} else {


						echo("<TD bgcolor='#9FB6CD'><center>");

							$matricula=$linha["matricula"];

							mysql_select_db('sala'); ($banco);

							$sql1 = "SELECT * FROM sups WHERE matsup='$matricula'";
							$resultado1 = mysql_query($sql1) or die(mysql_error());
							$linha1=mysql_fetch_array($resultado1);
							$supervisor=$linha1["nome_sup"];
							$ticket=$linha["ticket"];
		
							echo("<a href=\"javascript:\" onMouseOver=\"return overlib('<html><table class=bordas bgcolor=#ffffff><tr><td><font face=arial color=#000000 size=2><b>Por:</b> $supervisor<br><b>Ticket:</b> $ticket</td></tr></table></html>',STATUS,'RESERVADO',FULLHTML)\" onMouseOut=\"nd()\"><b>R</b></a>");

						echo("</TD>");

					}
		
				}
			
				mysql_select_db('sala'); ($banco);

				?>

			</TD>

			<?php

			if(($x==0)&&($y>=1)){ $inicio++; }
			if(($x>=1)&&($y>=1)){ $inicio2++; }

			

			} // FINAL_FOR_COLUNA

			$inicio2=$inicio3;
			$novomes2=0;
			$mes2=$mesd;
			// $marc2=0; ANTIGO
			?>

		</TR>

		<?php

		} // FINAL_FOR_LINHA

		?>

	</TABLE>
	<TABLE width="520" >
		<tr>
			<td >
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?> <b><?php echo $L_MENSAGEM_02; ?> <a href="apagar.php"><?php echo $L_AQUI; ?></a>.</b><br>
				<?php echo $L_MENSAGEM_03; ?>
			</td>
		</TD>
	</table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td background="" bgcolor="#9EC8FF"><img src="img/spacer.gif" width="1" height="1" alt=""><br></td></tr></table>

	<TABLE width="520" width="522" >
		<TR>
			<TD ><center>
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?><b><?php echo $L_DURACAO; ?>: (<?php echo $L_HORAS; ?>)<br>
				<input type="radio" name="tempo" value="0" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: ½ <?php echo $L_HORA; ?>');">  ½ &nbsp;&nbsp;
				<input type="radio" name="tempo" value="1" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 1 <?php echo $L_HORA; ?>');"> 01 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="2" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 2 <?php echo $L_HORAS; ?>');"> 02 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="3" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 3 <?php echo $L_HORAS; ?>');"> 03 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="4" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 4 <?php echo $L_HORAS; ?>');"> 04 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="5" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 5 <?php echo $L_HORAS; ?>');"> 05 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="6" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 6 <?php echo $L_HORAS; ?>');"> 06 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="11" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 11 <?php echo $L_HORAS; ?>');"> 11 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="14" OnClick="javascript: alert('<?php echo $L_DURACAO; ?>: 14 <?php echo $L_HORAS; ?>');"> 14 &nbsp;&nbsp;

			</TD>
		</TR>
	</TABLE>
	<TABLE BORDER="0" WIDTH="100%">
		<TR>
			<TD ALIGN="LEFT" WIDTH="50%">
				<Table>
					<tr>
	
						<TD>
							<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?>
							<b>Ticket: <br>
						</tD>
						<TD>
							<input type="text" name="ticket" class="bordas" border="0" size="15" value="">
							<input type="checkbox" name="na" OnClick="javascript: checkna();" ><b><?php echo $fonte[1]; echo $cor_fonte["azul"]; ?><?php echo $L_SA; ?>
							
							
						</TD>
					</tr>
				</TABLE>
			</TD>
			<TD ALIGN="CENTER" WIDTH="20%">
				<?php echo $fonte[1]; echo $cor_fonte["branca"]; ?>
				<input border="0" class="bordas" type="hidden" name="cod_sala"  value="<?php echo $cod_sala; ?>">
				<input border="0" class="bordas" type="hidden" name="prox_semana"  value="<?php echo $prox_semana; ?>">
				<input border="0" class="bordas" type="hidden" name="dia_atual"  value="<?php echo $dia_atual; ?>">
				<input border="0" class="bordas" type="hidden" name="qualsemana1"  value="<?php echo $qual_semana; ?>">
				<BUTTON border="0" class="bordas" OnClick="AAA=window.open('user1.php?destruir=sim','_self');"><?php echo $L_SAIR; ?></BUTTON>
			</TD>
			<TD>
				<!-- <BUTTON border="0" class="bordas" OnClick="AAA=window.open('http://LINK_USUARIO,'_blank');">URL adiconal</BUTTON> -->

			</TD>
			<TD ALIGN="RIGHT" WIDTH="33%">
				<input border="0" class="bordas" type="button" name="enviar"  value="<?php echo $L_RESERVAR; ?> >>" onClick="javascript:valida();">
			</TD>
		</TR>
	</form>
	</TABLE>


	</TD></TR>
	</TABLE>

	<center><font face="verdana,arial" size="1" color="#4682B4">UDF v.<?php include('versao.inc.php'); echo $versao; ?> - Andersu Silva - http://www.andersusilva.com
	<?php


} // FINAL_FUNCTION_MOSTRARSEMANA


// -------------------------------------------------------------------------------------------------- //
// ---------           ENVIAR          -------------------------------------------------------------- //
// -------------------------------------------------------------------------------------------------- //


$enviar=$_GET["enviar"];

if($enviar=="sim"){ // INICIO_ENVIAR_0

	$matricula=$_SESSION["matricula"];
	$prox_semana=$_POST["prox_semana"];
	$dia_atual=$_POST["dia_atual"];

	$senha=$_SESSION["senha"];
	$cod_sala=$_POST["cod_sala"];
	$qual_semana1=$_POST["qualsemana1"];

	mysql_select_db('sala'); ($banco);

	$sql1 = "SELECT * FROM sups WHERE matsup='$matricula'";
	$resultado1 = mysql_query($sql1) or die(mysql_error());
	$linha1=mysql_fetch_array($resultado1);

	if(($linha1["matsup"]==$matricula)&&($linha1["senha"]==$senha)){ // REL_000

		$reservar=$_POST["reservar"];
		$tempo=$_POST["tempo"];

		if($tempo==0){ $tempo_meio=1; }

		$dia_hora=explode(" ",$reservar);
		$dia_mes_ano=explode("-",$dia_hora[0]);
		$hora_min_seg=explode(":",$dia_hora[1]);
		$hora_inicio=$hora_min_seg[0];
		$hora_inicio2=$hora_min_seg[0];
		$min_inicio=$hora_min_seg[1];

		$e_ano=$dia_mes_ano[0];
		$e_mes=$dia_mes_ano[1];
		$e_dia=$dia_mes_ano[2];

		$email_data=$e_dia."/".$e_mes."/".$e_ano;
		$email_hora=$dia_hora[1];
		
		$existe=0;

		mysql_select_db('sala'); ($banco);

		$sql8 = "SELECT * FROM salas WHERE cod_sala='$cod_sala'";
		$resultado8 = mysql_query($sql8) or die(mysql_error());
		$linha8=mysql_fetch_array($resultado8);

		$datan=$dia_hora[0];


		if(($min_inicio==00)&&($tempo==0)){ // REF_001

			$verificar_existe=$datan." ".$hora_inicio.":00:00";
	
			$ticket=$_POST["ticket"];

			mysql_select_db('sala'); ($banco);

			$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
			$resultado = mysql_query($sql) or die(mysql_error());
	
			$linha=mysql_fetch_array($resultado);

			if($linha["cod_sala"]==$cod_sala){
				$existe++;
				echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_04 '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
			}

		} // REF_001


		if(($min_inicio==30)&&($tempo==0)){ // REF_002

			$verificar_existe=$datan." ".$hora_inicio.":30:00";
	
			$ticket=$_POST["ticket"];

			mysql_select_db('sala'); ($banco);

			$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
			$resultado = mysql_query($sql) or die(mysql_error());
	
			$linha=mysql_fetch_array($resultado);

			if($linha["cod_sala"]==$cod_sala){
				$existe++;
				echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_04 '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
			}

		} // REF_002


		if(($min_inicio==00)&&($tempo>=1)){ // REF_003

			for($i=1;$i<=$tempo;$i++){

				$verificar_existe=$datan." ".$hora_inicio.":00:00";

				$ticket=$_POST["ticket"];

				mysql_select_db('sala'); ($banco);

				$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
				$resultado = mysql_query($sql) or die(mysql_error());
		
				$linha=mysql_fetch_array($resultado);

				if($linha["cod_sala"]==$cod_sala){
					$existe++;
					echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_04 '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
				}

				if(($tempo>=1)&&($tempo!=$i)){

					$verificar_existe=$datan." ".$hora_inicio.":30:00";

					$ticket=$_POST["ticket"];

					mysql_select_db('sala'); ($banco);

					$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
					$resultado = mysql_query($sql) or die(mysql_error());
		
					$linha=mysql_fetch_array($resultado);

					if($linha["cod_sala"]==$cod_sala){
						$existe++;
						echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_04 '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
					}

				}

					if($hora_inicio<=9){
						$hora_inicio="0".$hora_inicio+1;
					} else {
						$hora_inicio=$hora_inicio+1;
					}
					
			}


		} // REF_003


		if(($min_inicio==30)&&($tempo>=1)){ // INICIO IF 2

			$verificar_existe=$datan." ".$hora_inicio.":30:00";

			$ticket=$_POST["ticket"];

			mysql_select_db('sala'); ($banco);
			$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
			$resultado = mysql_query($sql) or die(mysql_error());
		
			$linha=mysql_fetch_array($resultado);

			if($linha["cod_sala"]==$cod_sala){
				$existe++;
				echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('  $L_MENSAGEM_04 '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
			}

			if($hora_inicio<=9){
				$hora_inicio="0".$hora_inicio+1;
			} else {
				$hora_inicio=$hora_inicio+1;
			}
				
			for($i=1;$i<=$tempo;$i++){

				$verificar_existe=$datan." ".$hora_inicio.":00:00";

				$ticket=$_POST["ticket"];

				mysql_select_db('sala'); ($banco);

				$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
				$resultado = mysql_query($sql) or die(mysql_error());
		
				$linha=mysql_fetch_array($resultado);

				if($linha["cod_sala"]==$cod_sala){
					$existe++;
					echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_04 '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
				}

				if(($tempo>=2)&&($tempo!=$i)){

					$verificar_existe=$datan." ".$hora_inicio.":30:00";

					$ticket=$_POST["ticket"];

					mysql_select_db('sala'); ($banco);

					$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
					$resultado = mysql_query($sql) or die(mysql_error());
		
					$linha=mysql_fetch_array($resultado);

					if($linha["cod_sala"]==$cod_sala){
						$existe++;
						echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_04 '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
					}

				}

					if($hora_inicio<=9){
						$hora_inicio="0".$hora_inicio+1;
					} else {
						$hora_inicio=$hora_inicio+1;
					}
					
			}

		} // FIM IF 2

		mysql_select_db('sala'); ($banco);	

		$datam=$dia_hora[0];

		if($existe==0){ // REF_004

			if(($min_inicio==00)&&($tempo==0)){

				$salvar_data=$datam." ".$hora_inicio2.":00:00";

				mysql_select_db('sala'); ($banco);
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

			}


			if(($min_inicio==30)&&($tempo==0)){

				$salvar_data=$datam." ".$hora_inicio2.":30:00";

				mysql_select_db('sala'); ($banco);
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

			}


			if(($min_inicio==30)&&($tempo>=2)){ // INICIO IF 3

				$salvar_data=$datam." ".$hora_inicio2.":30:00";

				mysql_select_db('sala'); ($banco);
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

				if($hora_inicio2<=9){
					$hora_inicio2="0".$hora_inicio2+1;
				} else {
					$hora_inicio2=$hora_inicio2+1;
				}

				for($i=1;$i<=$tempo;$i++){

					$salvar_data=$datam." ".$hora_inicio2.":00:00";

					mysql_select_db('sala'); ($banco);
	
					$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
	
					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}


					if($tempo!=$i){

						$salvar_data=$datam." ".$hora_inicio2.":30:00";

						mysql_select_db('sala'); ($banco);
	
						$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
		
						if(!mysql_query($sql)){
							echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
							exit();
						}

					}
				
					if($hora_inicio2<=9){
						$hora_inicio2="0".$hora_inicio2+1;
					} else {
						$hora_inicio2=$hora_inicio2+1;
					}

				}

			} // FIM IF 3


			if(($min_inicio==30)&&($tempo==1)){ // INICIO IF 5

				$salvar_data=$datam." ".$hora_inicio2.":30:00";

				mysql_select_db('sala'); ($banco);
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

				if($hora_inicio2<=9){
					$hora_inicio2="0".$hora_inicio2+1;
				} else {
					$hora_inicio2=$hora_inicio2+1;
				}


				$salvar_data=$datam." ".$hora_inicio2.":00:00";

				mysql_select_db('sala'); ($banco);
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
	
				if(!mysql_query($sql)){
					echo ("<b><font face=\"arial,verdana\" size=\"-1\">  $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
					exit();
				}

			} // FIM IF 5




			if(($min_inicio==00)&&($tempo>=1)){ // INICIO IF 4

				for($i=1;$i<=$tempo;$i++){

					$salvar_data=$datam." ".$hora_inicio2.":00:00";

					mysql_select_db('sala'); ($banco);
	
					$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
	
					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

					if($tempo>=1){

						$salvar_data=$datam." ".$hora_inicio2.":30:00";

						mysql_select_db('sala'); ($banco);
	
						$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
		
						if(!mysql_query($sql)){
							echo ("<b><font face=\"arial,verdana\" size=\"-1\"> $L_MENSAGEM_05 </i><br> ERRO MySQL:</b> ". mysql_error());
							exit();
						}

					}
				
					if($hora_inicio2<=9){
						$hora_inicio2="0".$hora_inicio2+1;
					} else {
						$hora_inicio2=$hora_inicio2+1;
					}

				}

			} // FIM IF 4




		$para="Andersu Silva <suporte@andersusilva.com>\n"; // ------------ ENVIO DE E-MAIL -------------
		// $de="Return-Path: <noreply@andersusilva.com>\n";
		$de=$linha1["nome_sup"];
		$sala=$linha8["nome_sala"];
		$titulo="UDF - RESERVA DE SALA - De: ".$de." - Sala: ".$sala." - Data: ".$email_data." - Hora: ".$email_hora." - Duração: ".$tempo;

		// "Return-Path: <$email>\n"

		// $recipient = "$adminName <$adminEmail>";

		$texto="\n------------------------------------------------------------\nVocê acaba de receber um e-mail enviado através do\nUDF - Sistema de Agendamento de Sala (http://sas.seuservidor.com)\nOBS: Não responda esta mensagem.\n------------------------------------------------------------\n\nDe: ".$de."\nSala: ".$sala."\nData: ".$email_data."\nHora: ".$email_hora."\nDuração: ".$tempo." Hora(s)\n\nOBS: NÃO ESQUEÇA DE CONFIRMAR O AGENDAMENTO.";

		// mail ($para, $titulo, $texto, $de);

		?> <SCRIPT LANGUAGE="JavaScript"> function tela(){ alert('<?php echo $L_MENSAGEM_07; ?>'); window.navigate('<?php echo $PHP_SELF; ?>?codsala=<?php echo $cod_sala; ?>&qualsemana=<?php echo $qual_semana1; ?>&prox_semana=<?php echo $prox_semana; ?>&dia_atual=<?php echo $dia_atual; ?>'); } </SCRIPT> <BODY OnLoad="javascript:tela();" > </body> <?php

		} // REF_004
	

	} else {

		echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_06; '); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual=$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");

	} // REL_000	

} else { // ELSE_ENVIAR_0

	$env_cod_sala=$_POST["env_cod_sala"];

	$proxima=$_POST["proxima"];	
	$anterior=$_POST["anterior"];
	$data1=$_POST["data1"];
	$inicio=$_POST["inicio1"];
	$prox_semana=$_POST["prox_semana"];
	$dia_atual=$_POST["dia_atual"];
	
	if(($env_cod_sala)||($proxima)||($anterior)){ // REF_005

		$cod_sala=$_POST["cod_sala"];
		$tempo=date("Y-m-d");

		if($proxima){

			$qual_semana=2;

			mostrarsemana($prox_semana,$cod_sala,$qual_semana,$prox_semana,$dia_atual);
			

		}

		if($anterior){

			$qual_semana=1;

			mostrarsemana($dia_atual,$cod_sala,$qual_semana,$prox_semana,$dia_atual);
			

		}

		if((!$proxima)&&(!$anterior)) {

			$qual_semana=1;

			//echo("3a");
			//mostrarsemana($tempo,$cod_sala,$qual_semana);

			mostrarsemana($dia_atual,$cod_sala,$qual_semana,$prox_semana,$dia_atual);
			

		}




	} else { // ELSE_REF_005


		$proxima=$_POST["proxima"];	
		$anterior=$_POST["anterior"];
		$data1=$_POST["data1"];
		$inicio=$_POST["inicio1"];
		$prox_semana=$_POST["prox_semana"];
		$dia_atual=$_POST["dia_atual"];

		$codsala=$_GET["codsala"];
		$qualsemana=$_GET["qualsemana"];

		if($codsala){ // REF_006

			$prox_semana=$_GET["prox_semana"];
			$dia_atual=$_GET["dia_atual"];

			if($qualsemana==2){ // REF_007

				mostrarsemana($prox_semana,$codsala,$qualsemana,$prox_semana,$dia_atual);


			} else { // ELSE_REF_007


				mostrarsemana($dia_atual,$codsala,$qualsemana,$prox_semana,$dia_atual);				

			} // REF_007
			
		
		} else { // ELSE_REF_006


			// $tempo = getdate(mktime(0,0,0,$mes,$dia,$ano));

			// $dia_da_semana=$tempo["weekday"];

 			// $week = strftime("%w", mktime(0, 0, 0, $mes, $dia, $ano));

			// $dia_da_semana=$week;


			$tempo=date("Y-m-d");

			$tempod=$tempo;

			$tempod=explode("-",$tempod);

			$dia=$tempod[2];
			$mes=$tempod[1];
			$ano=$tempod[0];

			$tempo = date("w", mktime(0, 0, 0, $mes, $dia, $ano));

			$dia_da_semana2=$tempo;

			$tempo="";

			$tempo=date("Y-m-d");

			$tempod=$tempo;

			$tempod=explode("-",$tempod);

			$dia=$tempod[2];
			$dia=$dia+6;
			$mes=$tempod[1];
			$ano=$tempod[0];

			// echo $tempo; echo("lll"); echo $dia; echo(" -- "); echo $mes; echo (" -- "); echo $ano; echo (" KKKK ");

			$temp_ano=$ano."-12-31";

			// echo $dia_da_semana; exit();
	
			if($dia_da_semana2==1){   $dia_da_semana="Segunda"; $inicio=0;  $inicio2=0;  $iniciok=1; $inicio_prox=7; }
			if($dia_da_semana2==2){   $dia_da_semana="Terça";   $inicio=-1; $inicio2=-1; $iniciok=2; $inicio_prox=6; }
			if($dia_da_semana2==3){   $dia_da_semana="Quarta";  $inicio=-2; $inicio2=-2; $iniciok=3; $inicio_prox=5; }
			if($dia_da_semana2==4){   $dia_da_semana="Quinta";  $inicio=-3; $inicio2=-3; $iniciok=4; $inicio_prox=4; }
			if($dia_da_semana2==5){   $dia_da_semana="Sexta";   $inicio=-4; $inicio2=-4; $iniciok=5; $inicio_prox=3; }
			if($dia_da_semana2==6){   $dia_da_semana="Sábado";  $inicio=-5; $inicio2=-5; $iniciok=6; $inicio_prox=2; }
			if($dia_da_semana2==0){   $dia_da_semana="Domingo"; $dia++; $inicio=0; $inicio2=0; $inicio_prox=1; } //CASO SEJA DOMINGO


			if($dia<10){ $dia="0".$dia; }

			$prox_semana = date("Y-m-d",mktime (0, 0, 0, date("m"), date("d")+7, date("Y")));

			// $lastmonth = mktime (0, 0, 0, date("m")-1, date("d"),  date("Y"));
			// $nextyear  = mktime (0, 0, 0, date("m"),  date("d"),  date("Y")+1);


			// echo $prox_semana;
			// exit();

			// echo $tempo; echo("-"); echo $prox_semana;  exit(); 

			mostrarsemana($tempo,"1","1",$prox_semana,$tempo);
			// mostrarsemana("2004-04-04","1","1",$prox_semana,"2004-04-04");

		} // FIM_REF_006

	} // FIM_REF_005

} // FIM_ENVIAR_0

?>			

