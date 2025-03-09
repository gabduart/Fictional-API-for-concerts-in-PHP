<?php
include_once("../model/participantes.php");
$Participantes = new participantesHoower;
if (isset($_REQUEST["acao"])){

	switch ($_REQUEST["acao"]) {

		case 'cadastrar':
		$Participantes->nome 	= $_POST['nome'];
		$Participantes->email 	= $_POST['email'];
		$Participantes->telefone	= $_POST['telefone'];
		$Participantes->idade	= $_POST['idade'];
		$Participantes->cadastrar();
		echo "ok";
		break;
		
		case 'atualizar':
		$Participantes->nome 	= $_POST['nome'];
		$Participantes->email 	= $_POST['email'];
		$Participantes->telefone	= $_POST['telefone'];
		$Participantes->idade	= $_POST['idade'];
		$Participantes->participanteId	= $_POST['participanteId'];
		$Participantes->atualizar();
		echo "ok";
		break;
		
		case 'excluir':
		$Participantes->participanteId = $_POST['participanteId'];
		$Participantes->excluir();
		echo "ok";
		break;

		case 'consultar_json':
		echo json_encode($Participantes->consultar());
		break;

		case 'retorna_cod':
		$Participantes->participanteId	= $_POST['participanteId'];
		echo json_encode($Participantes->retornarDados());
		break;

		case 'retorna_nome':
		$Participantes->nome = $_POST['nome'];
		echo json_encode($Participantes->retornarDadosNome());
		break;

		case 'retorna_nome_din':
            $Participantes->nome = $_POST['nome'];
            echo json_encode($Participantes->retornarDadosNomeDinamico());
            break;
	}
}
?>
