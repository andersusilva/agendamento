<?php

$matricula=$_POST['matricula'];
$senha=$_POST['senha'];

function merro(){
	echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('Nome de usuário ou senha inválidos, tente novamente!'); window.navigate('apagar.php'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
}


if($matricula){

	include('conecta.php');

	mysql_select_db('sala');

	$query = "SELECT * FROM sups WHERE matsup = '$matricula'"; 

	$result = mysql_query($query) or die(mysql_error());

	while($linha=mysql_fetch_array($result)) { 
		if($linha["matsup"]==$matricula){
			if($linha["senha"]==$senha){
				?>
				<HTML>
				<HEAD>
					<SCRIPT LANGUAGE="JavaScript">
					
					function tela(){
		
						form = document.verifica
						form.action = 'apagar.php'
						form.submit();	
					}
						
					</SCRIPT>
				<HEAD>
				<BODY>
					
						<form name="verifica" method="post" action="apagar.php">
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
