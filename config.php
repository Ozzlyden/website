<?php

session_start(); // Iniciando o $_SESSION

date_default_timezone_set('America/Sao_Paulo'); 

// CLASS PARA DAR IMPORT NAS BIBLIOTECAS
$autoload = function ($class) {
    if ($class == 'Email') {
        require_once('classes/phpmailer/vendor/autoload.php');  // chama o arquivo somente uma vez
    }
    if ($class == 'Carbon') {
        include('classes/carbon/vendor/autoload.php');
    }
    if ($class == 'Correios') {
        include('classes/correios/vendor/autoload.php');
    }

    include('classes/' . $class . '.php');
};

spl_autoload_register($autoload);

// DEFINIR CAMINHOS "CONSTANTES"
define('INCLUDE_PATH', 'http://localhost/web_site/');
define('INCLUDE_PATH_PAINEL', INCLUDE_PATH . 'painel/');

// Conectar MySql (BD)
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'bd_website');

// FUNCOES 
function pegaCargo($cargo)
{
    $arr = [
        '0' => 'Normal',
        '1' => 'Sub Administrador',
        '2' => 'Administrador'
    ];

    return $arr[$cargo];
}
