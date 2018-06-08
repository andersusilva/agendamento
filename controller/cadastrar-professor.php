<h1>Cadastrar Professor</h1>
<form action="index.php?page=salvar-professor&acao=cadastrar" method="POST">
	<div class="form-group">
		<label>Nome do Professor: </label>
		<input type="text" name="nome_professor" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Sobrenome do Professor: </label>
		<input type="text" name="sobrenome_professor" class="form-control" required>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
</form>