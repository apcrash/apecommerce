<?php

return array(
    'initializers' => array(
        'Core\BaseInitializer\ConfigInitializer',
        'Core\BaseInitializer\ModuleOptionsInitializer',
        'Core\BaseInitializer\EntityManagerInitializer',
    ),
    'invokables' => array(
        'Zend\Session\SessionManager' => 'Zend\Session\SessionManager',
    ),
    'aliases' => array(
        'zfcuser_doctrine_em' => 'Doctrine\ORM\EntityManager'
    )
);