<?php
    class Grafico extends Controller{
        public function __construct(){
            parent::__construct();
        }

        public function anillo(){
            $grafica = new chartphp();
            //Diseño
            $grafica->chart_type = "donut";
            $grafica->color = ["blue", "purple"];
            $grafica->title = "Empleados por area";
            $grafica->theme = "dark";
            // $grafica->theme = "green";  Poner cualquier fondo a la gráfica en preferencia
            //Contenido
            $datos[] = $this->getModel()->graficoUno();
            $grafica->data = $datos;
            //Renderizar el gráfico
            $this->getView()->grafico = $grafica->render('c1');
            $pagina = 'graficos/anillo';
            $this->getView()->loadView($pagina);
        }

        public function anillo2(){
            $grafica = new chartphp();
            //Diseño
            $grafica->chart_type = "donut";
            $grafica->color = ["blue", "purple"];
            $grafica->title = "Número de tareas por empleado";
            $grafica->theme = "dark";
            // $grafica->theme = "green";  Poner cualquier fondo a la gráfica en preferencia
            //Contenido
            $datos[] = $this->getModel()->graficoDos();
            $grafica->data = $datos;
            //Renderizar el gráfico
            $this->getView()->grafico = $grafica->render('c1');
            $pagina = 'graficos/anillo';
            $this->getView()->loadView($pagina);
        }
    }
?>