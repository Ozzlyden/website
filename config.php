<?php

    session_start(); // Iniciando o $_SESSION

    // CLASS PARA DAR IMPORT NAS BIBLIOTECAS
    $autoload = function($class){
        if ($class == 'Email'){
            require_once('classes/phpmailer/vendor/autoload.php');  // chama o arquivo somente uma vez
        }
        if($class == 'Carbon'){
            include('classes/carbon/vendor/autoload.php');
        }
        if($class == 'Correios'){
            include('classes/correios/vendor/autoload.php');
        }

        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    // DEFINIR CAMINHOS "CONSTANTES"
    define('INCLUDE_PATH', 'http://localhost/web_site/');
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
    // Conectar MySql
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE','bd_website');
?>