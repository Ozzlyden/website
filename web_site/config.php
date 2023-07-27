<?php
    $autoload = function($class){
        if ($class == 'Email'){
            include('classes/phpmailer/PHPMailerAutoLoad.php');
        }
        if($class == 'Carbon'){
            include('carbon/vendor/autoload.php');
        }
        if($class == 'Correios'){
            include('correios/vendor/autoload.php');
        }

        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH', 'http://localhost/web_site/');

?>