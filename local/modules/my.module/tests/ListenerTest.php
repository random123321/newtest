<?php

namespace MyModule\Tests;
use Rzn\Library\Registry;
use Bitrix\Main\Loader;
use PHPUnit_Framework_TestCase;

class ListenerTest extends PHPUnit_Framework_TestCase
{
    protected $backupGlobals = false;

	public function testAuthFailure()
    {
	    global $USER;
	    $arCurID = \MyModule\ExampleTable::getList(array(
		     'select' =>array('ID'),
		     'order' => array('ID' =>'DESC'),
			 'limit' => 1
		))->Fetch();
		$arCurID["ID"]++;
		
		$res = $USER->Login("test", "randompass");
		$USER->Logout();
		$arSuccess = \MyModule\ExampleTable::getById($arCurID["ID"])->Fetch();
		$this->assertTrue((isset($arSuccess["SUCCESS"])&&($arSuccess["SUCCESS"]==false)),'Success false is wrong');
		
    }
    
    public function testAuthSuccess()
    {
	    global $USER;
	    \Bitrix\Main\Loader::includeModule('my.module');
	    $arCurID = \MyModule\ExampleTable::getList(array(
		     'select' =>array('ID'),
		     'order' => array('ID' =>'DESC'),
			 'limit' => 1
		))->Fetch();
		$arCurID["ID"]++;
		$USER->Login("gosha", "gosha123");
		$USER->Logout();
		$arSuccess = \MyModule\ExampleTable::getById($arCurID["ID"])->Fetch();
		$this->assertTrue(($arSuccess["SUCCESS"]==true),'Success true is wrong');
		
		
    }
    
    
    
}