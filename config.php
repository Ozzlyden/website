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
define('BASE_DIR_PAINEL',__DIR__.'/painel');

// Conectar MySql (BD)
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'bd_website');

// FUNCOES 
function pegaCargo($indice){
    return Painel::$cargos[$indice];
}

// SELECIONAR ITEM NO MENU
function selecionadoMenu($par){
    //<i class="fa-solid fa-angles-right"></i>
    $url = explode ('/',@$_GET['url'])[0];
    if($url == $par){
        echo 'class="menu-active"';
    }
}

// SISTEMA DE PERMISSAO
function verificaPermissaoMenu($permissao){
    if($_SESSION['cargo'] >= $permissao){
        return;
    }else{
        echo 'style="display:none;"';
    }
}

function verificaPermissaoPagina($permissao){
    if($_SESSION['cargo'] >= $permissao){
        return;
    }else{
        include('painel/pages/permissao_negado.php');
        die();
    }
}

?>