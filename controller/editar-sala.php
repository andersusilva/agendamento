<h1>Editar Sala</h1>
<?php
	$sql = "SELECT * FROM sala AS s
			INNER JOIN disciplina AS d
			ON s.id_sala = d.sala_id_sala
			WHERE id_sala=".$_REQUEST["id_sala"];
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
?>
<form action="index.php?page=salvar-sala&acao=editar&id_sala=<?php print $row["id_sala"]; ?>" method="POST">
	<div class="form-group">
		<label>Nome do Professor</label>
		<?php
			$sql_1 = "SELECT * FROM professor";
			
			$result_1 = $conn->query($sql_1);
			
			$qtd_1 = $result_1->num_rows;
			
			if($qtd_1 > 0){
				print "<select name='nome_professor' class='form-control'>";
				//* print "<option value='".$row["id_professor"]."'>".$row["nome_professor"]."</option>"; *\\
				while( $row_1 = $result_1->fetch_assoc() ){
					print "<option value='".$row_1["id_professor"]."'>".$row_1["nome_professor"]."</option>";
				}
				print "</select>";
			}else{
				print "Não encontrou resultados";
			}
		?>
	</div>
	<div class="form-group">
		<label>Nome da Sala:</label>
		<input type="text" name="nome_sala" class="form-control" value="<?php print $row["nome_print"]; ?>" required>
	</div>
		<div class="form-group">
		<label>Capacidade:</label>
		<input type="number" name="capacidade" class="form-control" min="1" max="50" value="<?php print $row["capaciade"]; ?>" required>
	</div>
	<div class="form-group">
		<label>Nome da Disciplina:</label>
		<input type="date" name="nome_disciplina" class="form-control" value="<?php print $row["nome_disciplina"]; ?>" required>
	</div>
    <div class="form-group">
        <label>Turno:</label>
        <SELECT name="turno_disciplina" class="form-control" value="<?php print $row["turno_disciplina"]; ?>" required>
            <OPTION>MATUTINO
            <OPTION>VESPERTINO
            <OPTION>NOTURNO
        </SELECT>
    </div>
    <div class="form-group">
        <label>Adaptada para Deficientes:</label>
        <INPUT TYPE="radio" NAME="pcd" VALUE="true" value="<?php print $row["turno_disciplina"]; ?>" required> SIM
        <INPUT TYPE="radio" NAME="pcd" VALUE="false" value="<?php print $row["turno_disciplina"]; ?>" required> NAO
    </div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>
<?php
	} //final do if
?>