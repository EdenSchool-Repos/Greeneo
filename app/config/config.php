<?php
    // Database Settings
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'greeneo');
    
    //define('DB_HOST', 'localhost');
    //define('DB_USER', 'root');
    //define('DB_PASS', '');
    //define('DB_NAME', 'MyDataBase');
    
    // APP ROOT
    define('APP_ROOT', dirname(dirname(__FILE__)));
    
    // URL ROOT
    if(strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false){
        define('URL_ROOT', 'http://'.$_SERVER['HTTP_HOST'].str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']));
    } else {
        define('URL_ROOT', 'https://'.$_SERVER['HTTP_HOST'].str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']));
    }
    //define('URL_ROOT', 'https://Greeneo.com');
    
    // Nom du site
    define('SITE_NAME', 'Greeneo');
    
	//Meta
    define('CARD_DESCRIPTION', 'Avec Greeneo, donnez de l&#39;eau au petits africains');
    define('CARD_IMAGE', 'https://');