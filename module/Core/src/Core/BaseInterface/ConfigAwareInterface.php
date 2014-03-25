<?php

/**
 * ConfigAwareInterface
 * 
 * interface for initialization of config in a class
 * 
 * @author Alphonse Paggabao <apcrash@gmail.com>
 * @created March 21, 2014
 * 
 */

namespace Core\BaseInterface;

interface ConfigAwareInterface
{
    
    public function setConfig(array $config);
    
    public function getConfig($name = null);
    
}