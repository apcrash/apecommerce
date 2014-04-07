<?php

namespace ApeCheckout\Option;

use Zend\Stdlib\AbstractOptions;
/**
 * Description of ModuleOptions
 *
 * @author apaggabao
 */
class ModuleOptions extends AbstractOptions
{
    protected $paypalOptions        = array();
    protected $stripeOptions        = array();
    protected $ewayOptions          = array();
    protected $debug                = false;
    protected $ewayEnabled          = true;
    protected $paypalEnabled        = true;
    protected $paypalProEnabled     = false;
    protected $stripeEnabled        = false;
    protected $bpayEnabled          = true;
    protected $bankTransferEnabled  = true;
    protected $requireSignIn        = false;
    protected $enableRegister       = false;


    public function __construct($options = null) {
        parent::__construct($options);
    }
    
    public function setPaypalOptions($paypalOptions)
    {
        $this->paypalOptions = $paypalOptions;
    }
    
    public function getPaypalOptions()
    {
        return $this->paypalOptions;
    }
    
    public function getPaypalOption($option)
    {
        return $this->paypalOptions[$option];
    }
    
    public function setStripeOptions($stripeOptions)
    {
        $this->stripeOptions = $stripeOptions;
    }
    
    public function getStripeOptions()
    {
        return $this->stripeOptions;
    }
    
    public function getStripeOption($option)
    {
        return $this->stripeOptions[$option];
    }
    
    public function setEwayOptions($ewayOptions)
    {
        $this->ewayOptions = $ewayOptions;
    }
    
    public function getEwayOptions()
    {
        return $this->ewayOptions;
    }
    
    public function getEwayOption($option)
    {
        return $this->ewayOptions[$option];
    }
    
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }
    
    public function getDebug()
    {
        return $this->debug;
    }
    
    public function setEwayEnabled($option)
    {
        $this->ewayEnabled = $option;
    }
    
    public function getEwayEnabled()
    {
        return $this->ewayEnabled;
    }
    
    public function setPaypalEnabled($option)
    {
        $this->paypalEnabled = $option;
    }
    
    public function getPaypalEnabled()
    {
        return $this->paypalEnabled;
    }
    
    public function setPaypalProEnabled($option)
    {
        $this->paypalProEnabled = $option;
    }
    
    public function getPaypalProEnabled()
    {
        return $this->paypalProEnabled;
    }
    
    public function setStripeEnabled($option)
    {
        $this->stripeEnabled = $option;
    }
    
    public function getStripeEnabled()
    {
        return $this->stripeEnabled;
    }
    
    public function setBpayEnabled($option)
    {
        $this->bpayEnabled = $option;
    }
    
    public function getBpayEnabled()
    {
        return $this->bpayEnabled;
    }
    
    public function setBankTransferEnabled($option)
    {
        $this->bankTransferEnabled = $option;
    }
    
    public function getBankTransferEnabled()
    {
        return $this->bankTransferEnabled;
    }
    
    public function getEnabledMethods()
    {
        $tmp = get_object_vars($this);
        foreach ($tmp as $key => $value) {
            if (strstr($key, 'Enabled') && $value == true) {
                $ret[] = $key;
            }
        }
        return $ret;
    }
    
    public function setRequireSignIn($requireSignIn)
    {
        $this->requireSignIn = $requireSignIn;
    }
    
    public function getRequireSignIn()
    {
        return $this->requireSignIn;
    }
    
    public function setEnableRegister($enableRegister)
    {
        $this->enableRegister = $enableRegister;
    }
    
    public function getEnableRegister()
    {
        return $this->enableRegister;
    }
}
