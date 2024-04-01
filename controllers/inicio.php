<?php
    class Inicio extends Controller{
        public function __construct(){
            /*Se invoca el constructor de la clase padre "controller" de la carpeta core*/
            parent::__construct();
        }

        public function home(){
            /*Ubicación de la página que se quiere mostrar como página principal la vista de carpeta views*/
            $pagina = 'inicio/home';

            /*Invocar una página de prefencia para mostrarla como principal, por medio de la instrucción*/
            $this->getView()->loadView($pagina);
        }


        public function login(){
            if(!empty($_POST)){
                $this->getModel()->setUsuario($_POST['txtUsuario']);
                $this->getModel()->setContrasena($_POST['txtContrasena']);
                $rol = $this->getModel()->validarLogin();
                if(!empty($rol)){
                    //Variables de sesión
                    $_SESSION['usuario'] = $_POST['txtUsuario'];
                    $_SESSION['rol'] = $rol[0];
                    $this->home();
                }
            } else{
                $pagina = 'inicio/login';
                $this->getView()->loadView($pagina);
            }

        }

        public function logout(){
            session_destroy();
            $this->login();
        }
    }

?>