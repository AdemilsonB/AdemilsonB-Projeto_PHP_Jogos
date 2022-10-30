<?php include 'func.php';

	if(!empty($_GET['id']))
	{
		$id = $_GET['id'];
		DeletarJogo($id);
	}
	else
	{
		header('location:jogos.php?msg=noid');
	}
?>