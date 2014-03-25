<?php

namespace ApeUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    
    public function loginAction()
    {
        $scnSocialAuth = $this->forward()->dispatch('ScnSocialAuth-User', array('action' => 'login'));
        $view = new ViewModel();
        $view->addChild($scnSocialAuth,'scnSocialAuth');
        $view->setTerminal(true);
        return $view;
    }

}