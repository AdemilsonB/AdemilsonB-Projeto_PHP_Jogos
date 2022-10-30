EDITADO

<?php include 'func.php';

if(isset($_POST['editar']))
{
	if(!empty($_POST['nome']) && !empty($_POST['dataLancamento']) && !empty($_POST['versao']))
	{
		$jogo['id'] 	          = $_POST['id'];
		$jogo['nome']             = $_POST['nome'];
		$jogo['tipo']             = $_POST['tipo'];
		$jogo['dataLancamento']   = $_POST['dataLancamento'];
		$jogo['versao']           = $_POST['versao'];

		EditarJogo($jogo);
	}
	else
	{
		header('location:jogos.php?msg=emptyedt');
	}


}
else
{
	header('location:jogos.php?msg=noedt');
}

?>