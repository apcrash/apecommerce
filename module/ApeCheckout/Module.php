<?php

/**
 * @package     Masterswitch Core Development
 * @module	    TaxFileNumber
 * @category    Module
 * @version     2.0
 * @copyright   (c) 2013, Business Switch Pty Ltd
 * @author      Alphonse Paggabao <alphonse.paggabao@business-switch.com.au>
 * @created     27 March 2014
 */

namespace ApeCheckout;

class Module
{
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            )
        );
    }
    
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/services.config.php';
    }
    
    public function getControllerPluginConfig()
    {
        return array(
            'invokables' => array(
                'parseTicket' => 'ApeCheckout\Controller\Plugin\TicketParser'
            ),
            'shared' => array(
                'parseTicket' => false
            )
        );
    }
}