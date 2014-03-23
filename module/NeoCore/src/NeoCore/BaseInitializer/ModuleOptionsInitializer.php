<?php

/**
 * ModuleOptionsInitializer
 * 
 * interface for initialization of entity manager in a class
 * 
 * @author Alphonse Paggabao <apcrash@gmail.com>
 * @created March 21, 2014
 * 
 */

namespace NeoCore\BaseInitializer;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use NeoCore\BaseInterface\ModuleOptionsAwareInterface;

class ModuleOptionsInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator) {
        if ($instance instanceof ModuleOptionsAwareInterface) {
            $namespace = current(explode("\\",get_class($instance), -2));
            $moduleOptions = $namespace . '\Option\ModuleOptions';
            $config = $serviceLocator->get('Config');
            if (class_exists($moduleOptions)) {
                $instance->setOptions(new $moduleOptions(
                        isset($config[strtolower($namespace)]['options'])
                        ? $config[strtolower($namespace)]['options']
                        : null
                        ));
            }
        }
    }
}