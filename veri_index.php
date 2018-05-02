<?php
session_start();
$matricula=$_POST['matricula'];
$senha=$_POST['senha'];
include('controller/languages/padrao.inc.php');

function merro(){
	include('controller/languages/padrao.inc.php');
	echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_06 '); window.navigate('index.php'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
}

if($matricula){

	include('config/conecta.php');

	mysql_select_db('sala');

	$query = "SELECT * FROM sups WHERE matsup = '$matricula'"; 

	$result = mysql_query($query) or die(mysql_error());

	while($linha=mysql_fetch_array($result)) { 
		if($linha["matsup"]==$matricula){
			if($linha["senha"]==$senha){

				if($linha["pri"]!=1){ // INICIO_ELSE_IF_1

					echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert(' $L_MENSAGEM_08 '); window.navigate('pri.php?exe=sim&matsup=$matricula'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
					exit();

				} else {

					if($linha["ramal"]==0){ $pagina="user1.php"; } else { $pagina="user2.php"; }
					$_SESSION["nome"]=$linha["nome_sup"];
					$_SESSION["matricula"]=$linha["matsup"];
					$_SESSION["senha"]=$linha["senha"];
					$_SESSION["usu_index"]=$linha["ramal"];
					?>
					<HTML>
					<HEAD>
						<SCRIPT LANGUAGE="JavaScript">
						
						function tela(){
		
							form = document.verifica
							form.action = '<?php echo $pagina; ?>'
							form.submit();	
						}
						
						</SCRIPT>
					<HEAD>
					<BODY>
					
							<form name="verifica" method="post" action="<?php echo $pagina; ?>">
								<input type="hidden" name="matricula" border=0 value="<?php echo $matricula; ?>">
								<input type="hidden" name="nome" border=0 value="<?php echo $linha["nome_sup"] ?>">
							</form>

						<SCRIPT LANGUAGE="JavaScript">
						tela();
						</SCRIPT>
					</BODY>
					</HTML>
				
					<?php
					exit();

				} // FIM_ELSE_IF_1

			} else {
				merro();
				exit();
			}
		} else {
			merro();
			exit();
		}
	}

} else {

	merro();
	exit();

}

merro();
exit();

?>