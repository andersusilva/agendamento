 <?

include 'conecta.php';  

$Obj_Conexao = new conn();

$pega_dados = $Obj_Conexao->Consulta("select * from professor");

$retorno = mysql_num_rows($id);

  if($retorno == 0 )

  {

          print("<center>Erro ao carregar as informações !!</center>");

          return 0;

  }

  else

  {

for ($i = 0; $i < $retorno; ++$i)

          {

                  $linha = mysql_fetch_array($pega_dados);

                  $id = $linha[1];

                  $nome = $linha[1];

                  print("$id - $nome");

          }

  }

$Obj_Conexao->Consulta;
?>