<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const MAILER_AUTH = [
        'username' => 'micaaestheticclinic@micaclinic.site',
        'password' => 'Aesthetic.001',
        'host'     => 'smtp.hostinger.com',
        'name'     => 'MICA Aesthetic Clinic',
        'replyTo'  => 'micaaestheticclinic@micaclinic.site',
        'replyToName' => 'MICA Aesthetic'
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
            'base_url' => 'y3y6dd.api.infobip.com'
        ]
    ];

    define('APP_EXTENSIONS_PATH' , APPROOT.DS.'softwares');

	#################################################
	##             SYSTEM CONFIG                ##
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');
    define('SITE_NAME' , 'vividoptic.online');
    define('COMPANY_NAME' , 'MICA AESTHETIC CLINIC');
    define('COMPANY_NAME_ABBR' , 'MICA AESTHETIC CLINIC');
    define('KEY_WORDS' , 'MICA AESTHETIC CLINIC');
    define('DESCRIPTION' , 'MICA AESTHETIC CLINIC');
    define('AUTHOR' , SITE_NAME);

    define('TIME_SCHEDULE', '');
    define('WORK_DAYS', 'Monday - Saturday');
    define('COMPANY_ADDRESS', '#0069 National Rd. Kalawaan Binangonan Rizal, Binangonan, Philippines.');
    define('COMPANY_EMAIL', 'micaaestheticclinic@micaclinic.site');
    define('COMPANY_CONTACT', '(+63) 995 322 5898 ');

    define('FILE_IMAGE_TYPES', ['png','jpg','jpeg','bitmap']);

    const USER_TYPES = [
        'ADMIN' => 'admin',
        'CUSTOMER' => 'customer',
        'STAFF' => 'staff',
        'DOCTOR' => 'doctor',
    ];

    const SCHEDULING = [
        'office_open' => '07:00 AM', 
        'office_close' => '08:00 PM',
        'max_customer_per_service_date_slot' => 20,
        'service_time_per_time_slot' => 2, // total service time every time slot if 2 will be 7:00AM - 9:00AM
        'max_customer_per_service_time_slot' => 1
    ];
?>