<?php

/**
 * EntityManagerInitializer
 * 
 * auto-injects EntityManager in a class that implements EntityManagerAwareInterface
 * 
 * @author Alphonse Paggabao <apcrash@gmail.com>
 * @created March 21, 2014
 * 
 */

namespace Core\BaseInitializer;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\BaseInterface\EntityManagerAwareInterface;

class EntityManagerInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator) {
        if ($instance instanceof EntityManagerAwareInterface
                && $serviceLocator->has('Doctrine\ORM\EntityManager')) {
            $instance->setEntityManager($serviceLocator->get('Doctrine\ORM\EntityManager'));
        }
    }
}