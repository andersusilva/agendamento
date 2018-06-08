<h1>Editar Disciplinas</h1>
<?php
    $sql = 'SELECT * FROM disciplina AS s
			INNER JOIN sala AS d
			ON d.id_sala = s.sala_id_sala
			WHERE id_disciplina='.$_REQUEST['id_disciplina'];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); ?>
<form action="index.php?page=salvar-disciplina&acao=editar&id_disciplina=<?php echo $row['id_disciplina']; ?>" method="POST">
	<div class="form-group">
		<label>Nome da Disciplina:</label>
		<input type="text" name="nome_disciplina" class="form-control" value="<?php echo $row['nome_disciplina']; ?>" required>
	</div>
    <div class="form-group">
        <label>Turno:</label>
        <SELECT name="turno_disciplina" class="form-control" value="<?php echo $row['turno_disciplina']; ?>" required>
            <OPTION>MATUTINO
            <OPTION>VESPERTINO
            <OPTION>NOTURNO
        </SELECT>
    </div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>
<?php
    } //final do if
?>