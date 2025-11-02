<?php
    define('SYSTEM_MODE' , $system['mode']);

    define('UI_THEME' , $ui['vendor']);

    define('APP_NAME' , $system['app_name']);


    define('DB_PREFIX' , 'hr_');

    switch(SYSTEM_MODE)
    {
        case 'local':
            define('URL' , 'http://dev.merimeri');
            define('DBVENDOR' , 'mysql');
            define('DBHOST' , 'localhost');
            define('DBUSER' , 'root');
            define('DBPASS' , '');
            define('DBNAME' , 'merimeri');

            define('BASECONTROLLER' , 'PagesController');
            define('BASEMETHOD' , 'index');
  
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        break;

        case 'dev':
            define('URL' , '');
            define('DBVENDOR' , '');
            define('DBHOST' , '');
            define('DBUSER' , '');
            define('DBPASS' , '');
            define('DBNAME' , '');

            define('BASECONTROLLER' , 'Pages');
            define('BASEMETHOD' , 'index');

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        break;

        case 'down':
            define('URL' , '');
            define('DBVENDOR' , '');
            define('DBHOST' , '');
            define('DBUSER' , '');
            define('DBPASS' , '');
            define('DBNAME' , '');

            define('BASECONTROLLER' , 'Maintenance');
            define('BASEMETHOD' , 'index');

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        break;

        case 'up':
            define('URL' , 'https://www.vividoptical.online');
            define('DBVENDOR' , 'mysql');
            define('DBHOST' , 'localhost');
            define('DBUSER' , 'u635751818_prod');
            define('DBPASS' , 'Aesthetic.001');
            define('DBNAME' , 'u635751818_prod');

            define('BASECONTROLLER' , 'PagesController');
            define('BASEMETHOD' , 'index');
        break;
    }
