<?php
/*Creación de la clase del archivo, con comunicación a la clase padre "Model" de carpeta "Core"*/
class TareaModelo extends Model
{
        /*Propiedades - Representación de los campos de la tabla*/
        private $codigo;
        private $nombreTarea;
        private $descripcion;
        private $fechaInicio;
        private $fechaFinal;
        private $estado;
        private $empleadoEncargado;

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
         * Get the value of nombreTarea
         */
        public function getNombreTarea()
        {
                return $this->nombreTarea;
        }

        /**
         * Set the value of nombreTarea
         *
         * @return  self
         */
        public function setNombreTarea($nombreTarea)
        {
                $this->nombreTarea = $nombreTarea;

                return $this;
        }

        /**
         * Get the value of descripcion
         */
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of fechaInicio
         */
        public function getFechaInicio()
        {
                return $this->fechaInicio;
        }

        /**
         * Set the value of fechaInicio
         *
         * @return  self
         */
        public function setFechaInicio($fechaInicio)
        {
                $this->fechaInicio = $fechaInicio;

                return $this;
        }

        /**
         * Get the value of fechaFinal
         */
        public function getFechaFinal()
        {
                return $this->fechaFinal;
        }

        /**
         * Set the value of fechaFinal
         *
         * @return  self
         */
        public function setFechaFinal($fechaFinal)
        {
                $this->fechaFinal = $fechaFinal;

                return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        /**
         * Get the value of empleadoEncargado
         */
        public function getEmpleadoEncargado()
        {
                return $this->empleadoEncargado;
        }

        /**
         * Set the value of empleadoEncargado
         *
         * @return  self
         */
        public function setEmpleadoEncargado($empleadoEncargado)
        {
                $this->empleadoEncargado = $empleadoEncargado;

                return $this;
        }



        /*Agregar a tabla los datos de tabla producto en BD*/
        public function listadoTareas()
        {
                $arreglo = [];
                /*Codigo para extraer información/datos a base de datos*/
                $sql = "SELECT t.codigo, t.nombreTarea, t.descripcion, t.fechaInicio, t.fechaFinal, s.nombre as estado , e.nombre as fk_empleadoEncargado
                    FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado 
                    INNER JOIN estado s ON s.codigo=t.fk_estado";
                /*Cadena de conexión a Base de Datos*/
                $db = $this->getDb()->conectar();
                /*Lanzar sentencia SQL, para almacenar la información*/
                $stmt = $db->query($sql);
                /*Recorrer la información, en un arreglo, con base a lo que se almacena en la variable $fila*/
                while ($fila = $stmt->fetch_array()) {
                        $arreglo[] = $fila;
                }

                return $arreglo;
        }

        /*Función que permitirá ver nombre y codigo de tabla MARCA*/
        public function listadoEstado()
        {
                $arreglo = [];
                $sql = "SELECT *  FROM estado";
                $db = $this->getDb()->conectar();
                $stmt = $db->query($sql);
                while ($fila = $stmt->fetch_array()) {
                        $arreglo[] = $fila;
                }

                return $arreglo;
        }

        public function listadoEncargado()
        {
                $arreglo = [];
                $sql = "SELECT *  FROM empleado";
                $db = $this->getDb()->conectar();
                $stmt = $db->query($sql);
                while ($fila = $stmt->fetch_array()) {
                        $arreglo[] = $fila;
                }

                return $arreglo;
        }

        //INSERTAR ALGO A BASE DE DATOS
        public function insertarTarea()
        {
                $sql = "INSERT INTO tarea(nombreTarea, descripcion, fechaInicio, fechaFinal, fk_estado, fk_empleadoEncargado) VALUES(?,?,?,?,?,?)";
                $db = $this->getDb()->conectar();

                $stmt = $db->prepare($sql);

                $stmt->bind_param('ssssii', $this->nombreTarea, $this->descripcion, $this->fechaInicio, $this->fechaFinal, $this->estado, $this->empleadoEncargado);

                $stmt->execute();

                return $stmt->affected_rows;
        }



        public function tareaFiltrado()
        {
                $sql = "SELECT * FROM tarea WHERE codigo=?";
                $db = $this->getDb()->conectar();
                $stmt = $db->prepare($sql);
                $stmt->bind_param('i', $this->codigo);
                $stmt->execute();
                $result = $stmt->get_result();

                return $result->fetch_array();
        }

        public function modificarTarea()
        {
                $sql = "UPDATE tarea SET nombreTarea=?, descripcion=?, fechaInicio=?, fechaFinal=?, fk_estado=?, fk_empleadoEncargado=? WHERE codigo=?";
                $db = $this->getDb()->conectar();
                $stmt = $db->prepare($sql);
                $stmt->bind_param('ssssiii', $this->nombreTarea, $this->descripcion, $this->fechaInicio, $this->fechaFinal, $this->estado, $this->empleadoEncargado, $this->codigo);
                $stmt->execute();

                return $stmt->affected_rows;
        }



        public function eliminarTarea()
        {
                $sql = "DELETE FROM tarea WHERE codigo=?";
                $db = $this->getDb()->conectar();
                $stmt = $db->prepare($sql);
                $stmt->bind_param('i', $this->codigo);
                $stmt->execute();

                return $stmt->affected_rows;
        }
}
