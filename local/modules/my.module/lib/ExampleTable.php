<?php
namespace MyModule;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\Entity\Validator;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class ExampleTable extends DataManager
{
    public static function getTableName()
    {
        return 'example_table';
    }

    public static function getMap()
    {
	    global $USER;
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('EVENT_ID'),
            ),
            
            'DATE' => array(
                'data_type' => 'datetime',
                'required' => true,
                'default_value' => new \Bitrix\Main\Type\DateTime(
                    null,
                    'Y-m-d H:i:s'
                ),
                'title' => Loc::getMessage('EVENT_DATE')
            ),
            
            'LOGIN' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('EVENT_LOGIN'),
            ),
            
            'USER_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'default_value' => (!is_object($USER) OR !$USER->IsAuthorized()) ? 0 : $USER->GetID(),
                'title' => Loc::getMessage('EVENT_USER_ID')
            ),
            
            'PASSWORD' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('EVENT_PASSWORD'),
            ),
            
            'SUCCESS' => array(
                'data_type' => 'boolean',
                'default_value' => false,
                'title' => Loc::getMessage('EVENT_SUCCESS'),            ),
        );
    }
}
