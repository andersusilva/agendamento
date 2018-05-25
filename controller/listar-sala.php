<h1>Listar Salas</h1>
<?php
	$sql = "SELECT * FROM sala AS s
            INNER JOIN disciplina AS d
            ON s.id_sala = d.sala_id_sala
            INNER JOIN professor AS p
            ON p.id_professor = d.professor_id_professor";
	
	$result = $conn->query($sql);
	
	$qtd = $result->num_rows;
	
	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
        print "<th>Nome da Sala:</th>";
		print "<th>Nome do Professor</th>";
		print "<th>Capacidade:</th>";
		print "<th>Nome da Disciplina:</th>";
		print "<th>Turno:</th>";
		print "<th>Adaptada para Deficientes:</th>";
		print "<th>Ações</th>";
		print "</tr>";
		while($row = $result->fetch_assoc()){	
			print "<tr>";
			print "<td>".$row["id_sala"]."</td>";
			print "<td>".$row["nome_sala"]."</td>";
			print "<td>".$row["nome_professor"]."</td>";
			print "<td>".$row["capacidade"]."</td>";
			print "<td>".$row["nome_disciplina"]."</td>";
			print "<td>".$row["turno_disciplina"]."</td>";
			print "<td>".$row["pcd"]."</td>";
			print "<td>
				
					<button class='btn btn-success' onclick=\"location.href='index.php?page=edit-print&id_print=".$row["id_print"]."';\"><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger' onclick=\"location.href='index.php?page=salvar-print&acao=excluir&id_print=".$row["id_print"]."';\"><i class='fa fa-trash'></i></button>
					
				   </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "Não encontrou resultados";
	}
	
?>