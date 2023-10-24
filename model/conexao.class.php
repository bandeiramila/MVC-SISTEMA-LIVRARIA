<?php 
    class Conexao{
        public static $instance;

        public static function getInstance(){
            try{
                self::$instance = new PDO('mysql:host=localhost;dbname=sistema_livraria','root','');
                self::$instance -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return self::$instance;
            }catch(Exception $e){
                echo "Erro ao conectar Banco de Dados: ".$e->getMessage();
            }
        }
    }


?>