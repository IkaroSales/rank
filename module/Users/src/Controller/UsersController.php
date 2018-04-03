<?php
namespace Users\Controller;

use Zend\Validator;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\AbstractListenerController;
use Zend\View\Model\ViewModel;
use Users\Model\PostTable;
use Users\Form\PostForm;
use Users\Model\Post;
use Zend\Db\Table\Select;
use Zend\Db\Adapter;
use Zend\Db\Sql\Sql;
//use Zend\Db\Sql\Select;

class UsersController extends AbstractActionController {
    private $table;

    public $adapter;

    public function __construct(PostTable $table) {
        $this->table = $table;
    }

    public function indexAction(){    // home
        $postsTable = $this->table;

        return new ViewModel([
        	'posts' => $postsTable->fetchOrder()   
        ]);
    }

    public function listAction(){    // usuarios
        $postsTable = $this->table;

        return new ViewModel([
            'posts' => $postsTable->fetchAll()   
        ]);
       
    }
    public function pesqAction(){    // select
        $postsTable = $this->table;

        return new ViewModel([
            'posts' => $postsTable->findOrderDecresc()   
        ]);
       
    }

     public function buscaAction(){      // rank
        $postsTable = $this->table;

        return new ViewModel([
            'posts' => $postsTable->fetchOrder()   
        ]);
       
    }

    public function addAction(){
        $form = new PostForm();
        $form->get('submit')->setValue('Adicionar');

        $request = $this->getRequest();
        if(!$request->isPost())
            return new ViewModel(['form' => $form]);

        $content = array(
            "nome" => $request->getPost("nome"),
            "rank" => $request->getPost("rank"),
            "pontos" => $request->getPost("pontos")
        );

        $post = new Post();
        $post->exchangeArray($content);

        $this->table->save($post);
        return $this->redirect()->toRoute('users');
    }

    public function deleteAction(){
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id)
            return $this->redirect()->toRoute('post');
        $this->table->delete($id);
        return $this->redirect()->toRoute('post');
    }
    public function editAction(){
        $id = (int) $this->params()->fromRoute('id', 0);   // pega informacao da rota pelo parametro da rota - pega fromrota id e se nao tiver nada pega como zero

        if (!$id){ // se id for zero nao edito nada
            return $this->redirect()->toRoute('post');
         
        }
        try{
        $post = $this->table->find($id);    // e se id nao for vazio pegamos as informacoes do banco    
        }
        catch(\Exception $e){
            return $this->redirect()->toRoute('post');
        }
        $form = new PostForm();
        $form->bind($post);      //bind preenche automaticamente os campos do meu form
        $form->get('submit')->setAttribute('value','Edit Post');

        $request = $this->getRequest();

        if(!$request->isPost()){
            return[
                'id'=>$id,
                'form'=>$form
            ];
    
        }
        $form->setData($request->getPost());
        if(!$form->isValid()){
            return[
                'id'=>$id,
                'form'=>$form
            ];
        }
        $this->table->save($post);
        return $this->redirect()->toRoute('post');

    } 

}


