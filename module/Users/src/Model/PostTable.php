<?php
namespace Users\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Session\Exception\RuntimeException;
use Zend\Db\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Adapter\AdapterInterface;

class PostTable {                                                     // ficam as queres
    private $tableGateway;
    public $adapter;
    
    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        return $this->tableGateway->select();
    }
    
    public function fetchOrder() {
        return $this->tableGateway->select(function (Select $select) { $select->order('pontos DESC'); });
    }
     public function findOrderDecresc(){
        return $this->tableGateway->select(function (Select $select) { $select->order('pontos DESC'); });
        
    }
    public function save(Post $post){
        $data = array(
            'nome' => $post->nome,
            'rank'  => $post->rank,
            'pontos'  => $post->pontos,
        );
        $id = (int)$post->id;

        if($id == 0) {                                                              // se id for zero insere
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->find($id)){                                                     // se encontrar id faz update
            throw new RuntimeException(sprintf('Could not retrieve the row %d', $id));

        }
        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function delete($id){
        $this->tableGateway->delete(['id' => (int) $id]);
    }

    public function find($id){                      // metodo para recuperar os dados do banco (get Us)
        $id  = (int) $id;             
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row){                     
            throw new RuntimeException(sprintf('Could not retrieve the row %d', $id));
        }
        return $row;
    }

}







