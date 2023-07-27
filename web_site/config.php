<?php
    $autoload = function($class){
        if ($class == 'Email'){
            include('classes/phpmailer/PHPMailerAutoLoad.php');
        }
        if($class == 'carbon'){
            include('classes/carbon.php');
        }
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH', 'http://localhost/web_site/');

?>