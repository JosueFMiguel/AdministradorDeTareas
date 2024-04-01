<?php
    class View{
        public function __construct(){
            
        }

        /*Requerimiento de varibale $pagina de la carpeta controllores, y su página inicio.php*/
        public function loadView($pagina){
            require_once('views/'.$pagina.'.php');
        }
    }
?>