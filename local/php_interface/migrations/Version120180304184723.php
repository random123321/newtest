<?php

namespace Sprint\Migration;




class Version120180304184723 extends Version {

    protected $description = "Миграция таблицы для my.module";

    public function up(){
        //$helper = new HelperManager();
        $this->outSuccess('Старт миграции. Все готово на %d%%', 1);
		//Можно создавать таблицу и без модуля, тогда необходимо подключать класс с представлением таблицы
		if(\Bitrix\Main\Loader::includeModule('my.module')){
			\MyModule\ExampleTable::getEntity()->createDbTable();
			$this->outSuccess('Все готово на %d%%', 100);
			return true;
		}else $this->outError("Модуль не подключен");
		return false;
		
		

    }

    public function down(){
        $helper = new HelperManager();
        
        if(\Bitrix\Main\Loader::includeModule('my.module')){
	        $connection = \Bitrix\Main\Application::getInstance()->getConnection();
	        $connection->dropTable(\MyModule\ExampleTable::getTableName());
	    }

    }

}
