<?php
    class Conexion {
        private $connect;

        public function __construct(){
            $connectionString = "mysql:host=".DB_HOST.";dbname=".DB.";charset=".DB_CHARSET;
            try{
                $this->connect = new PDO($connectionString, DB_USER,DB_PASSW);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function conectar(){
            return $this->connect;
        }
    }
?>