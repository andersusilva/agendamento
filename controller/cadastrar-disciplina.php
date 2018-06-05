<h1>Cadastrar Sala</h1>
<form action="index.php?page=salvar-sala&acao=cadastrar" method="POST">
	<div class="form-group">
		<label>Selecione o Nome do Professor:</label>
		<?php
			$sql = "SELECT * FROM professor";
			
			$result = $conn->query($sql);
			
			$qtd = $result->num_rows;
			
			if($qtd > 0){
				print "<select name='nome_professor' class='form-control'>";
				while( $row = $result->fetch_assoc() ){
					print "<option value='".$row["id_professor"]."'>".$row["nome_professor"]."</option>";
				}
				print "</select>";
			}else{
				print "Não encontrou resultados";
			}
		?>
	</div>
	
	<div class="form-group">
		<label>Nome da Sala:</label>
		<input type="text" name="nome_sala" class="form-control" required>
	</div>
	
	<div class="form-group">
		<label>Capacidade:</label>
	    <input type="number" name="capacidade" class="form-control" min="1" max="50" required>
	    <!--<input type="text" name="capacidade" class="form-control" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>-->
	</div>
	
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
		<label>Adaptada para Deficientes:</label>
		<INPUT TYPE="radio" NAME="pcd" class="form-control" VALUE="true" required> SIM
        <INPUT TYPE="radio" NAME="pcd" class="form-control" VALUE="false" required> NAO
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>