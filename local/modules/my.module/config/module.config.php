<?
	return array(
    'service_manager' => [
        'invokables' => [
            'fatModel' => [
                'name'=> 'MyModule\fatModel',
                
                'shared'=> true
			],
		]
    ],
    'bitrix_events' => [
        'main' => [
            'OnAfterUserLogin' => [
                'invokables' => [
                    'ListenerAutorize' => [
                        'name' => 'MyModule\ListenerAutorize',
                    ]
                ]
            ],
            'OnUserLogin' => [
                'invokables' => [
                    'ListenerAutorize' => [
                        'name' => 'MyModule\ListenerAutorize',
                    ]
                ]
            ],
        ]
	]
);