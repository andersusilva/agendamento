<?php

include('languages/padrao.inc.php');

?>

	<style type="text/css">
	<!--
	.bordas {
		border: 1px solid #999999;
	}
	-->
	</style>

	<script Language="JavaScript">

		function alterarsala(){

			form = document.sala
			form.action = ''
			form.submit();	
	
		}


	</script>

<body topmargin="0" leftmargin="0" rightmargin="0" marginheight="0" marginwidth="0">


<?php

include('conecta.php');

function mostrarsemana($data,$cod_sala,$qual_semana,$prox_semana,$dia_atual){ // INICIO_FUNCTION_MOSTRARSEMANA

		// echo $data; echo("--"); echo $prox_semana; echo("--"); echo("$dia_atual");

	?>

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

	$tempo = date("D", mktime(0, 0, 0, $mes, $dia, $ano));

	$dia_da_semana=$tempo;

	if($dia_da_semana=="Mon"){ $dia_da_semana="Segunda-Feira";         $inicio=0;  $inicio2=0;  $iniciok=1;  															$inicio_prox=7; }
	if($dia_da_semana=="Tue"){ $dia_da_semana="Terça-Feira";           $inicio=-1; $inicio2=-1; $iniciok=2; if($dia==1){ $inicio6=0; } 												$inicio_prox=8; }
	if($dia_da_semana=="Wed"){ $dia_da_semana="Quarta-Feira";          $inicio=-2; $inicio2=-2; $iniciok=3; if($dia==1){ $inicio6=-1; } if($dia==2){ $inicio6=0; } 								$inicio_prox=9; }
	if($dia_da_semana=="Thu"){ $dia_da_semana="Quinta-Feira";          $inicio=-3; $inicio2=-3; $iniciok=4; if($dia==1){ $inicio6=-2; } if($dia==2){ $inicio6=-1; } if($dia==3){ $inicio6=0; }  					$inicio_prox=10; }
	if($dia_da_semana=="Fri"){ $dia_da_semana="Sexta-Feira";           $inicio=-4; $inicio2=-4; $iniciok=5; if($dia==1){ $inicio6=-3; } if($dia==2){ $inicio6=-2; } if($dia==3){ $inicio6=-1; } if($dia==4){ $inicio6=0; } 	$inicio_prox=11; }
	if($dia_da_semana=="Sat"){ $dia_da_semana="Sábado";          $inicio=-5; $inicio2=-5; $iniciok=6; if($dia==1){ $inicio6=-4; } if($dia==2){ $inicio6=-3; } if($dia==3){ $inicio6=-2; } if($dia==4){ $inicio6=-1; } 	$inicio_prox=12; }
	if($dia_da_semana=="Sun"){ $dia_da_semana="Domingo"; $dia++; $inicio=0;  $inicio2=0;  $iniciok=1; 															$inicio_prox=13; } //CASO SEJA DOMINGO


	$nomes_meses["01"]="Janeiro";
	$nomes_meses["02"]="Fevereiro";
	$nomes_meses["03"]="Março";
	$nomes_meses["04"]="Abril";
	$nomes_meses["05"]="Maio";
	$nomes_meses["06"]="Junho";
	$nomes_meses["07"]="Julho";
	$nomes_meses["08"]="Agosto";
	$nomes_meses["09"]="Setembro";
	$nomes_meses["10"]="Outubro";
	$nomes_meses["11"]="Novembro";
	$nomes_meses["12"]="Dezembro";

	$data_atual78=explode("-",$dia_atual);

	$dia78=$data_atual78[2];  
	$mes78=$data_atual78[1]; 
	$ano78=$data_atual78[0];

	$tempo78 = date("D", mktime(0, 0, 0, $mes78, $dia78, $ano78));

	if($tempo78=="Mon"){ $tempo78="Segunda-Feira"; }
	if($tempo78=="Tue"){ $tempo78="Terça-Feira";   }
	if($tempo78=="Wed"){ $tempo78="Quarta-Feira";  }
	if($tempo78=="Thu"){ $tempo78="Quinta-Feira";  }
	if($tempo78=="Fri"){ $tempo78="Sexta-Feira";   }
	if($tempo78=="Sat"){ $tempo78="Sábado";        }
	if($tempo78=="Sun"){ $tempo78="Domingo";       }

	$horaagora05=date("H");

	if(($horaagora05>=00)&&($horaagora05<=11)){ echo("<b>Bom Dia!</b> "); }
	if(($horaagora05>=12)&&($horaagora05<=17)){ echo("<b>Boa Tarde!</b> "); }
	if(($horaagora05>=18)&&($horaagora05<=23)){ echo("<b>Boa Noite!</b> "); }

	echo("Hoje é "); echo $dia78; echo(" de "); echo $nomes_meses["$mes78"]; echo(" de "); echo $ano78; echo(" ($tempo78)");


	$inicio3=$inicio;
	$inicio4=$inicio;

	$nome_semana[1]="Segunda";
	$nome_semana[2]="Terça";
	$nome_semana[3]="Quarta";
	$nome_semana[4]="Quinta";
	$nome_semana[5]="Sexta";
	$nome_semana[6]="Sábado";

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
				Sala:
				</b>


			</TD>
			<TD >  <br> 
				<input type="hidden" name="env_cod_sala" border=0 value="Alterar Sala">
					<input border="0" type="hidden" name="inicio1" border=0 value="<?php echo $inicio; ?>">
					<input border="0" type="hidden" name="prox_semana" border=0 value="<?php echo $prox_semana; ?>">
					<input border="0" type="hidden" name="dia_atual" border=0 value="<?php echo $dia_atual; ?>">
				<select name="cod_sala" OnChange="javascript:alterarsala();">
					<?php
						mysql_select_db('sala');
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
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?> <b>SEMANA</b>
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

					echo("<b>HORÁRIO INICIAL</b>");
				}
				if(($x==0)&&($y>=1)){ // IMPRIMIR SEMANA 1a LINHA
					?> <TD colspan=2  WIDTH='<?php echo $tamanho_celula; ?>' HEIGHT='<?php echo $altura_celula; ?>' <?php
					echo ("bgcolor='#EDF5FF'");
					?> BORDER='0' > <?php

					if($novomes==0){ $rt=$dia+$inicio; /* echo $rt; exit(); */ }
					if($novomes==1){ $rt++; /* echo $rt; exit(); */ }

					if(($mes==1)||($mes==3)||($mes==5)||($mes==7)||($mes==8)||($mes==10)||($mes==12)){
						if($rt>=32){
							$novomes=1;
							if($mes==12){ $ano++; $mes=1; }
							$mes++;
							if($mes<10){ $mes="0".$mes; }
							$marc=1;
							$rt=1;
							$meshh=1;
						}
						if($rt<=0){
							$rt=30+$inicio6;
							if($mes==3){ $rt=28+$inicio; } 
							$novomes=1;
							$mes--;
							if($mes<10){ $mes="0".$mes; }
							$marc=1;
							$meshh=-1;
						}

					}

					if($marc!=1){
						if(($mes==4)||($mes==6)||($mes==9)||($mes==11)){
							if($rt>=31){
								$novomes=1;
								$mes++;
								if($mes<10){ $mes="0".$mes; }
								$marc=1;
								$rt=1;
								$meshh=1;
							}
							if($rt<=0){
								$rt=31+$inicio6; /* echo $rt; exit(); */
								$novomes=1;
								$mes--;
								if($mes<10){ $mes="0".$mes; }
								$marc=1;
								$meshh=-1;
							}
						}
					}


					if($marc!=1){
						if($mes==2){
							if($rt>=29){
								$rt=1;
								$novomes=1;
								$mes++;
								if($mes<10){ $mes="0".$mes; }
								$marc=1;
								$meshh=1;
							}
							if($rt<=0){
								$rt=31+$inicio6;
								$novomes=1;
								$mes--;
								if($mes<10){ $mes="0".$mes; }
								$marc=1;
								$meshh=-1;
							}
						}
					}


						echo $fonte[2]; echo $cor_fonte["azul"];
					
						echo("<b>"); echo $nome_semana[$y]; echo("</b>");
						echo ("<br>");

						if($rt<10){ $rt="0".$rt; }
					
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

					if($novomes2==0){ $rt2=$dia2+$inicio2; /* echo("naa6: "); echo $rt2; echo(" // "); */ }
					if($novomes2==1){ $rt2++; /* echo("naa5: "); echo $rt2; echo(" // "); */ }

					if(($mes2==1)||($mes2==3)||($mes2==5)||($mes2==7)||($mes2==8)||($mes2==10)||($mes2==12)){
						if($rt2>=32){
							$novomes2=1;
							$mes2=$mes2+1;
							if($mes2==12){ $ano2++; $mes2=1; }
							if($mes2<10){ $mes2="0".$mes2; }
							$marc2=1;
							$rt2=1; /* echo("naa7: "); echo $rt2; */
						}
						if($marc2!=1){
							if($rt2<=0){
								$rt2=30+$inicio6; /* echo("naa1 "); echo $rt2; */
								if($mes2==3){ $rt2=28+$inicio2; } 
								$novomes2=1;
								$mes2--;
								if($mes2<10){ $mes2="0".$mes2; }
								$marc2=1;
							}
						}

					}

					if($marc2!=1){
						if(($mes2==4)||($mes2==6)||($mes2==9)||($mes2==11)){
							if($rt2>=31){
								$novomes2=1;
								$marc2=1;
								$mes2=$mes2+1;
								if($mes2<10){ $mes2="0".$mes2; }
								$rt2=1; /* echo("naa8: "); echo $rt2; */
							
							}
							if($marc2!=1){
								if($rt2<=0){
									$rt2=31+$inicio6; /* echo("naa2: "); echo $rt2; */
									$novomes2=1;
									$mes2--;
									if($mes2<10){ $mes2="0".$mes2; }
									$marc2=1;
								}
							}
						}
					}

					if($marc2!=1){
						if($mes2==2){
							if($rt2>=29){
								$novomes2=1;
								$mes2++;
								if($mes2<10){ $mes2="0".$mes2; }
								$marc2=1;
								$rt2=1; /* echo("naa9: "); echo $rt2; */
							}
							if($rt2<=0){
								$rt2=31+$inicio6; /* echo("naa3: "); echo $rt2; */
								$novomes2=1;
								$mes2--;
								if($mes2<10){ $mes2="0".$mes2; }
								$marc2=1;
							}
						}
					}

	
					if($rt2<10){ $rt2="0".$rt2; }


					$datatempo=$ano2."-".$mes2."-".$rt2." ".$hora.":00:00";   /* echo $datatempo; echo ("MES: $mes"); echo ("- MES2: $mes2"); */

					$dataso=$ano2."-".$mes2."-".$rt2;

					$tempof=date("Y-m-d");
				
					$diaso=explode("-",$tempof);

					$diaso1=$diaso[2];

					$horaso=date("H");

					if($diaso1<=9){ $diaso1="0".$diaso1; }

					if($horaso<=9){ $horaso="0".$horaso; }

					mysql_select_db('sala');

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



						echo("</TD>");

					} else {

						echo("<TD bgcolor='#9FB6CD'><center>");

							$matricula=$linha["matricula"];

							mysql_select_db('sala');

							$sql1 = "SELECT * FROM sups WHERE matsup='$matricula'";
							$resultado1 = mysql_query($sql1) or die(mysql_error());
							$linha1=mysql_fetch_array($resultado1);
							$supervisor=$linha1["nome_sup"];
							$ticket=$linha["ticket"];
	
							echo("<a href=\"javascript:\" onMouseOver=\"return overlib('<html><table class=bordas bgcolor=#ffffff><tr><td><font face=arial color=#000000 size=2><b>Por:</b> $supervisor<br><b>Ticket:</b> $ticket</td></tr></table></html>',STATUS,'RESERVADO',FULLHTML)\" onMouseOut=\"nd()\"><b>R</b></a>");

						echo("</TD>");
	
					}


					

					mysql_select_db('sala');

					$datatempo=$ano2."-".$mes2."-".$rt2." ".$hora.":30:00";

					$sql = "SELECT * FROM reservas WHERE datatempo='$datatempo' AND cod_sala='$cod_sala'";
					$resultado = mysql_query($sql) or die(mysql_error());
	
					$linha=mysql_fetch_array($resultado);

					if($linha["cod_sala"]==""){

						echo("<TD bgcolor='#B9D3FF'><center>");


						echo("</TD>");

					} else {


						echo("<TD bgcolor='#9FB6CD'><center>");

							$matricula=$linha["matricula"];

							mysql_select_db('sala');

							$sql1 = "SELECT * FROM sups WHERE matsup='$matricula'";
							$resultado1 = mysql_query($sql1) or die(mysql_error());
							$linha1=mysql_fetch_array($resultado1);
							$supervisor=$linha1["nome_sup"];
							$ticket=$linha["ticket"];
		
							echo("<a href=\"javascript:\" onMouseOver=\"return overlib('<html><table class=bordas bgcolor=#ffffff><tr><td><font face=arial color=#000000 size=2><b>Por:</b> $supervisor<br><b>Ticket:</b> $ticket</td></tr></table></html>',STATUS,'RESERVADO',FULLHTML)\" onMouseOut=\"nd()\"><b>R</b></a>");

						echo("</TD>");

					}
		
				}
			
				mysql_select_db('sala');

				?>

			</TD>

			<?php

			if(($x==0)&&($y>=1)){ $inicio++; }
			if(($x>=1)&&($y>=1)){ $inicio2++; }

			} // FINAL_FOR_COLUNA

			$inicio2=$inicio3;
			$novomes2=0;
			$mes2=$mesd;
			$marc2=0;

			?>

		</TR>

		<?php

		} // FINAL_FOR_LINHA

		?>

	</TABLE>

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td background="" bgcolor="#9EC8FF">
				<img src="img/spacer.gif" width="1" height="1" alt=""><br>
			</td>
		</tr>
	</table>

	<TABLE width="520">
		<tr>
			<td >
				<br><?php echo $fonte[2]; echo $cor_fonte["azul"]; ?> <b>Caso deseje reservar uma sala, clique <a href="index.php">aqui</a>.<br>
			</td>
		</TD>
	</table>

	</form>

	</TD>
	</TR>
	</TABLE>
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

	mysql_select_db('sala');

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

		mysql_select_db('sala');

		$sql8 = "SELECT * FROM salas WHERE cod_sala='$cod_sala'";
		$resultado8 = mysql_query($sql8) or die(mysql_error());
		$linha8=mysql_fetch_array($resultado8);

		$datan=$dia_hora[0];


		if(($min_inicio==00)&&($tempo==0)){ // REF_001

			$verificar_existe=$datan." ".$hora_inicio.":00:00";
	
			$ticket=$_POST["ticket"];

			mysql_select_db('sala');

			$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
			$resultado = mysql_query($sql) or die(mysql_error());
	
			$linha=mysql_fetch_array($resultado);

			if($linha["cod_sala"]==$cod_sala){
				$existe++;
				echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('A duração de sua reserva esta confitante com outra. Por favor verifique.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
			}

		} // REF_001


		if(($min_inicio==30)&&($tempo==0)){ // REF_002

			$verificar_existe=$datan." ".$hora_inicio.":30:00";
	
			$ticket=$_POST["ticket"];

			mysql_select_db('sala');

			$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
			$resultado = mysql_query($sql) or die(mysql_error());
	
			$linha=mysql_fetch_array($resultado);

			if($linha["cod_sala"]==$cod_sala){
				$existe++;
				echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('A duração de sua reserva esta confitante com outra. Por favor verifique.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
			}

		} // REF_002


		if(($min_inicio==00)&&($tempo>=1)){ // REF_003

			for($i=1;$i<=$tempo;$i++){

				$verificar_existe=$datan." ".$hora_inicio.":00:00";

				$ticket=$_POST["ticket"];

				mysql_select_db('sala');

				$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
				$resultado = mysql_query($sql) or die(mysql_error());
		
				$linha=mysql_fetch_array($resultado);

				if($linha["cod_sala"]==$cod_sala){
					$existe++;
					echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('A duração de sua reserva esta confitante com outra. Por favor verifique.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
				}

				if(($tempo>=1)&&($tempo!=$i)){

					$verificar_existe=$datan." ".$hora_inicio.":30:00";

					$ticket=$_POST["ticket"];

					mysql_select_db('sala');

					$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
					$resultado = mysql_query($sql) or die(mysql_error());
		
					$linha=mysql_fetch_array($resultado);

					if($linha["cod_sala"]==$cod_sala){
						$existe++;
						echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('A duração de sua reserva esta confitante com outra. Por favor verifique.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
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

			mysql_select_db('sala');
			$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
			$resultado = mysql_query($sql) or die(mysql_error());
		
			$linha=mysql_fetch_array($resultado);

			if($linha["cod_sala"]==$cod_sala){
				$existe++;
				echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('A duração de sua reserva esta confitante com outra. Por favor verifique.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
			}

			if($hora_inicio<=9){
				$hora_inicio="0".$hora_inicio+1;
			} else {
				$hora_inicio=$hora_inicio+1;
			}
				
			for($i=1;$i<=$tempo;$i++){

				$verificar_existe=$datan." ".$hora_inicio.":00:00";

				$ticket=$_POST["ticket"];

				mysql_select_db('sala');

				$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
				$resultado = mysql_query($sql) or die(mysql_error());
		
				$linha=mysql_fetch_array($resultado);

				if($linha["cod_sala"]==$cod_sala){
					$existe++;
					echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('A duração de sua reserva esta confitante com outra. Por favor verifique.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
				}

				if(($tempo>=2)&&($tempo!=$i)){

					$verificar_existe=$datan." ".$hora_inicio.":30:00";

					$ticket=$_POST["ticket"];

					mysql_select_db('sala');

					$sql = "SELECT * FROM reservas WHERE datatempo='$verificar_existe' AND cod_sala='$cod_sala'";
					$resultado = mysql_query($sql) or die(mysql_error());
		
					$linha=mysql_fetch_array($resultado);

					if($linha["cod_sala"]==$cod_sala){
						$existe++;
						echo ("<html><SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('A duração de sua reserva esta confitante com outra. Por favor verifique.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body></html>");
					}

				}

					if($hora_inicio<=9){
						$hora_inicio="0".$hora_inicio+1;
					} else {
						$hora_inicio=$hora_inicio+1;
					}
					
			}

		} // FIM IF 2

		mysql_select_db('sala');	

		$datam=$dia_hora[0];

		if($existe==0){ // REF_004

			if(($min_inicio==00)&&($tempo==0)){

				$salvar_data=$datam." ".$hora_inicio2.":00:00";

				mysql_select_db('sala');
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

			}


			if(($min_inicio==30)&&($tempo==0)){

				$salvar_data=$datam." ".$hora_inicio2.":30:00";

				mysql_select_db('sala');
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

			}


			if(($min_inicio==30)&&($tempo>=2)){ // INICIO IF 3

				$salvar_data=$datam." ".$hora_inicio2.":30:00";

				mysql_select_db('sala');
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

				if($hora_inicio2<=9){
					$hora_inicio2="0".$hora_inicio2+1;
				} else {
					$hora_inicio2=$hora_inicio2+1;
				}

				for($i=1;$i<=$tempo;$i++){

					$salvar_data=$datam." ".$hora_inicio2.":00:00";

					mysql_select_db('sala');
	
					$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
	
					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}


					if($tempo!=$i){

						$salvar_data=$datam." ".$hora_inicio2.":30:00";

						mysql_select_db('sala');
	
						$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
		
						if(!mysql_query($sql)){
							echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
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

				mysql_select_db('sala');
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";

					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

				if($hora_inicio2<=9){
					$hora_inicio2="0".$hora_inicio2+1;
				} else {
					$hora_inicio2=$hora_inicio2+1;
				}


				$salvar_data=$datam." ".$hora_inicio2.":00:00";

				mysql_select_db('sala');
	
				$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
	
				if(!mysql_query($sql)){
					echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
					exit();
				}

			} // FIM IF 5




			if(($min_inicio==00)&&($tempo>=1)){ // INICIO IF 4

				for($i=1;$i<=$tempo;$i++){

					$salvar_data=$datam." ".$hora_inicio2.":00:00";

					mysql_select_db('sala');
	
					$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
	
					if(!mysql_query($sql)){
						echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
						exit();
					}

					if($tempo>=1){

						$salvar_data=$datam." ".$hora_inicio2.":30:00";

						mysql_select_db('sala');
	
						$sql = "INSERT INTO reservas (datatempo,cod_sala,matricula,ticket) VALUES ('$salvar_data','$cod_sala','$matricula','$ticket')";
		
						if(!mysql_query($sql)){
							echo ("<b><font face=\"arial,verdana\" size=\"-1\">SALA NAO FOI AGENDADA! CONTATE O SUPORTE LOCAL!</i><br> ERRO MySQL:</b> ". mysql_error());
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

		$texto="\n------------------------------------------------------------\nVocê acaba de receber um e-mail enviado através do\nUDF - Sistema de Agendamento de Sala (http://andersusilva.com/sala)\nOBS: Não responda esta mensagem.\n------------------------------------------------------------\n\nDe: ".$de."\nSala: ".$sala."\nData: ".$email_data."\nHora: ".$email_hora."\nDuração: ".$tempo." Hora(s)\n\nOBS: NÃO ESQUEÇA DE CONFIRMAR O AGENDAMENTO.";

		// mail ($para, $titulo, $texto, $de);

		?> <SCRIPT LANGUAGE="JavaScript"> function tela(){ alert('ATENÇÃO: SALA AGENDADA!\n\nSomente haverá confirmação caso haja\nserviços adicionais e número do Ticket aberto.'); window.navigate('<?php echo $PHP_SELF; ?>?codsala=<?php echo $cod_sala; ?>&qualsemana=<?php echo $qual_semana1; ?>&prox_semana=<?php echo $prox_semana; ?>&dia_atual=<?php echo $dia_atual; ?>'); } </SCRIPT> <BODY OnLoad="javascript:tela();" > </body> <?php

		} // REF_004
	

	} else {

		echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('Usuário ou senha incorreto!. Tente novamente.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual=$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");

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

			$tempo = date("D", mktime(0, 0, 0, $mes, $dia, $ano));

			$dia_da_semana=$tempo;

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
	
			if($dia_da_semana=="Mon"){   $dia_da_semana="Segunda"; $inicio=0;  $inicio2=0;  $iniciok=1; $inicio_prox=7; }
			if($dia_da_semana=="Tue"){   $dia_da_semana="Terça";   $inicio=-1; $inicio2=-1; $iniciok=2; $inicio_prox=6; }
			if($dia_da_semana=="Wed"){   $dia_da_semana="Quarta";  $inicio=-2; $inicio2=-2; $iniciok=3; $inicio_prox=5; }
			if($dia_da_semana=="Thu"){   $dia_da_semana="Quinta";  $inicio=-3; $inicio2=-3; $iniciok=4; $inicio_prox=4; }
			if($dia_da_semana=="Fri"){   $dia_da_semana="Sexta";   $inicio=-4; $inicio2=-4; $iniciok=5; $inicio_prox=3; }
			if($dia_da_semana=="Sat"){   $dia_da_semana="Sábado";  $inicio=-5; $inicio2=-5; $iniciok=6; $inicio_prox=2; }
			if($dia_da_semana=="Sun"){   $dia_da_semana="Domingo"; $dia++; $inicio=0; $inicio2=0; $inicio_prox=1; } //CASO SEJA DOMINGO

			if($data1==$temp_ano){ // REF_008
				
					$ano++; $dia=06; $mes=01;

				} else { // ELSE_REF_008

					if(($mes==1)||($mes==3)||($mes==5)||($mes==7)||($mes==8)||($mes==10)||($mes==12)){ // REF_009
						if($dia>=32){
							$mes++;
							if($mes==12){ $ano++; $mes=1; }
							if($mes<10){ $mes="0".$mes; }
							$marc3=1;
							$dia=$inicio_prox;
						}
					} // REF_009
 
					if($marc3!=1){ // REF_010
						if(($mes==4)||($mes==6)||($mes==9)||($mes==11)){
							if($dia>=31){
								$mes++;
								if($mes<10){ $mes="0".$mes; }
								$marc3=1;
								$dia=$inicio_prox;
							}
						}
					} // REF_010

					if($marc3!=1){ // REF_011
						if($mes==2){
							if($dia>=29){
								$mes++;
								if($mes<10){ $mes="0".$mes; }
								$marc3=1;
								$dia=$inicio_prox;
							}
						}
					} // REF_011

					/*

					if($marc3!=1){ // REF_012

						echo $dia; echo(" - "); echo $inicio_prox; exit();

						$dia=$dia+$inicio_prox;


					} // REF_012

					*/

				} // FIM_REF_008

			if($dia<10){ $dia="0".$dia; }

			$prox_semana=$ano."-".$mes."-".$dia;

			// echo $prox_semana;
			// exit();

			// echo $tempo; echo("-"); echo $prox_semana;  exit(); 

			mostrarsemana($tempo,"1","1",$prox_semana,$tempo);
			// mostrarsemana("2004-04-04","1","1",$prox_semana,"2004-04-04");

		} // FIM_REF_006

	} // FIM_REF_005

} // FIM_ENVIAR_0

?>			

