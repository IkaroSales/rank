<?php

// conexao com banco usando drive PDO 
return array(
	'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=meubanco;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''  // driveres sempre setar com TF8
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory', // chama o servise manager e passa via factories
        ),
    ),
);