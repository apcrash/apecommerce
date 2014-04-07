<?php

namespace ApeCheckout\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of PaymentProcessor
 *
 * @author apaggabao
 */
class PaymentProcessor implements ServiceLocatorAwareInterface
{
    protected $sl;
    protected $pa;
    protected $totalAmount;
    
    public function getServiceLocator() 
    {
        return $this->sl;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) 
    {
        $this->sl = $serviceLocator;
    }
    
    public function setPaymentAdapter(AbstractPaymentAdapter $paymentAdapter) 
    {
        $this->pa = $paymentAdapter;
    }
    
    public function getPaymentAdapter()
    {
        return $this->pa;
    }
    
    public function execute()
    {
        return $this->getPaymentAdapter()->send();
    }

}