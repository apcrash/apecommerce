<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'payment_action_controller' => 'ApeCheckout\Controller\IndexController'
        )
    ),
    'router' => array(
        'routes' => array(
            'payment' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/payment',
                    'defaults' => array(
                        'controller' => 'payment_action_controller',
                        'action'     => 'index'
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);