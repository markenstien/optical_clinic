<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const MAILER_AUTH = [
        'username' => 'main@vividoptical.online',
        'password' => '&GcK!Sbq[8N5',
        'host'     => 'vividoptical.online',
        'name'     => 'vividoptical',
        'replyTo'  => 'main@vividoptical.online',
        'replyToName' => 'vividoptical'
    ];


    const ITEXMO = [
        'key' => '#',
        'pwd' => '#'
    ];

    #################################################
	##             EXTENDED APPS                   ##
	#################################################
	const APP_EXTENSIONS = [
		'cxbook' => [
			'base_controller' => 'Accounts',
			'base_method'     => 'index'
        ],

        'open_sms' => [
            'key' => 'd71ea555aa41dfeee82ef9756dd1ebbc-c7f1c849-adfc-4db4-ad1c-7c0fef56e928',
        ]
    ];

    define('APP_EXTENSIONS_PATH' , APPROOT.DS.'softwares');

	#################################################
	##             SYSTEM CONFIG                ##
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');
    define('SITE_NAME' , 'vividoptic.online');
    define('COMPANY_NAME' , 'Vivid Motion Optical Clinic');
    define('COMPANY_NAME_ABBR' , 'VM Optical');
    define('KEY_WORDS' , 'VIVID MOTION OPTIC Eye Clinic');
    define('DESCRIPTION' , 'VIVID MOTION OPTIC Eye Clinic');
    define('AUTHOR' , SITE_NAME);

    define('TIME_SCHEDULE', '9am - 5pm');
    define('WORK_DAYS', 'Monday - Saturday');
    define('COMPANY_ADDRESS', '#438 P. Gomez St, Corner Paterno St. Quiapo Manila.');
    define('COMPANY_EMAIL', 'main@vividoptical.online');
    define('COMPANY_CONTACT', '09945510322 ');
    define('FILE_IMAGE_TYPES', ['png','jpg','jpeg','bitmap']);
?>