<?php
namespace MyModule;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;
use Rzn\Library\ServiceManager\ServiceLocatorAwareInterface;
use Rzn\Library\ServiceManager\ServiceLocatorInterface;
use Rzn\Library\Registry;

Loc::loadMessages(__FILE__);

class ListenerAutorize
{
	
	
	 /**
     * @param $e \Rzn\Library\EventManager\Event
     */
    public function __invoke($e)
    {
	    
	    switch($e->GetName()){
		  	case 'main_OnAfterUserLogin':
			    $params = $e->getParams();
		        $sm = Registry::getServiceManager();
			    $objAuth = $sm->get('fatModel');
			    
			    $objAuth->registerAuthorize($params[0]["PASSWORD"], $params[0]["RESULT_MESSAGE"]);
			    break;
			case 'main_OnUserLogin':
				$params = $e->getParams();
				$sm = Registry::getServiceManager();
			    $objAuth = $sm->get('fatModel');
			    $objAuth->setlogin($params[1]["user_fields"]["LOGIN"]);
			    $objAuth->clearFlg();
	    }
        
        
    }
    
    
 }
