<?php
namespace Users\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Session\Exception\RuntimeException;
use Zend\Db\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;

class PostTable {                      // ficam as queres
    private $tableGateway;
    public $table;
    public $adapter;
    private $db;
    


    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        return $this->tableGateway->select();
    }
    
    public function fetchRow() {
        return $this->tableGateway->select();
    }
    /* public function findPost(rank $rank){
        $this->rank = $rank;
                                                    //  SELECT rank FROM `post` ORDER BY rank DESC
        $select->'rank' FRON('post');
               -> ORDERBY('rank');
        return $this->tableGateway->select();
        
     }*/

   /* public function findPost(){
        return $this->tableGateway->select()FROM('post');
                                  ->where('nome', 'A%');
        // return $this->tableGateway->select($select);
    }*/

    public function save(Post $post){
        $data = array(
            'nome' => $post->nome,
            'rank'  => $post->rank,
            'pontos'  => $post->pontos,
        );
        $id = (int)$post->id;

        if($id == 0) {                                // se id for zero insere
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->find($id)){                        // se encontrar id faz update
            throw new RuntimeException(sprintf('Could not retrieve the row %d', $id));

        }
        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function delete($id){
        $this->tableGateway->delete(['id' => (int) $id]);
    }

    public function find($id){      // metodo para recuperar os dados do banco (get Us)
        $id  = (int) $id;             
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row){                     
            throw new RuntimeException(sprintf('Could not retrieve the row %d', $id));
        }
        return $row;
    }

}







