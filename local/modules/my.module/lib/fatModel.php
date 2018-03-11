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
	
	 /**
     * @param $e \Rzn\Library\EventManager\Event
     */
    public function registerAuthorize($password, $flg)
    {
	    if(!isset($this->flgUsed)){
		    ExampleTable::add([
			    "PASSWORD" => $password,
			    "SUCCESS" => ($flg===true)?:false
		    ]);
		    $this->flgUsed = true;
	    }
    }
    
    //Сброс флага сделан для тестов PHPUnit
    public function clearFlg()
    {
	    unset($this->flgUsed);
    }
    
    
    /**
    * Извлечение сервиса сессии для использовании внутри объекта класса.
    * @return \Rzn\Library\Session
    */
    protected function getSession()
    {
        $this->getServiceLocator()->get('session');
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
