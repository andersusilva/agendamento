<?php
$destruir=$_GET["destruir"];
if($destruir){
	session_destroy();
	echo("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ /* window.navigate('index.php'); */ window.close(); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
	exit();
}

function calculartempo ($hora = false, $minuto = false, $segundo = false, $mes = false, $dia = false, $ano = false){

	if ($hora === false)  $hora  = Date ("G");
	if ($minuto === false) $minuto = Date ("i");
	if ($segundo === false) $segundo = Date ("s");
	if ($mes === false)  $mes  = Date ("n");
	if ($dia === false)  $dia  = Date ("j");
	if ($ano === false)  $ano  = Date ("Y");
   
	if ($ano >= 1970) return mktime ($hora, $minuto, $segundo, $mes, $dia, $ano);
   
	//   datas anteriores a 1-1-1970 (Correção do Win32)
	$m_dias = Array (31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	if ($ano % 4 == 0 && ($ano % 100 > 0 || $ano % 400 == 0)){
		$m_dias[1] = 29; // anos sem pulo poderam ser: 1700, 1800, 1900, 2100, etc.
	}
   
	//    ir para tras (-), baseado no $ano
	$d_ano = 1970 - $ano;
	$dias = 0 - $d_ano * 365;
	$dias -= floor ($d_ano / 4);          // compensar por anos de pulo
	$dias += floor (($d_ano - 70) / 100);  // compensar por anos que não tem pulo
	$dias -= floor (($d_ano - 370) / 400); // compensat outra vez por anos gigantes de pulo
           
	//    ir para frente (+), baseado em $mes e $dia
	for ($i = 1; $i < $mes; $i++){
		$dias += $m_dias [$i - 1];
	}
	$dias += $dia - 1;
   
	//    ir para frente (+) baseado na $hora, $minuto e $segundo
	$selo = $dias * 86400;
	$selo += $hora * 3600;
	$selo += $minuto * 60;
	$selo += $segundo;
   
	return $selo;
}






?>

		<TITLE>UDF - Sistema de Agendamento de Sala</TITLE>

			<style type="text/css">
			<!--
			.bordas {
				border: 1px solid #999999;
			}
			-->
			</style>





<SCRIPT LANGUAGE="JavaScript">
<!-- 
function save(iIndx)
{	
 	var f=document.forms[0]; var of=opener.document.forms[0];

	of.MyProfileSelectedNO.value=0;
	of.MyProfileEditRowNO.value=iIndx;
    	of.DataFlagsTX.value=f.dDataFlagsTX.value;
    	var str="MyProfileDataTX";

    	for (var i=0; i<a.length; i++)
    	{   
    		var strTargetField=str + (i=="0" ? "" : "_" + i);
    		var strField=str + (a[i]=="0" ? "" : "_" + a[i]);
    		if ( f[strField].type.indexOf("select")>-1 ) var s=f[strField].options[f[strField].selectedIndex].text;
    		else s=f[strField].value;
    		of[strTargetField].value=s;
    		//var iPos=strField.indexOf("_");
    		//if (iPos==-1) strField=strField + "_" + i;
    		//else strField = strField.substr(0,iPos+1) + i;
    	}

	of.submit();
	window.close();	
}
// -->
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript">
<!-- 
document._domino_target = "_self";
function _doClick(v, o, t, h) {
  var form = document._frmAddEdit;
  if (form.onsubmit) {
     var retVal = form.onsubmit();
     if (typeof retVal == "boolean" && retVal == false)
       return false;
  }
  var target = document._domino_target;
  if (o.href != null) {
    if (o.target != null)
       target = o.target;
  } else {
    if (t != null)
      target = t;
  }
  form.target = target;
  form.__Click.value = v;
  if (h != null)
    form.action += h;
  form.submit();
  return false;
}
// -->
</SCRIPT>
</HEAD>

<BODY TEXT="000000" BGCOLOR="FFFFFF">

<FORM METHOD=post ACTION="" NAME="_frmAddEdit">
<INPUT TYPE=hidden NAME="__Click" VALUE="0"><FONT SIZE=2 COLOR="0000ff">
<INPUT NAME="dDataFlagsTX" VALUE="PE" type=hidden></FONT>

<SCRIPT LANGUAGE="JavaScript">

<!--

//global variables
var month; var day; var year;
var monthArray = new Array(0,31,29,31,30,31,30,31,31,30,31,30,31);
var strCalWinOptions = "width=230,height=190,resizable=no";

// **************************
//Validate the date string
function vd(frm,fieldName) {
	var dtString1 = eval("frm." + fieldName + ".value");

	//Trim date string: Remove spaces
	dtString = "";
	for (var i=0; i < dtString1.length; i++)
		if (dtString1.charAt(i) != " ")
			dtString = dtString + dtString1.charAt(i);

	//Initialize variables
	startPos = 0; pos = 0;

	//Check year
	pos = dtString.indexOf("-", startPos);
	if (pos == -1){
		return false;
	}
	year = parseInt(dtString.substring(startPos,pos),10);
	if ((year < 1900) || (year > 3000))
		return false;

	//Check month
	startPos = pos + 1;
	pos = dtString.indexOf("-", startPos);
	if (pos == -1){
		return false;
	}
	month = parseInt(dtString.substring(startPos,pos),10);
	if ((month < 1) || (month > 12)) 
		return false;

	//Check day
	startPos = pos + 1;
	day = parseInt(dtString.substring(startPos,dtString.length),10)
	if ((day < 1) || (day > monthArray[month])) 
		return false;

	//Check for leap year
	if ((month == 2) && (day == 29))
		if ((((year % 4) == 0) && ((year % 100) != 0)) == false){ 
			return false; 
		}

	//if we've gotten this far, return true
	return true;

}


// **************************
//Validate the date field givin in parameter
function validateDate(frm,fieldName,fieldLabel){
	 if (!vd(frm,fieldName)) {
		alert(fieldLabel + " does not have a valid date");
		return false;
	}
}


// **************************
//Calculates the current year, month and date
function getToday(){
	 today = new Date();
	 day = today.getDate();
	 month = today.getMonth();
	 month++;
	 year = today.getYear();
	 year = (year < 100) ? 1900 + year : year;
	 if (year.toString().length < 4) {
	 	year = 1900 + year;
	}
 }


// **************************
//Get the current date value in parameter field
//If no date is given or date format is not YYYY-MM-DD gets today
function getMonth_and_Date(form,fieldName){

	dtString1 = eval("form." + fieldName + ".value");

	// trim date string: Remove spaces
	dtString = "";
	for (var i=0; i < dtString1.length; i++)
		if (dtString1.charAt(i) != " ")
			dtString = dtString + dtString1.charAt(i);

	//get date components
	startPos = 0; pos = 0;

	//get year
	pos = dtString.indexOf("-", startPos);
	if (pos == -1){      //there's no date delimiter
		getToday(); 
		return;
	}
	year = parseInt(dtString.substring(startPos,pos),10);
	startPos = pos + 1;

	// get month
	pos = dtString.indexOf("-", startPos);
	if (pos == -1){
		getToday();
		return;
	}
	month = parseInt(dtString.substring(startPos,pos),10);	
	startPos = pos + 1;

	//get day
	day = parseInt(dtString.substring(startPos,dtString.length),10)

	//check month
	if ((month < 1) || (month > 12)){ //no valid month
		getToday();
		return;
	}

	//check day
	if ((day < 1) || (day > monthArray[month])){
		getToday();
		return;
	}
	
	year = (year < 100) ? 1900 + year : year;

}


// **************************
//Open the new date picking window
function putcal(form, dateFieldName) {
	var version = navigator.appVersion;
	if (navigator.appVersion.indexOf("Mac") != -1) {
		calwin = open("","calwin","alwaysRaised=yes,width=300,height=285,resizable=yes");
	} else {
		calwin = open("","calwin", strCalWinOptions);
	}
	calccal(calwin,form,dateFieldName);
 }


// **************************
//Create and show the date picker window
 function calccal(targetwin,form,dateFieldName) { 
	//Define the month names
	 var monthname = new Array(12);
	 monthname[0] = "Janeiro";
	 monthname[1] = "Fevereiro";
	 monthname[2] = "Março";
	 monthname[3] = "Abril";
	 monthname[4] = "Maio";
	 monthname[5] = "Junho";
	 monthname[6] = "Julho";
	 monthname[7] = "Agosto";
	 monthname[8] = "Setembro";
	 monthname[9] = "Outubro";
	 monthname[10] = "Novembro";
	 monthname[11] = "Dezembro";
	
	//Calculate the first and last day in the month
	 var endday = calclastday(eval(month),eval(year));
	 mydate = new Date(month + "/01/" + year);
	 firstday = mydate.getDay();
	
	//Define the day table: 6 rows * 7 columns
	 var cnt = 0;
	 var day = new Array(6);
	 for (var i=0; i<6; i++)
		 day[i] = new Array(7);

	//Fill the day table with right day numbers
	 for (var r=0; r<6; r++) {
		 for (var c=0; c<7; c++) {
			 if ((cnt==0) && (c!=firstday)) continue;
			 cnt++;
			 day[r][c] = cnt;
			 if (cnt==endday) break;
		 }
		 if (cnt==endday) break;
	 }

	//Create the date selection page in HTML format
	targetwin.document.open()
	targetwin.document.writeln("<HTML>\n<HEAD>\n<TITLE>Escolha uma Data</TITLE>\n<STYLE TYPE=\"text/css\">");
	targetwin.document.writeln("\tA {COLOR: black; TEXT-DECORATION: none}\n\tA:hover {COLOR: red; TEXT-DECORATION: underline}")
	targetwin.document.writeln("\tTH {font-family: arial, helv, times roman; font-size:10pt; color:#FFFFFF; text-align: center; BACKGROUND-COLOR: 0033CC}");
	targetwin.document.writeln("\tTD {font-family: arial, helv, times roman; font-size:10pt; text-align: center}\n\t.weekend {BACKGROUND-COLOR: #E1E1E1}");
	targetwin.document.writeln("\t.today {BACKGROUND-COLOR: #FF9F9F}\n</STYLE>\n</HEAD>\n");
	targetwin.document.writeln("<BODY onBlur=\"setTimeout('self.focus()',1000);\">");
	targetwin.document.writeln("<FORM>\n<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>\n<TR VALIGN=TOP>");

	var prevyear = eval(year) - 1;

	//Add previous year button
	targetwin.document.writeln("<TD><INPUT TYPE=BUTTON NAME=prevyearbutton VALUE='<<'"+
	" onclick='opener.month = " + month + "; opener.year = " + prevyear +
	";document.clear();opener.calccal(opener.calwin,opener.document." + form.name + ",\"" + dateFieldName + "\")'></TD>");

	var prevmonth = (month == 1) ? 12 : month - 1;
	var prevmonthyear = (month == 1) ? year - 1 : year;

	//Add previous month button
	targetwin.document.writeln("<TD><INPUT TYPE=BUTTON NAME=prevmonthbutton VALUE='&nbsp;<&nbsp;'"+
	" onclick='opener.month = " + prevmonth + "; opener.year = " + prevmonthyear +
	";document.clear();opener.calccal(opener.calwin,opener.document." + form.name + ",\"" + dateFieldName + "\")'></TD>");

	//Add month name
	targetwin.document.writeln("<TD COLSPAN=3 ALIGN=CENTER>");
	var index = eval(month) - 1;
	targetwin.document.writeln("<B><Font Face=Arial>" + monthname[index] + " " + year + "</B></TD>");

	var nextyear = eval(year) + 1; 
	var nextmonth = (month == 12) ? 1 : month + 1;
	var nextmonthyear = (month == 12) ? year + 1 : year;

	//Add next month button
	targetwin.document.writeln("<TD><INPUT TYPE=BUTTON NAME=nextmonthbutton VALUE='&nbsp;>&nbsp;'"+
	" onclick='opener.month = " + nextmonth + "; opener.year = " + nextmonthyear +
	";document.clear();opener.calccal(opener.calwin,opener.document." + form.name + ",\"" + dateFieldName + "\")'></TD>");

	//Add next year button
	targetwin.document.writeln("<TD><INPUT TYPE=BUTTON NAME=nextyearbutton VALUE='>>'"+
	" onclick='opener.month = " + month + "; opener.year = " + nextyear +
	";document.clear();opener.calccal(opener.calwin,opener.document." + form.name + ",\"" + dateFieldName + "\")'></TD><TR>");
	targetwin.document.writeln("<TR><TD COLSPAN=7>&nbsp;</TD></TR>");

	targetwin.document.writeln("<TR><TD COLSPAN=7>\n\n<table width=\"100%\" border=1 cellspacing=0 cellpadding=0>");

	//Add the day names
	targetwin.document.writeln("<TR>");
	targetwin.document.writeln("<TH>Do</TH>");
	targetwin.document.writeln("<TH>Se</TH>");
	targetwin.document.writeln("<TH>Te</TH>");
	targetwin.document.writeln("<TH>Qa</TH>");
	targetwin.document.writeln("<TH>Qi</TH>");
	targetwin.document.writeln("<TH>Sx</TH>");
	targetwin.document.writeln("<TH>Sa</TH>");
	targetwin.document.writeln("</TR>");

	//Initialize variables
	var selectedmonth = eval(month) - 1;
	var today = new Date();
	var thisyear = today.getYear();
	var thisday = today.getDate();
	var thismonth = today.getMonth() + 1;
	var selectedyear = eval(year) - thisyear + 4;
	var conditionalpadder = "";
	var ISODay = "";
	var ISOMonth = "";

	//Create the month string in 2 digits
	 if (month < 10) ISOMonth = "0" + month;
	 else ISOMonth = month;

	//Create the date table in HTML format and fill each cell in table
	 for(r=0; r<6; r++) {
		 targetwin.document.writeln("<TR>");
		 for(c=0; c<7; c++) {
			if (day[r][c] == thisday && thismonth == month && thisyear == year) {
				targetwin.document.writeln("<TD class=today>");
			} else {
				if (c == 0 || c == 6) targetwin.document.writeln("<TD class=weekend>");
				else targetwin.document.writeln("<TD>");
			}
			if(day[r][c] != null) {
				//Create the day string in 2 digits
				if (day[r][c] < 10) {
					conditionalpadder = "&nbsp;"
					ISODay = "0" + day[r][c];
				} else {
					conditionalpadder = "";
					ISODay = day[r][c];
				}
				//Add the HTML and JavaScript to each cell in date table that will close the window and return the date clicked
				targetwin.document.writeln("<a href=\"javascript:window.close();" + 
				"opener.document." + form.name + "." + dateFieldName + ".value = '" + year + "-" + ISOMonth + "-" + ISODay + "'" + 
				"\">" + conditionalpadder + day[r][c] + conditionalpadder + "</a>")
			 }
			 targetwin.document.writeln("</TD>");
		 }
		 targetwin.document.writeln("</TR>");
	 }

	 targetwin.document.writeln("</TABLE></TABLE></FORM></BODY></HTML>");
	 targetwin.document.close()
}

// **************************
//Calculates the last day in the month
function calclastday(month,year) {
	if ((month==2) && ((year%4)==0))
		return 29;

	if ((month==2) && ((year%4)!=0))
		return 28;
	
	if ((month==1) || (month == 3) || (month == 5) || (month == 7) || (month==8) || (month == 10) || (month ==12))
		return 31;

	return 30;
}

// -->
</SCRIPT>


<!-- *********************************************************************************************************** -->

		<body topmargin="0" leftmargin="0" rightmargin="0" marginheight="0" marginwidth="0">

</form>

<?php

include('conecta.php');

function mostrarsemana($data,$cod_sala,$qual_semana,$prox_semana,$dia_atual){ // INICIO_FUNCTION_MOSTRARSEMANA

		// echo $data; echo("--"); echo $prox_semana; echo("--"); echo("$dia_atual");

	?>

	<script Language="JavaScript">

		function enviardata(){
			
			data_dia1 = document.data_dia.data_dia1.value;

			if(data_dia1 == ''){
				alert("Por favor escolha uma Data!")
				document.data_dia.data_dia1.focus()
				return;
			} 
			form = document.data_dia
			form.action = ''
			form.submit();	
	
		}


	</script>



<script Language="JavaScript">

		function checkna() {
			if(document.sas.na.checked == true){
				document.sas.ticket.value = "Sem adicionais"
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
				alert("Selecione um horário para reserva.");
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
				alert("Selecione uma duração de tempo para reserva.");
				form.tempo[0].focus();
				return;
			}

			if(ticket == ''){
				alert("Para serviços adicionais/equipamentos, abrir um ticket\npelo sistema Remedy Web e informar no campo Ticket.\n\nCaso não haja necessidade, clique em SA (sem adicionais).\n\nOBRIGADO!")
				form.ticket.focus()
				return;
			} 

			if(tempo == ''){
				alert("Por favor digite o tempo de duração para reservar!")
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



	// $fgh=explode("-",$dia_atual);
	// $mesfgh=$fgh[1];


		
	$dia_atual70=date("Y-m-d");
	$fgh=explode("-",$dia_atual70);
	$anofgh=$fgh[0];
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

	// $tempo = getdate(maketime(12,0,0,$mes,$dia,$ano));

	$tempo = date("D", mktime(0, 0, 0, $mes, $dia, $ano));

	$dia_da_semana=$tempo;

	/*
	if($dia_da_semana=="Mon"){ $dia_da_semana="Segunda";         $inicio=0;  $inicio2=0;  $iniciok=1; if($dia==1){ $inicio6=0; }  $inicio_prox=7; }
	if($dia_da_semana=="Tue"){ $dia_da_semana="Terça";           $inicio=-1; $inicio2=-1; $iniciok=2; $inicio6=0;  $inicio_prox=8; }
	if($dia_da_semana=="Wed"){ $dia_da_semana="Quarta";          $inicio=-2; $inicio2=-2; $iniciok=3; $inicio6=-1; $inicio_prox=9; }
	if($dia_da_semana=="Thu"){ $dia_da_semana="Quinta";          $inicio=-3; $inicio2=-3; $iniciok=4; $inicio6=-2; $inicio_prox=10; }
	if($dia_da_semana=="Fri"){ $dia_da_semana="Sexta";           $inicio=-4; $inicio2=-4; $iniciok=5; $inicio6=-3; $inicio_prox=11; }
	if($dia_da_semana=="Sat"){ $dia_da_semana="Sábado";          $inicio=-5; $inicio2=-5; $iniciok=6; $inicio6=-4; $inicio_prox=12; }
	if($dia_da_semana=="Sun"){ $dia_da_semana="Domingo"; $dia++; $inicio=0;  $inicio2=0;  $iniciok=1; $inicio6=1;  $inicio_prox=12; $inicio_prox=13; } //CASO SEJA DOMINGO
	*/

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

	if(($horaagora05>=00)&&($horaagora05<=11)){ echo("<b>Bom Dia, </b> "); }
	if(($horaagora05>=12)&&($horaagora05<=17)){ echo("<b>Boa Tarde, </b> "); }
	if(($horaagora05>=18)&&($horaagora05<=23)){ echo("<b>Boa Noite, </b> "); }

	echo $_SESSION["nome"];

	echo(".<br>Hoje é "); echo $dia78; echo(" de "); echo $nomes_meses["$mes78"]; echo(" de "); echo $ano78; echo(" ($tempo78)");



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
			<TD class="bl1" width="60">
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?>
				<b><img src="img/arrow3.gif" width="14" height="11" alt="">
				Sala:
				</b>


			</TD>

			

			<TD widht="50">  <br> 
				<FORM NAME="salatroca" method="POST" action="">
				<input type="hidden" name="env_cod_sala" border=0 value="Alterar Sala">
					<input border="0" type="hidden" name="inicio1" border=0 value="<?php echo $inicio; ?>">
					<input border="0" type="hidden" name="prox_semana" border=0 value="<?php echo $prox_semana; ?>">
					<input border="0" type="hidden" name="dia_atual" border=0 value="<?php echo $dia_atual; ?>">
				<select name="cod_sala" OnChange="javascript: document.salatroca.submit();" >
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

			<TD width="70"> 
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?>
				<b>Data: </b>&nbsp;
			</TD>

			<FORM method="POST" NAME="data_dia">

			<TD width="70" align="center">
				<center>
				
					<input name="data_dia1" class="bordas" size="10" value="" OnClick="JavaScript:getMonth_and_Date(this.document.data_dia,'data_dia1');putcal(this.document.data_dia,'data_dia1');">
				
				
			</TD >
			<TD width="70" align="left">
					<center><br>
					<?php
						if($qual_semana==1){ // INICIO_IF_X

					 ?>
								<input border="0" type="hidden" name="cod_sala" border=0 value="<?php echo $cod_sala; ?>">
								<input border="0" type="hidden" name="data1" border=0 value="<?php echo $data1; ?>">
								<input border="0" type="hidden" name="inicio1" border=0 value="<?php echo $iniciok; ?>">
								<input border="0" type="hidden" name="inicio_prox" border=0 value="<?php echo $inicio_prox; ?>">
								<input border="0" type="hidden" name="prox_semana" border=0 value="<?php echo $prox_semana; ?>">
								<input border="0" type="hidden" name="dia_atual" border=0 value="<?php echo $dia_atual; ?>">
								<input border="0" class="bordas" type="Submit" name="anterior" border=0 value=" >> ">
							
					<?php
						} // FIM IF_X
					?>
			</TD>
			</form>
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

				$marc=0;

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

					$marc2=0;

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

							?>

							<input type="radio" name="reservar" value="<?php echo $datatempo; ?>"

								<?php

									
									if($ano2<=$anofgh){ if($mes2<$mesfgh){ echo(" disabled "); } if($mes2==$mesfgh){ if($rt2<$dia_atual1){ echo(" disabled "); $gh=1; } else { $gh=2; } if($rt2==$dia_atual1){ if($hora<=$hora_atual){ echo(" disabled"); $gh=1; } else { $gh=2; } } } } ?> OnClick="javascript: alert('Horário\n\nInicio: <?php echo $hora; ?>:00');">

							<?php

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

	
							?> <input type="radio" name="reservar" value="<?php echo $datatempo; ?>"

									<?php

									if($ano2<=$anofgh){ if($mes2<$mesfgh){ echo(" disabled "); } if($mes2==$mesfgh){ if($rt2<$dia_atual1){ echo(" disabled "); $gh=1; } else { $gh=2; } if($rt2==$dia_atual1){ if($hora<$hora_atual){ echo(" disabled"); } if($min_atual>=30){ echo(" disabled"); $gh=1; } else { $gh=2; } } } } ?> OnClick="javascript: alert('Horário\n\nInicio: <?php echo $hora; ?>:30');">
							

							<?php

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

			?>

		</TR>

		<?php

		} // FINAL_FOR_LINHA

		?>

	</TABLE>
	<TABLE width="520" >
		<tr>
			<td >
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?> <b>ATENÇÃO: Para cancelamento de reserva, clique <a href="apagar.php">aqui</a>.</b><br>
				Para serviços adicionais abrir ticket a parte
			</td>
		</TD>
	</table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td background="" bgcolor="#9EC8FF"><img src="img/spacer.gif" width="1" height="1" alt=""><br></td></tr></table>

	<TABLE width="520" width="522" >
		<TR>
			<TD ><center>
				<?php echo $fonte[2]; echo $cor_fonte["azul"]; ?><b>Duração: (horas)<br>
				<input type="radio" name="tempo" value="0" OnClick="javascript: alert('Duração: ½ hora');">  ½ &nbsp;&nbsp;
				<input type="radio" name="tempo" value="1" OnClick="javascript: alert('Duração: 1 hora');"> 01 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="2" OnClick="javascript: alert('Duração: 2 horas');"> 02 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="3" OnClick="javascript: alert('Duração: 3 horas');"> 03 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="4" OnClick="javascript: alert('Duração: 4 horas');"> 04 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="5" OnClick="javascript: alert('Duração: 5 horas');"> 05 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="6" OnClick="javascript: alert('Duração: 6 horas');"> 06 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="11" OnClick="javascript: alert('Duração: 11 horas');"> 11 &nbsp;&nbsp;
				<input type="radio" name="tempo" value="14" OnClick="javascript: alert('Duração: 14 horas');"> 14 &nbsp;&nbsp;

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
							<input type="checkbox" name="na" OnClick="javascript: checkna();" ><b><?php echo $fonte[1]; echo $cor_fonte["azul"]; ?>SA
							
							
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
				<BUTTON border="0" class="bordas" OnClick="AAA=window.open('user2.php?destruir=sim','_self');">Sair</BUTTON>
			</TD>
			<TD>
				<BUTTON border="0" class="bordas" OnClick="AAA=window.open('http://svrrederjo07/arsys/servlet/ViewFormServlet?server=10.5.9.22&form=HPD%3aHelpDesk&view=Aplicacao%20Web3&app=AplicacaoWeb3&mode=CREATE','_blank');">Remedy</BUTTON>

			</TD>
			<TD ALIGN="RIGHT" WIDTH="33%">
				<input border="0" class="bordas" type="button" name="enviar"  value="Reservar >>" onClick="javascript:valida();">
			</TD>
		</TR>
	</form>
	</TABLE>


	</TD></TR>
	</TABLE>
	<center><font face="verdana,arial" size="1" color="#4682B4">UDF v.<?php include('versao.inc.php'); echo $versao; ?> www.andersusilva.com

	<?php


} // FINAL_FUNCTION_MOSTRARSEMANA


// mostrarsemana("2004-03-29","1","2");

$enviar=$_GET["enviar"];

if($enviar=="sim"){

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

	if(($linha1["matsup"]==$matricula)&&($linha1["senha"]==$senha)){

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


		if(($min_inicio==00)&&($tempo==0)){

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

		}


		if(($min_inicio==30)&&($tempo==0)){

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


		if(($min_inicio==00)&&($tempo>=1)){

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




		}


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

		if($existe==0){

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

		}
	

	} else {

		echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('Usuário ou senha incorreto!. Tente novamente.'); window.navigate('"); echo $PHP_SELF; echo("?codsala=$cod_sala&qualsemana=$qual_semana1&prox_semana=$prox_semana&dia_atual=$dia_atual'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");

	}	

} else {

	$env_cod_sala=$_POST["env_cod_sala"];

	$proxima=$_POST["proxima"];	
	$anterior=$_POST["anterior"];
	$data1=$_POST["data1"];
	$inicio=$_POST["inicio1"];
	$prox_semana=$_POST["prox_semana"];
	$dia_atual=$_POST["dia_atual"];
	$data_dia1=$_POST["data_dia1"];
	
	if(($env_cod_sala)||($proxima)||($anterior)){

		$cod_sala=$_POST["cod_sala"];
		$tempo=date("Y-m-d");

		if($proxima){

			$qual_semana=2;

			mostrarsemana($prox_semana,$cod_sala,$qual_semana,$prox_semana,$dia_atual);
			

		}

		if($anterior){

			$qual_semana=1;

			mostrarsemana($data_dia1,$cod_sala,$qual_semana,$prox_semana,$data_dia1);
			

		}

		if((!$proxima)&&(!$anterior)) {

			$qual_semana=1;

			//echo("3a");
			//mostrarsemana($tempo,$cod_sala,$qual_semana);

			mostrarsemana($dia_atual,$cod_sala,$qual_semana,$prox_semana,$dia_atual);
			

		}




	} else {


		$proxima=$_POST["proxima"];	
		$anterior=$_POST["anterior"];
		$data1=$_POST["data1"];
		$inicio=$_POST["inicio1"];
		$prox_semana=$_POST["prox_semana"];
		$dia_atual=$_POST["dia_atual"];

		$codsala=$_GET["codsala"];
		$qualsemana=$_GET["qualsemana"];

		if($codsala){

			$prox_semana=$_GET["prox_semana"];
			$dia_atual=$_GET["dia_atual"];

			if($qualsemana==2){

				mostrarsemana($prox_semana,$codsala,$qualsemana,$prox_semana,$dia_atual);


			} else {


				mostrarsemana($dia_atual,$codsala,$qualsemana,$prox_semana,$dia_atual);				

			}
			
		
		} else {


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
			$dia=$dia+7;
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

			if($data1==$temp_ano){ 
				
					$ano++; $dia=06; $mes=01;

				} else {

					if(($mes==1)||($mes==3)||($mes==5)||($mes==7)||($mes==8)||($mes==10)||($mes==12)){
						if($dia>=32){
							$mes++;
							if($mes==12){ $ano++; $mes=1; }
							if($mes<10){ $mes="0".$mes; }
							$marc3=1;
							$dia=$inicio_prox;
						}
					}

					if($marc3!=1){
						if(($mes==4)||($mes==6)||($mes==9)||($mes==11)){
							if($dia>=31){
								$mes++;						
								if($mes<10){ $mes="0".$mes; }
								$marc3=1;
								$dia=$inicio_prox;
							}
						}
					}

					if($marc3!=1){
						if($mes==2){
							if($dia>=29){
								$mes++;
								if($mes<10){ $mes="0".$mes; }
								$marc3=1;
								$dia=$inicio_prox;
							}
						}
					}

					/*

					if($marc3!=1){

						echo $dia; echo(" - "); echo $inicio_prox; exit();

						$dia=$dia+$inicio_prox;


					}

					*/

				}

			if($dia<10){ $dia="0".$dia; }

			$prox_semana=$ano."-".$mes."-".$dia;

			// echo $prox_semana;
			// exit();

			// echo $tempo; echo("-"); echo $prox_semana;  exit(); 

			mostrarsemana($tempo,"1","1",$prox_semana,$tempo);
			// mostrarsemana("2004-04-04","1","1",$prox_semana,"2004-04-04");
		}
	}

}

?>			

