<?php
    class GraficoModelo extends Model{
        public function __construct(){
            parent::__construct(); 
        }

        public function graficoUno(){
            $sql = "SELECT a.nombre as area, count(em.codigo) as cantidad FROM empleado em 
            INNER JOIN area a
            ON  em.areaEmp = a.codigo
            GROUP BY a.codigo";

            $db = $this->getDb()->conectar();
            $stmt = $db->query($sql);
            while($fila = $stmt->fetch_array()){
                $arreglo[] = $fila;
            }

            return $arreglo;
        }

        public function graficoDos(){
            $sql = "SELECT nombre, COUNT(t.codigo) AS cantidad FROM empleado em 
            INNER JOIN tarea t
            ON em.codigo = t.fk_empleadoEncargado
            GROUP BY em.codigo";

            $db = $this->getDb()->conectar();
            $stmt = $db->query($sql);
            while($fila = $stmt->fetch_array()){
                $arreglo[] = $fila;
            }

            return $arreglo;
        }
    }
?>