<?php
namespace MyModule;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;
use Rzn\Library\ServiceManager\ServiceLocatorAwareInterface;
use Rzn\Library\ServiceManager\ServiceLocatorInterface;

Loc::loadMessages(__FILE__);

class fatModel implements ServiceLocatorAwareInterface
{
	protected $sm;
	protected $flgUsed;
	protected $login;
	
	 /**
     * @param $e \Rzn\Library\EventManager\Event
     */
    public function registerAuthorize($password, $flg)
    {
	    if(!isset($this->flgUsed)){
		    ExampleTable::add([
			    "PASSWORD" => $password,
			    "SUCCESS" => ($flg===true)?:false,
			    "LOGIN" => $this->login
		    ]);
		    $this->flgUsed = true;
	    }
    }
    
    public function setLogin($login)
    {
	    $this->login = $login;
    }
    
    //Сброс флага сделан для тестов PHPUnit
    public function clearFlg()
    {
	    unset($this->flgUsed);
    }
        
    /**
     * Внедрение сервис локатора
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->sm = $serviceLocator;
    }

    /**
     * Возврат сервис локатора.
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->sm;
    }
}
