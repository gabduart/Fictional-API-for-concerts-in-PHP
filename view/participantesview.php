<?php 
include_once("../controller/participantescontroller.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tela Participantes View</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<br>
		<div class="col-12">
			<h3>Participantes</h3><hr>
		<div class="card">
		<div class="card-header">
            Cadastro
        </div>
		<div class="card-body">
		<form method="POST" action="?acao=cadastrar">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" name="nome" class="form-control" required>
				</div>
                <div class="form-group">
					<label>E-mail:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Telefone:</label>
					<input type="text" name="telefone" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Idade:</label>
					<input type="text" name="idade" class="form-control" required>
				</div>
				<input type="submit" class="btn btn-primary" value="Cadastrar">
			</form>
		</div>
        <div class="card-header">
            Alteração
        </div>
		<div class="card-body">
		<form method="POST" action="?acao=atualizar">
        <div class="form-group">
					<label>Nome:</label>
					<input type="text" name="nome" class="form-control" required>
				</div>
                <div class="form-group">
					<label>E-mail:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Telefone:</label>
					<input type="text" name="telefone" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Idade:</label>
					<input type="text" name="idade" class="form-control" required>
				</div>
                <div class="form-group">
					<label>Id do Participante:</label>
					<input type="text" name="participanteId" class="form-control" required>
				</div>

				<input type="submit" class="btn btn-primary" value="Alterar">
			</form>
		</div>
        <div class="card-header">
            Exclusão
        </div>
		<div class="card-body">
		<form method="POST" action="?acao=excluir">
				<div class="form-group">
					<label>Id do Participante:</label>
					<input type="text" name="participanteId" class="form-control" required>
				</div>
				<input type="submit" class="btn btn-primary" value="Excluir">
		</form>
		</div>
        <div class="card-header">
            Consultar por nome
        </div>
		<div class="card-body">
		<form method="POST" action="?acao=retorna_nome">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" name="nome" class="form-control" required>
				</div>
				<input type="submit" class="btn btn-primary" value="Consultar">
			</form>
		</div>
        <div class="card-header">
            Consultar pelo Id do Participante
        </div>
		<div class="card-body">
		<form method="POST" action="?acao=retorna_cod">
				<div class="form-group">
					<label>Id do Participante:</label>
					<input type="text" name="participanteId" class="form-control" required>
				</div>
				<input type="submit" class="btn btn-primary" value="Consultar">
			</form>
		</div>
        <div class="card-header">
            Consultar
        </div>
		<div class="card-body">
		<form method="POST" action="?acao=consultar_json">
			<input type="submit" class="btn btn-primary" value="Consultar">	

		</form>
		</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>