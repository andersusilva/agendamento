<h1>Cadastrar Sala</h1>
<form action="index.php?page=salvar-sala&acao=cadastrar" method="POST">
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
		<label>Adaptada para Deficientes:</label>
		<INPUT TYPE="radio" NAME="pcd" class="form" VALUE="SIM" required> SIM
        <INPUT TYPE="radio" NAME="pcd" class="form" VALUE="NAO" required> NAO
	</div>
	
	<div class="form-group">
		<label>Tipo:</label>
		<SELECT name="tipo" class="form-control" required>
		<OPTION>Laboratório
		<OPTION>Estudo
		<OPTION>Evento
		</SELECT>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>