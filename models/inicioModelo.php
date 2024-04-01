<?php
    class InicioModelo extends Model{
        private $usuario;
        private $contrasena;
        private $rol;

        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Get the value of usuario
         */ 
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */ 
        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        /**
         * Get the value of contrasena
         */ 
        public function getContrasena()
        {
                return $this->contrasena;
        }

        /**
         * Set the value of contrasena
         *
         * @return  self
         */ 
        public function setContrasena($contrasena)
        {
                $this->contrasena = $contrasena;

                return $this;
        }

        /**
         * Get the value of rol
         */ 
        public function getRol()
        {
                return $this->rol;
        }

        /**
         * Set the value of rol
         *
         * @return  self
         */ 
        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }

        public function validarLogin(){
            $sql = "SELECT rol FROM usuario WHERE usuario=? AND contrasena=?";
            $db = $this->getDb()->conectar();
            $stmt = $db->prepare($sql);
            $stmt->bind_param('ss',$this->usuario, $this->contrasena);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_array();
        }
    }

?>