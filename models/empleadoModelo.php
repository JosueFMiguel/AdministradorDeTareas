<?php
    /*Creación de la clase del archivo, con comunicación a la clase padre "Model" de carpeta "Core"*/
    class EmpleadoModelo extends Model{
        /*Propiedades - Representación de los campos de la tabla*/
        private $codigo;
        private $areaEmp;
        private $edad;
        private $nombre;

        /*Incovar el constructor de la clase padre*/
        public function __construct()
        {
            parent:: __construct();
        }

        /**
         * Get the value of codigo
         */ 
        public function getCodigo()
        {
                return $this->codigo;
        }

        /**
         * Set the value of codigo
         *
         * @return  self
         */ 
        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of areaEmp
         */ 
        public function getAreaEmp()
        {
                return $this->areaEmp;
        }

        /**
         * Set the value of areaEmp
         *
         * @return  self
         */ 
        public function setAreaEmp($areaEmp)
        {
                $this->areaEmp = $areaEmp;

                return $this;
        }

        /**
         * Get the value of edad
         */ 
        public function getEdad()
        {
                return $this->edad;
        }

        /**
         * Set the value of edad
         *
         * @return  self
         */ 
        public function setEdad($edad)
        {
                $this->edad = $edad;

                return $this;
        }

                /*Agregar a tabla los datos de tabla producto en BD*/
                public function listadoEmpleados(){
                    $arreglo = [];
                    /*Codigo para extraer información/datos a base de datos*/
                    $sql = "SELECT e.codigo, e.nombre, e.edad, a.nombre as areaEmp
                    FROM empleado e INNER JOIN area a ON a.codigo=e.areaEmp";
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
        
                /*Función que permitirá ver nombre y codigo de tabla MARCA*/
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
                public function insertarEmpleado(){
                    $sql = "INSERT INTO empleado(nombre, areaEmp, edad) VALUES(?,?,?)";
                    $db = $this->getDb()->conectar();
                    /*Se ingresa la setencia $sql a un método prepare por la setencia preparada*/  
                    $stmt = $db->prepare($sql);
                    /*Establecer los valores del insert de la variable*/
                    $stmt->bind_param('sii',$this->nombre, $this->areaEmp, $this->edad);
                    /*Ejecución de la sentencia preparada*/
                    $stmt->execute();
        
                    return $stmt->affected_rows;
                }
        
                
        
                public function empleadoFiltrado(){
                    $sql = "SELECT * FROM empleado WHERE codigo=?";
                    $db = $this->getDb()->conectar();
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('i',$this->codigo);
                    $stmt->execute();
                    $result = $stmt->get_result();
        
                    return $result->fetch_array();
                }
        
                public function modificarEmpleado(){
                    $sql = "UPDATE empleado sET nombre=?, areaEmp=?, edad=? WHERE codigo=?";
                    $db = $this->getDb()->conectar();
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('sidi',$this->nombre, $this->areaEmp, $this->edad, $this->codigo);
                    $stmt->execute();
        
                    return $stmt->affected_rows;
                }
        
        
        
                public function eliminarEmpleado(){
                    $sql = "DELETE FROM empleado WHERE codigo=?";
                    $db = $this->getDb()->conectar();
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('i',$this->codigo);
                    $stmt->execute();
        
                    return $stmt->affected_rows;
                }
        
    }
?>