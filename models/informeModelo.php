<?php
	class InformeModelo extends Model{
		public function __construct(){
			parent::__construct();
		}

		/*public function reporteMarcas(){
			$sql = "SELECT *  FROM marca";
            $db = $this->getDb()->conectar();
            $stmt = $db->query($sql);
            while($fila = $stmt->fetch_array()){
                $arreglo[] = $fila;
            }

            return $arreglo;
		}*/

		
		// Empleados por áreas.

		public function reporteEmpleados($codigo){
			$sql = "SELECT em.codigo as codigoEmpleado, em.nombre as nombreEmpleado, edad, a.nombre as nombreArea  FROM empleado em 
			INNER JOIN area a ON a.codigo=em.areaEmp 
			WHERE a.codigo = ".$codigo;

            $db = $this->getDb()->conectar();
            $stmt = $db->query($sql);
            while($fila = $stmt->fetch_array()){
                $arreglo[] = $fila;
            }

            return $arreglo;
		}


		//Tareas asignadas por empleado

		public function reporteTareas($codigoIn){
			
			$sql = "SELECT t.codigo, t.nombreTarea, t.descripcion, e.nombre as fk_empleadoEncargado
			FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado
			WHERE e.codigo =".$codigoIn;

            $db = $this->getDb()->conectar();
            $stmt = $db->query($sql);
            while($fila = $stmt->fetch_array()){
                $arreglo[] = $fila;
            }

            return $arreglo;
		}

		public function reporteTareasEmpleado($nombreEmpleado)
		{
			$sql = "SELECT t.codigo, t.nombreTarea, t.descripcion, s.nombre as estado , e.nombre as fk_empleadoEncargado
			FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado INNER JOIN estado s ON s.codigo=t.fk_estado
			WHERE e.nombre = '$nombreEmpleado'";
            $db = $this->getDb()->conectar();
            $stmt = $db->query($sql);

            while($fila = $stmt->fetch_array()){
                $arreglo[] = $fila;
            }

            return $arreglo;
		}

		//Estado de todas las tareas por área.
		public function reporteEstados($codigoE){
			$sql = "SELECT t.codigo, t.nombreTarea, t.descripcion, s.nombre as estado , e.nombre as fk_empleadoEncargado, a.nombre as areaTrabajo
			FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado INNER JOIN estado s ON s.codigo=t.fk_estado INNER JOIN area a ON a.codigo =areaEmp
			WHERE a.codigo = ".$codigoE;

            $db = $this->getDb()->conectar();
            $stmt = $db->query($sql);
            while($fila = $stmt->fetch_array()){
                $arreglo[] = $fila;
            }

            return $arreglo;
		}


	}

?>