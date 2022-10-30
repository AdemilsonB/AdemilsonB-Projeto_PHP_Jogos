<?php
include_once 'conn.php';

function VerificarEnvio()
{

	if(isset($_POST['cadastrar']))
	{
		ChecarCampos();
	}
}

function ChecarCampos()
{
	if (empty($_POST['nome'])           || empty($_POST['tipo'])
	 || empty($_POST['dataLancamento']) || empty($_POST['versao']))
	{
		echo '<h3>Por favor, preencha todos os campos para efetuar o cadastro do jogo</h3>';
	}
	else
	{
		$jogo['nome']             = $_POST['nome'];
		$jogo['tipo']             = $_POST['tipo'];
		$jogo['dataLancamento']   = $_POST['dataLancamento'];
		$jogo['versao']           = $_POST['versao'];

		InserirJogo($jogo);

	}
}

function InserirJogo($jogo)
{
	global $conn;

	$valores = "'".$jogo['nome'] ."',
				'".$jogo['tipo']  ."',
	            '".$jogo['dataLancamento']  ."',
	            '".$jogo['versao']."' ";


	$sql = "INSERT INTO jogos_tb (nome, tipo, dataLancamento, versao) 
	VALUES ($valores)";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		echo '<h3>Jogo cadastrado com sucesso!</h3>';
	}
	else
	{
		echo '<h3>Atenção: Erro ao cadastrar Jogo!</h3>';
	}
}

function ExibirJogos()
{
	global $conn;

	$sql = "SELECT * FROM jogos_tb";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		
		echo '<h3>Jogos Cadastrados:</h3>';

		while($registro = mysqli_fetch_assoc($result))
		{
			echo '<p>';
			foreach($registro as $indice => $valor)
			{
				
				if($indice == "id")
				{
					$id = $valor; 
				}
				echo '<b>'. ucfirst($indice) . ':</b> ' . $valor . '<br>';
			}

			echo '<a href="deletar.php?id='.$id.'">Deletar</a> | ';
			echo '<a href="editar.php?id='.$id.'">Editar</a>';

			echo '<p>';

		}
	}
	else
	{
		echo '<h3>Não existe livros cadastrados ainda...</h3>';
	}

}

// função para deletar livro
function DeletarJogo($id)
{
	global $conn;

	// cria comando sql
	$sql = "DELETE FROM jogos_tb WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:jogos.php?msg=delok');
	}
	else
	{
		header('location:jogos.php?msg=delerror');
	}
}

function VerificarMSG()
{
	if(!empty($_GET['msg']))
	{
		$msg = $_GET['msg'];

		if ($msg == "delok")
		{
			echo '<h3>Jogo excluído com sucesso!</h3>';
		}
		else if ($msg == "delerror")
		{
			echo '<h3>Erro ao excluir Jogo. Por Favor tentar novamente</h3>';
		}
		else if ($msg == "noid")
		{
			echo '<h3>Não foi possível realizar a ação solicitada. Id Inválido</h3>';
		}
		else if($msg == "edtok")
		{
			echo '<h3>Livro editado com sucesso!</h3>';
		}
		else if ($msg == "edterror")
		{
			echo '<h3>Não foi possivel editar livro solicitado. Por favor, tente novamente</h3>';
		}
		else if ($msg == "noedt")
		{
			echo '<h3>Favor clicar em "Editar" para realizar alterações no jogo solicitado</h3>';
		}
		else if ($msg == "emptyedt")
		{
			echo '<h3>Atenção: O formulário de edição não pode conter campos em branco!</h3>';
		}

	}
}

function CarregarFormEdt($id)
{
	global $conn;

	$sql = "SELECT * FROM jogos_tb WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		$jogo = mysqli_fetch_assoc($result);
		return $jogo;
	}

	return null;
}

function EditarJogo($jogo)
{
	global $conn;

	$fields = "nome            = '" .$jogo['nome'] ."', 
			   tipo            = '" .$jogo['tipo']  ."',
	           dataLancamento  = '" .$jogo['dataLancamento']  ."',
			   versao          = '" .$jogo['versao']."'";

	$where = "id = ".$jogo['id'];

	$sql = "UPDATE jogos_tb SET $fields WHERE $where";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:jogos.php?msg=edtok');
	}
	else
	{
		header('location:jogos.php?msg=edterror');
	}
}


?>