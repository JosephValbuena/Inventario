<?php
    class Mysql extends Conexion{
        private $conexion;
        private $strQuery;
        private $arrValues;

        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        public function insert(string $query, array $arrValues){
            $this->strQuery = $query;
            $this->arrValues = $arrValues;

            $insert = $this->conexion->prepare($this->strQuery);
            $resInsert = $insert->execute($this->arrValues);
            if($resInsert){
                $lastInsert = $this->conexion->lastInsertId();
            }else{
                $lastInsert = 0;
            }

            return $lastInsert;
        }

        public function select(string $query){
            $this->strQuery = $query;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        public function select_all(string $query){
            $this->strQuery = $query;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function update(string $query, array $arrValues){
            $this->strQuery = $query;
            $this->arrValues = $arrValues;

            $update = $this->conexion->prepare($this->strQuery);
            $resExc = $update->execute($this->arrValues);
            return $resExc;
        }

        public function delete(string $query){
            $this->strQuery = $query;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();
            return $result;
        }
    }
?>