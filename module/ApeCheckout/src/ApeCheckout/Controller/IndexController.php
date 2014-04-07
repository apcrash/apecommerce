<?php

namespace ApeCheckout\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
/**
 * Description of IndexController
 *
 * @author apaggabao
 */
class IndexController extends AbstractActionController
{

    const SESSION_CONTAINER = 'payment';
    
    protected $msApplicationId;
    protected $givenName;
    protected $lastName;
    protected $emailAdd;
    protected $address;
    protected $serviceTickets;
    protected $totalAmount;
    
    public function indexAction() 
    {
        $payment = new Container(self::SESSION_CONTAINER);
        if (!$payment->offsetExists('serviceTickets')) {
            $this->redirect()->toRoute('home');
        }
        $this->serviceTickets  = $payment->offsetGet('serviceTickets');
        
        if ($payment->offsetExists('msApplicationId')) {
            $this->msApplicationId = $payment->offsetGet('msApplicationId');
        }
        $this->givenName       = $payment->offsetGet('givenName');
        $this->lastName        = $payment->offsetGet('lastName');
        $this->emailAdd        = $payment->offsetGet('emailAdd');
        $this->address         = $payment->offsetGet('address');
        
        foreach ($this->serviceTickets as $row) {
            $ticketList[] = $this->parseTicket($row);
        }
        
        return array(
            'ticketList'  => $ticketList, 
            'totalAmount' => $this->_getTotalAmount(),
            'person'      => array(
                'givenName' => $this->givenName,
                'lastName'  => $this->lastName,
            ),
            'emailAdd'    => $this->emailAdd,
            'address'     => $this->address
        );
    }
    
    private function _getTotalAmount()
    {
        if (!isset($this->serviceTickets)) {
            throw new \Exception('No items to total.');
        }
        $totalAmount = 0;
        foreach ($this->serviceTickets as $row) {
            $ticket = json_decode($row, true);
            $totalAmount += $ticket['price'];
        }
        $this->totalAmount = $totalAmount;
        return $totalAmount;
    }
    
}
