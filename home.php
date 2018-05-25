<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"></head>
<body>
<h2>Bem Vindo (a)!</h2> 
<h3>Este é o Sistema da UDF que realiza agendamentos de salas.</h3>
<?php
	$sql = "SELECT * FROM disciplina AS d
            INNER JOIN professor AS p
            ON p.id_professor = d.professor_id_professor
            INNER JOIN sala AS s
            ON s.id_sala = d.sala_id_sala";
	
	$result = $conn->query($sql);
	
	$qtd = $result->num_rows;
	
	if($qtd > 0){
		print "<p>Foram encontrados <b>$qtd</b> sala (s) agendada (s)</p>";
		print "<table class='table table-bordered table-striped table-hover table-info' class='img-thumbnail'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Sala</th>";
		print "<th>Nome do Professor</th>";
		print "<th>Sobrenome do Professor</th>";
		print "<th>Disciplina</th>";
		print "<th>Turno</th>";
		print "</tr>";
		while($row = $result->fetch_assoc()){	
			print "<tr>";
			print "<td>".$row["id_disciplina"]."</td>";
			print "<td>".$row["nome_sala"]."</td>";
			print "<td>".$row["nome_professor"]."</td>";
			print "<td>".$row["sobrenome_professor"]."</td>";
			print "<td>".$row["nome_disciplina"]."</td>";
			print "<td>".$row["turno_disciplina"]."</td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "Não encontrou resultados";
	}
?>
<!--
<img src="uploads/noimg.jpg" width="215" alt="Imagem 1" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="Imagem 2" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="Imagem 3" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="imagem 4" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="imagem 5" class="img-thumbnail">
-->
</body>
</html>