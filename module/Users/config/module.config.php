<?php
namespace Users;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
    ],

    'router' => [
        'routes' => [
            'users' => [
                'type' => Literal::class, 
                'options' => [
                    'route'    => '/users',
                    'defaults' => [
                        'controller' => Controller\UsersController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'post' => [
                'type' => Segment::class, 
                'options' => [
                    'route'    => '/users[/:action[/:id]]',   
                    'constraints'=>[                          
                        'action'=>'[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UsersController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'     => __DIR__ . '/../view/layout/layout.phtml',
            'users/users/index' => __DIR__ . '/../view/users/users/index.phtml',
            'error/404'         => __DIR__ . '/../view/error/404.phtml',
            'error/index'       => __DIR__ . '/../view/error/index.phtml',
        ],

        'template_path_stack' => [
            'users' => __DIR__ . '/../view',
        ],
    ],
];