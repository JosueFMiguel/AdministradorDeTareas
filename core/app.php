<?php
    class App{
        public function __construct(){
            $url = $_GET['url'];

            $arregloUrl = explode('/', $url);

            $controlador = empty($arregloUrl[0])?'inicio':$arregloUrl[0];

            $metodo = empty($arregloUrl[1])?'login':$arregloUrl[1];

            $urlcontrolador = 'controllers/'.$controlador.'.php';


            if(file_exists($urlcontrolador)){
                require_once($urlcontrolador);
                $controller = new $controlador();
                $urlModelo = 'models/'.$controlador.'Modelo.php';
                if(file_exists($urlModelo)){
                    require_once($urlModelo);
                    $modelo = $controlador.'Modelo';
                    $controller->loadModel($modelo);
                }
                if(method_exists($controller, $metodo)){
                    $controller->$metodo();
                }
            }
        }
    }
?>