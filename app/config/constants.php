<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const MAILER_AUTH = [
        'username' => 'super@vitalcare.sbs',
        'password' => 'c;6*CBlLMFFz',
        'host'     => 'vitalcare.sbs',
        'name'     => 'VitalCare',
        'replyTo'  => 'super@vitalcare.sbs',
        'replyToName' => 'VitalCare'
    ];


    const ITEXMO = [
        'key' => 'ST-MARKG387451_V6YZ8',
        'pwd' => '(7]8bu4]ja'
    ];

    #################################################
	##             EXTENDED APPS                   ##
	#################################################
	const APP_EXTENSIONS = [
		'cxbook' => [
			'base_controller' => 'Accounts',
			'base_method'     => 'index'
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

    define('TIME_SCHEDULE', '9:00AM - 6:30pm');
    define('WORK_DAYS', 'Sunday - Saturday');
    define('COMPANY_ADDRESS', '#438 P. Gomez St., Corner Paterno St. Quiapo Manila.');

    define('FILE_IMAGE_TYPES', ['png','jpg','jpeg','bitmap']);
?>