<?php
    // CLASS PARA DAR IMPORT NAS BIBLIOTECAS

    $autoload = function($class){
        if ($class == 'Email'){
            require_once('classes/phpmailer/vendor/autoload.php');  // chama o arquivo somente uma vez
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