<?php
namespace Users\Factory;

use Users\Model\Post;
use Interop\Container\ContainerInterface;
use Users\Model\ZendDbSqlRepository;
use Zend\Db\Adapter\AdapterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Hydrator\Reflection as ReflectionHydrator;


class ZendDbSqlRepositoryFactory implements FactoryInterface
{
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ZendDbSqlRepository
        	$container->get(AdapterInterface::class),
        	new ReflectionHydrator(),
            new Post('', '');
        );
    }
	
}