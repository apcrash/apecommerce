<?php

/**
 * EntityManagerAwareInterface
 * 
 * interface for initialization of entity manager in a class
 * 
 * @author Alphonse Paggabao <apcrash@gmail.com>
 * @created March 21, 2014
 * 
 */

namespace NeoCore\BaseInterface;

use Doctrine\ORM\EntityManager;

interface EntityManagerAwareInterface
{
    
    public function setEntityManager(EntityManager $entityManager);
    
    public function getEntityManager();
    
}