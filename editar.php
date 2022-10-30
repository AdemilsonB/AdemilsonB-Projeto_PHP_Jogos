<?php if(!empty($_GET['id'])): ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Editar</title>
</head>
<body>

	<h1 class="edit">Edição do jogo</h1>

	<?php 
		include 'menu.php'; 
		include 'func.php';

		$id = $_GET['id'];
		$jogo = CarregarFormEdt($id);

		if($jogo != null):
	?>

	<h3 class="edit">Editar jogo</h3>

	<form action="editado.php" method="post">
		
		<p>
			<label for="nome" class="indices">Nome:</label><br>
			<input class="buttone bote" type="text" name="nome" id="nome" value="<?php 
			echo $jogo['nome']; ?>">
		</p>

		<p>
			<label for="tipo" class="indices">Estilo do Jogo:</label><br>
			<input class="buttone bote" type="text" name="tipo" id="tipo" value="<?php 
			echo $jogo['tipo']; ?>">
		</p>

		<p>
			<label for="dataLancamento" class="indices">Data de Lançamento:</label><br>
			<input class="buttone bote" type="text" name="dataLancamento" id="dataLancamento" value="<?php echo $jogo['dataLancamento']; ?>">
		</p>

		<p>
			<label for="versao" class="indices">Versão:</label><br>
			<input class="buttone bote"  type="text" name="versao" id="versao" value="<?php echo $jogo['versao']; ?>">
		</p>

		<input type="hidden" name="id" value="<?php echo $jogo['id']; ?>">

		<p>
			<button type="submit" name="editar" class="boottte buttonni">Editar</button>
		</p>

	</form>
	<?php else: echo '<h3>Erro ao carregar jogo solicitado</h3>'; endif; ?>


</body>
</html>
<?php else: header('location:jogos.php?msg=noid'); endif; ?> 