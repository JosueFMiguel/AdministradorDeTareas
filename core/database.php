<?php

    /*Establecer una Conexión a Base de Datos*/
    class Database{
        private $host;
        private $user;
        private $pass;
        private $db;

        /*Establecer los valores de las propiedades de clase "DataBase"*/
        public function __construct(){
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->db = 'dbvisius'; /*Nombre de base de datos*/
        }

        /*Conexión a base de datos*/
        public function conectar(){
            /*Creación de un objeto*/
            $con = new mysqli(
                $this->host,
                $this->user,
                $this->pass,
                $this->db
            );

            return $con;
        }
    }
?>