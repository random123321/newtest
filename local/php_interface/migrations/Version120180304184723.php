<?php

namespace Sprint\Migration;




class Version120180304184723 extends Version {

    protected $description = "Миграция таблицы для my.module";

    public function up(){
	    
	    
	    try{
		    $connection = \Bitrix\Main\Application::getConnection();
		    $connection->query('
		    	CREATE TABLE IF NOT EXISTS `example_table` (
				  `ID` int(11) NOT NULL,
				  `DATE` datetime NOT NULL,
				  `LOGIN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `USER_ID` int(11) NOT NULL,
				  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `SUCCESS` varchar(1) COLLATE utf8_unicode_ci NOT NULL
				);
			');
	    } catch(\Bitrix\Main\DB\SqlException $e){
		    $this->outError("Ошибка: ".$e->getMessage());
		    return false;
	    }
	    $this->outSuccess('Таблица установлена');
	    return;
	    
    }

    public function down(){
      
        try{
		    $connection = \Bitrix\Main\Application::getConnection();
		    $connection->dropTable('example_table');
	    } catch(\Bitrix\Main\DB\SqlException $e){
		    $this->outError("Ошибка: ".$e->getMessage());
		    return false;
	    }
	    $this->outSuccess('Таблица удалена');
	    return;

    }

}

