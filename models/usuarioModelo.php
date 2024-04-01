<?php
    /*Creación de la clase del archivo, con comunicación a la clase padre "Model" de carpeta "Core"*/
    class UsuarioModelo extends Model{
        /*Propiedades - Representación de los campos de la tabla*/
        private $usuario;
        private $contrasena;
        private $rol;


        

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


                /*Agregar a tabla los datos de tabla producto en BD*/
                public function listadoUsuario(){
                    $arreglo = [];
                    /*Codigo para extraer información/datos a base de datos*/
                    $sql = "SELECT usuario, contrasena, rol FROM usuario";
                    /*Cadena de conexión a Base de Datos*/
                    $db = $this->getDb()->conectar();
                    /*Lanzar sentencia SQL, para almacenar la información*/
                    $stmt = $db->query($sql);
                    /*Recorrer la información, en un arreglo, con base a lo que se almacena en la variable $fila*/
                    while($fila = $stmt->fetch_array()){
                        $arreglo[] = $fila;
                    }
        
                    return $arreglo;
                }

                public function listadoAreas(){
                    $sql = "SELECT *  FROM area";
                    $db = $this->getDb()->conectar();
                    $stmt = $db->query($sql);
                    while($fila = $stmt->fetch_array()){
                        $arreglo[] = $fila;
                    }
        
                    return $arreglo;
                }

                //INSERTAR ALGO A BASE DE DATOS
                public function insertarUsuario(){
                    $sql = "INSERT INTO usuario(usuario, contrasena, rol) VALUES(?,?,?)";
                    $db = $this->getDb()->conectar();
                    
                    $stmt = $db->prepare($sql);
                 
                    $stmt->bind_param('sss',$this->usuario, $this->contrasena, $this->rol);
                 
                    $stmt->execute();
        
                    return $stmt->affected_rows;
                }
        
                
        
                public function usuarioFiltrado(){
                    $sql = "SELECT * FROM usuario WHERE usuario=?";
                    $db = $this->getDb()->conectar();
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('s',$this->usuario);
                    $stmt->execute();
                    $result = $stmt->get_result();
        
                    return $result->fetch_array();
                }
        
                public function modificarUsuario(){
                    $sql = "UPDATE usuario SET contrasena=?, rol=? WHERE usuario=?";
                    $db = $this->getDb()->conectar();
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('sss', $this->contrasena, $this->rol, $this->usuario);
                    $stmt->execute();
        
                    return $stmt->affected_rows;
                }
        
        
        
                public function eliminarUsuario(){
                    $sql = "DELETE FROM usuario WHERE usuario=?";
                    $db = $this->getDb()->conectar();
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('s',$this->usuario);
                    $stmt->execute();
        
                    return $stmt->affected_rows;
                }
    }
?>