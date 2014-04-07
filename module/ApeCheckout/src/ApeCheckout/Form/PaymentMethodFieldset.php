<?php

namespace ApeCheckout\Form;

use Zend\Form\Fieldset;
use ApeCheckout\Option\PaymentMethodOptions;
use Zend\ServiceManager\ServiceLocatorInterface;

class PaymentMethodFieldset extends Fieldset
{
    
    protected $sl;
    protected $paymentMethodOptions;
    
    public function __construct(ServiceLocatorInterface $serviceLocator) {
        parent::__construct('paymentMethodFieldset');
        $this->setServiceLocator($serviceLocator);
        $this->addElements();
    }
    
    public function addElements() {
        $options = $this->formatEnabledMethods($this->getPaymentMethodOptions()->getEnabledMethods());
        $paymentMethod = new \Zend\Form\Element\Radio('paymentMethod');
        $paymentMethod->setLabel('Payment method:');
        $paymentMethod->setLabelAttributes(array('class' => 'control-label col-sm-2'));
        $paymentMethod->setAttribute('class', 'payment-input');
        $paymentMethod->setValueOptions($options);
        $this->add($paymentMethod);
    }
    
    public function formatEnabledMethods($enabledMethods) {
        foreach ($enabledMethods as $method) {
            $tmp[$method['data_value']] = $method['value'];
        }
        return $tmp;
    }
    
    public function setPaymentMethodOptions($options) {
        $this->paymentMethodOptions = $options;
    }
    
    public function getPaymentMethodOptions() {
        if ($this->paymentMethodOptions == null) {
            $config = $this->getServiceLocator()->get('Config');
            $paymentMethodOptions = new PaymentMethodOptions(
                    isset($config['payment_method_options']) 
                    ? $config['payment_method_options'] 
                    : null);
            $this->setPaymentMethodOptions($paymentMethodOptions);
        }
        return $this->paymentMethodOptions;
    }
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->sl = $serviceLocator;
    }
    
    public function getServiceLocator() {
        return $this->sl;
    }
    
}