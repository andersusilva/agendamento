<h1>Editar Sala</h1>
<?php
    $sql = 'SELECT * FROM sala
            INNER JOIN disciplina
            INNER JOIN professor
            WHERE id_sala='.$_REQUEST['id_sala'];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); ?>
<form action="index.php?page=salvar-sala&acao=editar&id_sala=<?php echo $row['id_sala']; ?>" method="POST">
	<div class="form-group">
		<label>Nome do Professor</label>
		<?php
            $sql_1 = 'SELECT * FROM professor';

        $result_1 = $conn->query($sql_1);

        $qtd_1 = $result_1->num_rows;

        if ($qtd_1 > 0) {
            echo "<select name='nome_professor' class='form-control'>";
            //* print "<option value='".$row["id_professor"]."'>".$row["nome_professor"]."</option>"; *\\
            while ($row_1 = $result_1->fetch_assoc()) {
                echo "<option value='".$row_1['id_professor']."'>".$row_1['nome_professor'].'</option>';
            }
            echo '</select>';
        } else {
            echo 'Não encontrou resultados';
        } ?>
	</div>
	<div class="form-group">
		<label>Nome da Sala:</label>
		<input type="text" name="nome_sala" class="form-control" value="<?php echo $row['nome_sala']; ?>" required>
	</div>
		<div class="form-group">
		<label>Capacidade:</label>
		<input type="number" name="capacidade" class="form-control" min="1" max="50" value="<?php echo $row['capacidade']; ?>" required>
	</div>
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
        <label>Adaptada para Deficientes:</label>
        <INPUT TYPE="radio" NAME="pcd" VALUE="SIM" value="<?php echo $row['pcd']; ?>" required> SIM
        <INPUT TYPE="radio" NAME="pcd" VALUE="NAO" value="<?php echo $row['pcd']; ?>" required> NAO
    </div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>
<?php
    } //final do if
?>