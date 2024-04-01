<?php
    class Usuario extends Controller{
        
        /*Se invoca el constructor de la clase padre "controller" de la carpeta core*/
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            /*Mostrar la información en views, por medio de la función "listadoProductos" creado en un modelo*/
            $this->getView()->usuario = $this->getModel()->listadoUsuario();
            /*Ubicación de la página a mostrar en el sistema, por medio de la carpeta "views"*/
            $pagina = 'usuario/index';
            /*Mostrar vista de la carpeta "views"*/
            $this->getView()->loadView($pagina);
        }

        /*Función para agregar información a tabla producto*/
        public function agregar(){
            /*Validación*/
            if($_SESSION['rol']== 'administrador'){
                /*Capturar la información que se ha ingresado - nuevo.php*/
                if(!empty($_POST)){
                    $this->getModel()->setUsuario($_POST['txtNombre']);
                    $this->getModel()->setContrasena($_POST['txtContra']);
                    $this->getModel()->setRol($_POST['txtRol']);
                   
                    
                    echo $this->getModel()->insertarUsuario();
                } else{
                    /*Variable "MARCAS" que permite visualizar las marcas por su nombre*/
                    $this->getView()->areas = $this->getModel()->listadoAreas();
                    $pagina = 'usuario/nuevo';
                    $this->getView()->loadView($pagina);
                }
            } else {
                $this->index();
            }

        }

        
        public function modificar(){
            if(!empty($_POST)){

                $this->getModel()->setUsuario($_POST['txtNombre']);
                $this->getModel()->setContrasena($_POST['txtContra']);
                $this->getModel()->setRol($_POST['txtRol']);

                echo $this->getModel()->modificarUsuario();
            } else{
                $usuarios= $_GET['usuario'];
                $this->getModel()->setUsuario($usuarios);
                $this->getView()->datos = $this->getModel()->usuarioFiltrado();
                
    
                $pagina = 'usuario/modificar';
                $this->getView()->loadView($pagina);
            }

        }

        
        public function eliminar(){
            $usuario = $_GET['usuario'];
            $this->getModel()->setUsuario($usuario);

            echo $this->getModel()->eliminarUsuario();
        }
        
    }
?>