<?php
    class Painel{

        public static function logado(){
            // VERIFICACAO DE LOGIN
            return isset($_SESSION['login']) ? true : false;   // $_SESSION armazena dados no navegador do usuario
        }

        public static function loggout(){
            // VERFICACAO DE LOGGOUT
            session_destroy(); // Destruir os dados da sessao
            header('Location: '.INCLUDE_PATH_PAINEL);
        } 

    }
?>