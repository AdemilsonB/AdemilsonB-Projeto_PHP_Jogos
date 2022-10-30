<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Aula 10 - Home</title>
</head>
<body class="fontti">

	<h1 class="title">Página Inicial</h1>

	<?php include 'menu.php'; ?>

	<h3 class="jogos">Cadastro de Jogos</h3>

	<form action="jogos.php" method="post">
		
		<p>
			<label for="nome" class="indices">Nome:</label><br>
			<input type="text" name="nome" id="nome" class="buttone bote" placeholder="Digite o nome:">
		</p>

		<p>
			<label for="tipo" class="indices">Estilo do Jogo:</label><br>
			<input type="text" name="tipo" id="tipo" class="buttone bote" placeholder="Digite o estilo:">
		</p>

		<p>
			<label for="dataLancamento" class="indices">Ano de Lançamento:</label><br>
			<input type="text" name="dataLancamento" id="dataLancamento" class="buttone bote"  placeholder="Digite o ano:">
		</p>

		<p>
			<label for="versao" class="indices">Versão:</label><br>
			<input type="number" name="versao" id="versao" class="buttone bote" placeholder="Digite a versão:">
		</p>

		<p>
			<button type="submit" name="cadastrar" class="boottte buttonni">Cadastrar</button>
		</p>

	</form>


</body>
</html>