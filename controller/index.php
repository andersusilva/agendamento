<!DOCTYPE html>
<html lang="pt-BR">
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Agendamento de Salas - UDF</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<link rel="stylesheet" href="view/css/bootstrap.min.css">
		<link rel="stylesheet" href="view/css/font-awesome.min.css">
		<style>
			.nav-link{font-size: 1.5em !important;}
		</style>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg -fixed-top" style="background-color: #e3f2fd;">
		<img src="images/logo.png" <!--width="40" height="40-->"><a class="navbar-brand" href="index.php">Agendamento de Salas<span class="sr-only">(current)</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Expandir Navegação
		<span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Professor
					</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="index.php?page=cad-professor">Cadastrar</a>
					  <a class="dropdown-item" href="index.php?page=list-professor">Listar</a>
					  <!-- <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="#search">Pesquisar</a>
					</div>-->
				  </li>
						<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Sala
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="index.php?page=cad-sala">Cadastrar</a>
					  <a class="dropdown-item" href="index.php?page=list-sala">Listar</a>
				  </li>
				</ul>
			  </div>
			</nav>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
					
						include("controller/include/config.php");
						
						switch(@$_REQUEST["page"]){
							case "cad-professor":
								include("controller/cadastrar-professor.php");
							break;
							case "list-professor":
								include("controller/listar-professor.php");
							break;
							case "salvar-professor":
								include("controller/salvar-professor.php");
							break;
							case "editar-professor":
								include("controller/editar-professor.php");
							break;
							case "cad-sala":
								include("controller/cadastrar-sala.php");
							break;
							case "list-sala":
								include("controller/listar-sala.php");
							break;
							case "salvar-sala":
								include("controller/salvar-sala.php");
							break;
							case "edit-sala":
								include("controller/editar-sala.php");
							break;
							default:
								include("home.php");
						}
					?>
				</div>
			</div>
		</div>
		
		<script src="view/js/jquery-3.2.1.slim.min.js"></script>
		<script src="view/js/popper.min.js"></script>
		<script src="view/js/bootstrap.min.js"></script>
	</body>
</html>