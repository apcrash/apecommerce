<?php

return array(
    'initializers' => array(
        'Core\BaseInitializer\EntityManagerInitializer',
        'Core\BaseInitializer\ConfigInitializer',
        'Core\BaseInitializer\ModuleOptionsInitializer'
    ),
    'invokables' => array(
        'Zend\Session\SessionManager' => 'Zend\Session\SessionManager',
    ),
    'aliases' => array(
        'zfcuser_doctrine_em' => 'Doctrine\ORM\EntityManager'
    )
);