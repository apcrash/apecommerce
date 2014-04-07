<?php

namespace ApeCheckout\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\Initializer\ModuleOptionsAwareInterface;
use Zend\Stdlib\AbstractOptions;
/**
 * Description of AbstractAdapter
 *
 * @author apaggabao
 */
abstract class AbstractPaymentAdapter implements ServiceLocatorAwareInterface,
    ModuleOptionsAwareInterface
{
    protected $errorMessages;
    protected $request;
    protected $response;
    protected $sl;
    protected $options;
    
    abstract protected function setRequest(array $request);
    abstract protected function getRequest();
    abstract protected function send();

        public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->sl = $serviceLocator;
    }
    
    public function getServiceLocator() {
        return $this->sl;
    }
    
    public function setErrorMessages(array $messages)
    {
        $this->errorMessages = $messages;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }
    
    public function getResponse()
    {
        return $this->response;
    }
    
    public function setOptions(AbstractOptions $option) 
    {
        $this->options = $option;
    }
    
    public function getOptions() 
    {
        return $this->options;
    }
}
