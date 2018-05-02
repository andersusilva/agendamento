<?php

$matricula=$_POST["matricula"];
$senha=$_POST["senha"];

function merro(){
	include('languages/padrao.inc.php');
	echo ("<SCRIPT LANGUAGE=\"JavaScript\"> function tela(){ alert('Nome de usuário ou senha inválidos, tente novamente!'); window.navigate('adm.php'); } </SCRIPT> <BODY OnLoad=\"javascript:tela();\" > </body>");
}


if($matricula){

	include('conf.inc.php');

	$db=mysql_connect ($servidor, $usuario, $senhadb)
	or die ('Impossível conectar no bando de dados: ' . mysql_error());

	mysql_select_db('sala');($banco);

	$query = "SELECT * FROM adms WHERE matsup = '$matricula'"; 

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
						form.action = 'adm.php'
						form.submit();	
					}
						
					</SCRIPT>
				<HEAD>
				<BODY>
					
						<form name="verifica" method="post" action="adm.php">
							<input type="hidden" name="matricula" border=0 value="<?php echo $matricula; ?>">
							<input type="hidden" name="nome" border=0 value="<?php echo $linha["nome"] ?>">
						</form>

					<SCRIPT LANGUAGE="JavaScript">
					tela();
					</SCRIPT>
				</BODY>
				</HTML>				
				<?php

				exit();
			} else {
				echo("erro1");
				merro();
				exit();
			}
		} else {
			echo("erro2");
			merro();
			exit();
		}
	}

} else {
	echo("erro3");
	merro();
	exit();

}

echo("erro4");
merro();
exit();

?>
