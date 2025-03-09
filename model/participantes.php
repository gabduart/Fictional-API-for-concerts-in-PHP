<?php
class participantesHoower implements JsonSerializable{

	private $participanteId;
    private $nome;
    private $email;
	private $telefone;
    private $idade;

	function jsonSerialize(){
		return 
		[
			'participanteId' 	=> $this->participanteId,
			'nome'	 	=> $this->nome,
            'email'		=> $this->email,
			'telefone' 	=> $this->telefone,
            'idade' 	=> $this->idade
		];
	}

	function __get($atributo){
		return $this->atributo;
	}

	function __set($atributo, $value){
		$this->$atributo = $value;
	}

	private $con;
	function __construct(){
		include_once("conexao.php");
		$classe_con = new Conexao();
		$this->con = $classe_con->Conectar();
	}

    	//"participantes" = "tbparticipantes"
	function cadastrar(){
	$comandoSql = "insert into participantes (nome, email, telefone, idade) values (?,?,?,?)";
	$valores = array($this->nome, $this->email, $this->telefone, $this->idade);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	}

	function atualizar(){
	$comandoSql = "update participantes set nome = ?, email = ?, telefone = ?, idade = ? where participanteId = ?";
	$valores = array($this->nome, $this->email, $this->telefone, $this->idade, $this->participanteId);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	}

	function excluir(){
	$comandoSql = "delete from participantes where participanteId = ?";
	$valores = array($this->participanteId);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	}

	function consultar(){
	$comandoSql = "select * from participantes";
	$exec = $this->con->prepare($comandoSql);
	$exec->execute();

	$dados = array();

	foreach ($exec->fetchAll() as $value) {
		$Participantes = new participantesHoower;
		$Participantes->nome  		= $value["nome"];
		$Participantes->email 		= $value["email"];
		$Participantes->telefone	= $value["telefone"];
		$Participantes->idade		= $value["idade"];
		$Participantes->participanteId		= $value["participanteId"];	
		$dados[] = $Participantes;		
		}
		return $dados;
	}

	function retornarDados(){
	$comandoSql = "select * from participantes where participanteId = ?";
	$valores = array($this->participanteId);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	$value  = $exec->fetch();
	
	$Participantes = new participantesHoower;
	$Participantes->nome 		= $value["nome"];
	$Participantes->email	= $value["email"];
	$Participantes->telefone 		= $value["telefone"];
	$Participantes->idade		= $value["idade"];
	$Participantes->participanteId		= $value["participanteId"];
	return $Participantes;
	}

	function retornarDadosNome(){
	$comandoSql = "select * from participantes where nome = ?";
	$valores = array($this->nome);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	$value  = $exec->fetch();

	$Participantes = new participantesHoower;
		$Participantes->nome  		= $value["nome"];
		$Participantes->email 		= $value["email"];
		$Participantes->telefone	= $value["telefone"];
		$Participantes->idade		= $value["idade"];
		$Participantes->participanteId		= $value["participanteId"];

	return $Participantes;
	}

	function retornarDadosNomeDinamico(){
		$comandoSql = "select * from participantes where nome like ?";
		$valores = array("%".$this->nome."%");
		$exec = $this->con->prepare($comandoSql);
		$exec->execute($valores);
		$dados = array();
	
	
		foreach ($exec->fetchAll() as $value) {
			$Participantes = new participantesHoower;
			$Participantes->nome  		= $value["nome"];
			$Participantes->email 		= $value["email"];
			$Participantes->telefone	= $value["telefone"];
			$Participantes->idade		= $value["idade"];
			$Participantes->participanteId		= $value["participanteId"];
			$dados[] = $Participantes;     
		}
		return $dados;
	}
}
?>
