<h1>Editar professor</h1>
<?php
	$sql = "SELECT * FROM professor WHERE id_professor = ".$_REQUEST["id_professor"];
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
?>
<form action="index.php?page=salvar-professor&acao=editar&id_professor=<?php print $_REQUEST["id_professor"]; ?>" method="POST">
	<div class="form-group">
		<label>Nome do Professor</label>
		<input type="text" name="nome_professor" class="form-control" value="<?php print $row["nome_professor"]; ?>">
	</div>
	<div class="form-group">
		<label>Sobrenome do Professor</label>
		<input type="text" name="sobrenome_professor" class="form-control" value="<?php print $row["sobrenome_professor"]; ?>">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Salvar</button>
	</div>
</form>
<?php
	} //fim do if
?>