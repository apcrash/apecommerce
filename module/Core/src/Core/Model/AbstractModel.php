<?php

namespace Core\Model;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\BaseInterface\EntityManagerAwareInterface;
use Core\BaseInterface\ConfigAwareInterface;
use Core\BaseInterface\ModuleOptionsAwareInterface;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\AbstractOptions;

abstract class AbstractModel implements EntityManagerAwareInterface, ServiceLocatorAwareInterface,
    ConfigAwareInterface, ModuleOptionsAwareInterface
{
    protected $em;
    protected $sl;
    protected $options;
    protected $config;
    
    public function getEntityManager() 
    {
        return $this->em;
    }

    public function setEntityManager(EntityManager $entityManager) 
    {
        if ($this->em === null) {
            $this->em = $entityManager;
        }
    }

    public function getServiceLocator() 
    {
        return $this->sl;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) 
    {
        if ($this->sl === null) {
            $this->sl = $serviceLocator;
        }
    }

    public function getConfig($name = null) 
    {
        if (!isset($name) || empty($name)) {
            return $this->config;
        }
    }

    public function setConfig(array $config) 
    {
        $this->config = $config;
    }
    
    public function getOption($name)
    {
        if (isset($this->option[$name])) {
            return $this->option[$name];
        }
        return false;
    }

    public function getOptions() 
    {
        return $this->options;
    }

    public function setOptions(AbstractOptions $options) 
    {
        $this->options = $options;
    }
    
    public function getRepository($entity)
    {
        if (!property_exists($this, $entity))
        {
            $this->$entity = $this->getEntityManager()->getRepository($entity);
        }
        return $this->$entity;
    }

}