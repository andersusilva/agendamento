<?php
$atu=$_GET['atu'];
$exe=$_GET['exe'];

if($atu==1){

	include('conecta.php');

	mysql_select_db('sala');

	$matsup1=$_POST['matsup1'];
	$ilha1=$_POST['ilha1'];
	$pri1=$_POST['pri1'];
	$nome1=$_POST['nome1'];
	$senha2=$_POST['senha2'];

	$sql = "UPDATE sups SET matsup='$matsup1',nome_sup='$nome1',senha='$senha2',ilha='$ilha1',pri='$pri1' WHERE matsup=$matsup1";

	if(mysql_query($sql)){
	
			echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_09 '); window.navigate('index.php'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
		} else {
			echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_10 '); window.navigate('index.php'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
		}
}

if($exe){

	include('conecta.php');

	$matsup=$_GET['matsup'];

	mysql_select_db('sala');

	$query = "SELECT * FROM sups WHERE matsup = '$matsup'"; 
	$result = mysql_query($query) or die(mysql_error());
	$linha = mysql_fetch_array($result);
	$nome = $linha["nome_sup"];
	$ilha = $linha["ilha"];


				?>

					<SCRIPT LANGUAGE="JavaScript">
					
					function tela(){
						
						form = document.sen
						senha1 = form.senha1.value
						senha2 = form.senha2.value

						if(senha1 == senha2){
							form.action = 'pri.php?atu=1'
							form.submit();							
						} else {
							alert("<?php echo $L_MENSAGEM_11; ?>")
							form.senha1.focus()
							return;
						}
	
					}
						
					</SCRIPT>

					
						<form name="sen" method="post" action="pri.php?atu=1">
							<input type="hidden" name="matsup1" border=0 value="<?php echo $matsup; ?>">
							<input type="hidden" name="ilha1" border=0 value="<?php echo $ilha; ?>">
							<input type="hidden" name="pri1" border=0 value="1">
							<input type="hidden" name="nome1" border=0 value="<?php echo $nome; ?>">

							<table align="center">
								<tr>
									<td>
										<font size="3" face="arial"><b><?php echo $L_MENSAGEM_12; ?><br><br>
										Usuário: <br> <?php echo $nome; ?>
									</td>
								</tr>
							</table>
							<hr>
							<table align="center">
								<tr>
									<td>
										<font size="2" face="arial"><?php echo $L_MENSAGEM_13; ?>
									</td>
									<td>
										<font size="2" face="arial"><?php echo $L_MESANGEM_14; ?>
									</td>
								</tr>
								<tr>
									<td>
										<input border="0" class="bordas" type="password" name="senha1" border=0 value="">
									</td>
									<td>
										<input border="0" class="bordas" type="password" name="senha2" border=0 value="">
									</td>
								</tr>
								<tr>
									<td>
									</td>
									<td>
										<p align="right"><input border="0" class="bordas" type="button" name="enviar" value="<?php echo $L_CRIAR_SENHA; ?>" onClick="javascript:tela();"></p>
									</td>
								</tr>
							</table>
						</form>

<?php
		

}


?>