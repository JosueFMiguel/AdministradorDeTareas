<?php
    class Empleado extends Controller{
        
        /*Se invoca el constructor de la clase padre "controller" de la carpeta core*/
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            /*Mostrar la información en views, por medio de la función "listadoProductos" creado en un modelo*/
            $this->getView()->empleados = $this->getModel()->listadoEmpleados();
            /*Ubicación de la página a mostrar en el sistema, por medio de la carpeta "views"*/
            $pagina = 'empleado/index';
            /*Mostrar vista de la carpeta "views"*/
            $this->getView()->loadView($pagina);
        }

        /*Función para agregar información a tabla producto*/
        public function agregar(){
            /*Validación*/
            if($_SESSION['rol']==0){
                /*Capturar la información que se ha ingresado - nuevo.php*/
                if(!empty($_POST)){
                    $this->getModel()->setNombre($_POST['txtNombre']);
                    $this->getModel()->setAreaEmp($_POST['sArea']);
                    $this->getModel()->setEdad($_POST['txtEdad']);
                    /*Mostrar lo insertado a tabla*/
                    echo $this->getModel()->insertarEmpleado();
                } else{
                    /*Variable "AREAS" que permite visualizar las marcas por su nombre*/
                    $this->getView()->areas = $this->getModel()->listadoAreas();
                    $pagina = 'empleado/nuevo';
                    $this->getView()->loadView($pagina);
                }
            } else {
                $this->index();
            }

        }

        
        public function modificar(){
            if(!empty($_POST)){                
                $this->getModel()->setCodigo($_POST['txtCodigo']);
                $this->getModel()->setNombre($_POST['txtNombre']);
                $this->getModel()->setAreaEmp($_POST['sArea']);
                $this->getModel()->setEdad($_POST['txtEdad']);

                echo $this->getModel()->modificarEmpleado();
            } else{                
                $codigo = $_GET['codigo'];
                $this->getModel()->setCodigo($codigo);
                $this->getView()->datos = $this->getModel()->empleadoFiltrado();
                $this->getView()->areas = $this->getModel()->listadoAreas();
    
                $pagina = 'empleado/modificar';
                $this->getView()->loadView($pagina);
            }

        }

        
        public function eliminar(){
            $codigo = $_GET['codigo'];
            echo $codigo;
            $this->getModel()->setCodigo($codigo);

            echo $this->getModel()->eliminarEmpleado();
        }
        
    }
?>