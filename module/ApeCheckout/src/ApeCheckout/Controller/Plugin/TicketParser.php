<?php

namespace ApeCheckout\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
/**
 * Description of TicketParser
 *
 * @author apaggabao
 */
class TicketParser extends AbstractPlugin
{
    
    const ABN_REG  = 'ABN Registration',
          ABN_REN  = 'ABN Reactivation',
          BN_REG   = 'Business Name Registration ',
          BN_REN   = 'Business Name Renewal',
          TFN_REG  = 'TFN Registration',
          ACN_REG  = 'Company Registration ',
          ACN_REN  = 'Company Reactivation',
          DN_REG   = 'Domain Name Registration',
          DN_REN   = 'Domain Name Renewal',
    
          ABN_DESC = 'Professional Tax Agent Service Fee',
          BN_DESC  = 'Professional ASIC Agent Service Fee & Australian Securities & Investments Commission Statutory Fee',
          TFN_DESC = 'Professional ATO Agent Service Fee',
          ACN_DESC = 'Professional ASIC Agent Service Fee',
          DN_DESC  = 'Domain Name Registration Fee';
    
    protected $ticketName;
    protected $name;
    protected $description;
    protected $amount;
    protected $gst;
    
    public function __invoke($rawTicket)
    {
        $ticket = json_decode($rawTicket, true);
        $name   = $ticket['service'] . '_' . strtoupper(substr($ticket['application_type'], 0, 3));
        $desc   = $ticket['service'] . '_DESC';
        if (isset($ticket['businessName'])) {
            $this->setName($ticket['businessName']);
        }
        $this->setTicketName(constant('self::'.$name));
        $this->setDescription(constant('self::'.$desc));
        $this->setAmount($ticket['price']);
        $this->setGst($ticket['gst']);
        return $this;
    }
    
    private function setTicketName($ticketName)
    {
        $this->ticketName = $ticketName;
    }
    
    public function getTicketName()
    {
        return $this->ticketName;
    }
    
    private function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    private function setAmount($amount)
    {
        $this->amount = $amount;
    }
    
    public function getAmount()
    {
        return $this->amount;
    }
    
    private function setGst($gst)
    {
        $this->gst = $gst;
    }
    
    public function getGst()
    {
        return $this->gst;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
}
