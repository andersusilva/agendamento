<h1>Cadastrar Disciplina</h1>
<form action="index.php?page=salvar-disciplina&acao=cadastrar" method="POST">
	<div class="form-group">
		<label>Nome da Disciplina:</label>
		<input type="text" name="nome_disciplina" class="form-control" required>
	</div>
	
	<div class="form-group">
		<label>Turno:</label>
		<SELECT name="turno_disciplina" class="form-control" required>
		<OPTION>MATUTINO
		<OPTION>VESPERTINO
		<OPTION>NOTURNO
		</SELECT>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>