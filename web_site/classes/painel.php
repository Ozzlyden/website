<?php
    class Painel{

        public static function logado(){

            // Verificacao de login
            return isset($_SESSION['login']) ? true : false;   // $_SESSION armazena dados no navegador do usuario
        }

    }

?>