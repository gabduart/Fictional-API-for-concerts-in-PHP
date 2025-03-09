<?php
class eventosHoower implements JsonSerializable{

	private $eventoId;
	private $nome;
	private $data;
	private $local;
    private $descricao;

	function jsonSerialize(){
		return 
		[
			'eventoId' 	=> $this->eventoId,
			'nome'	 	=> $this->nome,
			'data' 	=> $this->data,
			'local'		=> $this->local,
            'descricao'		=> $this->descricao
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

	    //"eventos" = "tbeventos"
	function cadastrar(){
	$comandoSql = "insert into eventos (nome, data, local, descricao) values (?,?,?,?)";
	$valores = array($this->nome, $this->data, $this->local, $this->descricao);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	}

	function atualizar(){
	$comandoSql = "update eventos set nome = ?, data = ?, local = ?, descricao = ? where eventoId = ?";
	$valores = array($this->nome, $this->data, $this->local, $this->descricao, $this->eventoId);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	}

	function excluir(){
	$comandoSql = "delete from eventos where eventoId = ?";
	$valores = array($this->eventoId);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	}

	function consultar(){
	$comandoSql = "select * from eventos";
	$exec = $this->con->prepare($comandoSql);
	$exec->execute();

	$dados = array();

	foreach ($exec->fetchAll() as $value) {
		$Eventos = new eventosHoower;
		$Eventos->nome  		= $value["nome"];
		$Eventos->data	= $value["data"];
		$Eventos->local 		= $value["local"];
		$Eventos->descricao 		= $value["descricao"];
		$Eventos->eventoId		= $value["eventoId"];	

		$dados[] = $Eventos;		
		}
		return $dados;
	}

	function retornarDados(){
	$comandoSql = "select * from eventos where eventoId = ?";
	$valores = array($this->eventoId);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	$value  = $exec->fetch();

	$Eventos = new eventosHoower;
	$Eventos->nome 		= $value["nome"];
	$Eventos->data	= $value["data"];
	$Eventos->local 		= $value["local"];
	$Eventos->descricao		= $value["descricao"];
	$Eventos->eventoId		= $value["eventoId"];
	return $Eventos;
	}

	function retornarDadosNome(){
	$comandoSql = "select * from eventos where nome = ?";
	$valores = array($this->nome);
	$exec = $this->con->prepare($comandoSql);
	$exec->execute($valores);
	$value  = $exec->fetch();

	$Eventos = new eventosHoower;
	$Eventos->nome 		= $value["nome"];
	$Eventos->data	= $value["data"];
	$Eventos->local 		= $value["local"];
	$Eventos->descricao		= $value["descricao"];
	$Eventos->eventoId		= $value["eventoId"];
	return $Eventos;
	}

	function retornarDadosNomeDinamico(){
		$comandoSql = "select * from eventos where nome like ?";
		$valores = array("%".$this->nome."%");
		$exec = $this->con->prepare($comandoSql);
		$exec->execute($valores);
		$dados = array();
	
	
		foreach ($exec->fetchAll() as $value) {
			$Eventos = new eventosHoower;
			$Eventos->nome 		= $value["nome"];
			$Eventos->data	= $value["data"];
			$Eventos->local 		= $value["local"];
			$Eventos->descricao		= $value["descricao"];
			$Eventos->eventoId		= $value["eventoId"];
			$dados[] = $Eventos;     
		}
		return $dados;
	}
}
?>
