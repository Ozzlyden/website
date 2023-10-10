<?php
    class MySql{

        private static $pdo;

        // CONECTAR COM MYSQL
        public static function conectar(){
			if(self::$pdo == null){
                 // Forma segura
				try{
				    self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				    self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //echo '<h2>Sucesso ao conectar</h2>';
				}catch(Exception $e){
					echo '<h2>Erro ao conectar</h2>';
				}
			}

			return self::$pdo;
		}
    }
?>