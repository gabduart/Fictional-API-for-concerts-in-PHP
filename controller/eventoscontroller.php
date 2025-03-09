<?php
include_once("../model/eventos.php");
$Eventos = new eventosHoower;
if (isset($_REQUEST["acao"])){

	switch ($_REQUEST["acao"]) {

		case 'cadastrar':
		$Eventos->nome 	= $_POST['nome'];
		$Eventos->data	= $_POST['data'];
		$Eventos->local 	= $_POST['local'];
		$Eventos->descricao 	= $_POST['descricao'];
		$Eventos->cadastrar();
		echo "ok";
		break;
		
		case 'atualizar':
		$Eventos->nome 	= $_POST['nome'];
		$Eventos->data	= $_POST['data'];
		$Eventos->local 	= $_POST['local'];
		$Eventos->descricao 	= $_POST['descricao'];
		$Eventos->eventoId	= $_POST['eventoId'];
		$Eventos->atualizar();
		echo "ok";
		break;
		
		case 'excluir':
		$Eventos->eventoId = $_POST['eventoId'];
		$Eventos->excluir();
		echo "ok";
		break;

		case 'consultar_json':
		echo json_encode($Eventos->consultar());
		break;

		case 'retorna_cod':
		$Eventos->eventoId	= $_POST['eventoId'];
		echo json_encode($Eventos->retornarDados());
		break;

		case 'retorna_nome':
		$Eventos->nome = $_POST['nome'];
		echo json_encode($Eventos->retornarDadosNome());
		break;

		case 'retorna_nome_din':
            $Eventos->nome = $_POST['nome'];
            echo json_encode($Eventos->retornarDadosNomeDinamico());
            break;
	}
}
?>
