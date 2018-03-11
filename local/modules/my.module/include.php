<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses('my.module', array(
    'MyModule\ExampleTable' => 'lib/ExampleTable.php',
    'MyModule\ListenerAutorize' => 'lib/ListenerAutorize.php',
    'MyModule\fatModel' => 'lib/fatModel.php',
));
