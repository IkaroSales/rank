<?php
namespace Users;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Users\Model\Post;

class Module implements ConfigProviderInterface {

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig() {
        return [
            'factories'=> [
                Model\PostTable::class => function($container) {
                    $tableGateway = $container->get(Model\PostTableGateway::class);
                    return new Model\PostTable($tableGateway);
                },
                    
                /*Model\PostTable::class => function($container) {
                    $adapter = $container->get(Model\adapterInterface::class);
                    return new Model\PostTable($adapter);
                },*/
                Model\PostTableGateway::class => function($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Post());

                    return new TableGateway('post', $dbAdapter, null, $resultSetPrototype);
                 }    
               /* "Users\Model\Post" => function($container) {
                    $dbAdapter = $container->get('Zend\Db\Adapter\Adapter');
                    $table = new \Users\Model\Post('Post',$Adapter);

                    return $table;
                }*/
                
            ]
        ];  
    }

    public function getControllerConfig() {
        return [
            'factories' => [
                Controller\UsersController::class => function($container) {
                    return new Controller\UsersController($container->get(Model\PostTable::class));
                }
            ]
        ];
    }
}

/*class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    //const VERSION = '3.0.3-dev';

     public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
     public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
*/