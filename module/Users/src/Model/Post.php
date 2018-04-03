<?php
namespace Users\Model;     // nossos model - zend db usa datatablegetewal - representa cada entidade nossa como 
                           // uma tabela no banco de dados.
use Zend\Db\Table\Select;

class Post{
	
	public $id;                                     // setando os dados da tabela
	public $nome;
	public $rank;
	public $pontos;

	private $db;
	private $hydrator;
    private $postPrototype;

	public function exchangeArray(array $data) {                   // idrator - busca methodos dentro dos models 
		$this->id = (!empty($data['id'])) ? $data['id'] : null;   
		$this->nome = (!empty($data['nome'])) ? $data['nome'] : null;
		$this->rank  = (!empty($data['rank'])) ? $data['rank'] : null;
		$this->pontos  = (!empty($data['pontos'])) ? $data['pontos'] : null;
	}

	public function getArrayCopy() { // pega o objeto no formato de array
		return [
			'id'      => $this->id,
			'nome'    => $this->nome, 
			'rank'   => $this->rank,
			'pontos'   => $this->pontos
		];
	}
	 
}