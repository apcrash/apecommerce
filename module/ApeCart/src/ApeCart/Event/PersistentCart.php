<?php

namespace ApeCart\Event;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

class PersistentCart extends AbstractListenerAggregate
{
    protected $events = [];
    
    public function attach(EventManagerInterface $events) {
        $events->setIdentifiers(array(__CLASS__, get_called_class()));
        $sharedEvents = $events->getSharedManager();
        $sharedEvents->attach('cart.add', '*', array($this, 'addToCart'));
        $sharedEvents->attach('cart.remove', '*', array($this, 'removeFromCart'));
        $events->setSharedManager($sharedEvents);
        $this->events = $events;
        return $this;
    }
    
    public function addToCart(MvcEvent $e)
    {
        
    }
    
    public function removeFromCart(MvcEvent $e)
    {
        
    }

}