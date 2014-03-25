<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'ape_user_controller' => 'ApeUser\Controller\UserController'
        )
    ),
    'router' => array(
        'routes' => array(
            'ape_user' => array(
                'type' => 'Segment',
                'priority' => 3000,
                'options' => array(
                    'route' => '/user[/:action]',
                    'constraints' => array(
                        'action' => '[A-Za-z][A-Za-z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ape_user_controller'
                    )
                ),
                
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);