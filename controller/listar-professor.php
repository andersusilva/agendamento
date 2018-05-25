<h1>Listar professores</h1>
<?php
	$sql = "SELECT * FROM professor";
	
	$result = $conn->query($sql);
	
	$qtd = $result->num_rows;
	
	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome do professor</th>";
		print "<th>Sobrenome do professor</th>";
		print "<th>Status</th>";
		print "<th>Ações</th>";
		print "</tr>";
		while( $row = $result->fetch_assoc() ){
			print "<tr>";
			print "<td>".$row["id_professor"]."</td>";
			print "<td>".$row["nome_professor"]."</td>";
			print "<td>".$row["sobrenome_professor"]."</td>";
			print "<td>".$row["status_atual"]."</td>";
			print "<td>
					<button class='btn btn-success' onclick=\"location.href='index.php?page=editar-professor&id_professor=".$row["id_professor"]."'\"><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger' onclick=\"location.href='index.php?page=salvar-professor&acao=excluir&id_professor=".$row["id_professor"]."'\"><i class='fa fa-trash'></i></button>
				   </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "Não encontrou resultados";
	}
?>