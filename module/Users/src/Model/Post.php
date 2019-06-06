<?php
namespace Users\Model;

use Zend\Db\Table\Select;

class Post {
	public $id;
	public $nome;
	public $rank;
	public $pontos;

	private $db;
	private $hydrator;
    private $postPrototype;

	public function exchangeArray(array $data)
	{
		$this->id = (!empty($data['id'])) ? $data['id'] : null;   
		$this->nome = (!empty($data['nome'])) ? $data['nome'] : null;
		$this->rank  = (!empty($data['rank'])) ? $data['rank'] : null;
		$this->pontos  = (!empty($data['pontos'])) ? $data['pontos'] : null;
	}

	public function getArrayCopy()
	{
		return [
			'id'     => $this->id,
			'nome'   => $this->nome, 
			'rank'   => $this->rank,
			'pontos' => $this->pontos
		];
	} 
}
