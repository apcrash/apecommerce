<?php

/**
 * ConfigInitializer
 * 
 * auto-injects config in a class that implements ConfigAwareInterface
 * 
 * @author Alphonse Paggabao <apcrash@gmail.com>
 * @created March 21, 2014
 * 
 */

namespace Core\BaseInitializer;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\BaseInterface\ConfigAwareInterface;

class ConfigInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator) {
        if ($instance instanceof ConfigAwareInterface) {
            $instance->setConfig($serviceLocator->get('Config'));
        }
    }
}