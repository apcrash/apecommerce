<?php

/**
 * ModuleOptionsAwareInterface
 * 
 * interface for initialization of module default options in a class
 * 
 * @author Alphonse Paggabao <apcrash@gmail.com>
 * @created March 21, 2014
 * 
 */

namespace Core\BaseInterface;

use Zend\Stdlib\AbstractOptions;

interface ModuleOptionsAwareInterface
{
    
    public function setOptions(AbstractOptions $options);
    
    public function getOptions();
    
    public function getOption($name);
    
}