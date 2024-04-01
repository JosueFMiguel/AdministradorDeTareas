<?php
    class Tarea extends Controller{
        
        /*Se invoca el constructor de la clase padre "controller" de la carpeta core*/
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            /*Mostrar la información en views, por medio de la función "listadoProductos" creado en un modelo*/
            $this->getView()->tarea = $this->getModel()->listadoTareas();
            /*Ubicación de la página a mostrar en el sistema, por medio de la carpeta "views"*/
            $pagina = 'tarea/index';
            /*Mostrar vista de la carpeta "views"*/
            $this->getView()->loadView($pagina);
        }

        /*Función para agregar información a tabla producto*/
        public function agregar(){
            /*Validación*/
            if($_SESSION['rol']==0){
                /*Capturar la información que se ha ingresado - nuevo.php*/
                if(!empty($_POST)){
                    $this->getModel()->setNombreTarea($_POST['txtNombre']);
                    $this->getModel()->setDescripcion($_POST['txtDescripcion']);
                    $this->getModel()->setFechaInicio($_POST['txtFechaIni']);
                    $this->getModel()->setFechaFinal($_POST['txtFechaFinal']);
                    $this->getModel()->setEstado($_POST['sEstado']);
                    $this->getModel()->setEmpleadoEncargado($_POST['sEncargado']);
                    
                    /*Mostrar lo insertado a tabla*/
                    echo $this->getModel()->insertarTarea();
                } else{
                    /*Variable "MARCAS" que permite visualizar las marcas por su nombre*/
                    $this->getView()->estado = $this->getModel()->listadoEstado();
                    $this->getView()->encargado = $this->getModel()->listadoEncargado();
                    $pagina = 'tarea/nuevo';
                    $this->getView()->loadView($pagina);
                }
            } else {
                $this->index();
            }

        }

        
        public function modificar(){
            if(!empty($_POST)){
                $this->getModel()->setCodigo($_POST['txtCodigo']);
                $this->getModel()->setNombreTarea($_POST['txtNombre']);
                $this->getModel()->setDescripcion($_POST['txtDescripcion']);
                $this->getModel()->setFechaInicio($_POST['txtFechaIni']);
                $this->getModel()->setFechaFinal($_POST['txtFechaFinal']);
                $this->getModel()->setEstado($_POST['sEstado']);
                $this->getModel()->setEmpleadoEncargado($_POST['sEncargado']);
            
            
                echo $this->getModel()->modificarTarea();
            } else{
                $codigo = $_GET['codigo'];
                $this->getModel()->setCodigo($codigo);

                $this->getView()->datos = $this->getModel()->tareaFiltrado(); 
                $this->getView()->estado = $this->getModel()->listadoEstado();
                $this->getView()->encargado = $this->getModel()->listadoEncargado();
    
                $pagina = 'tarea/modificar';
                $this->getView()->loadView($pagina);
            }

        }

        
        public function eliminar(){
            $codigo = $_GET['codigo'];
            $this->getModel()->setCodigo($codigo);

            echo $this->getModel()->eliminarTarea();
        }
        
    }
?>