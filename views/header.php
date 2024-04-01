    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="<?=URL?>public/js/validetta.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- chartphp -->
    <link rel="stylesheet" href="<?=URL?>public/chartphp/js/chartphp.css">
    <script src="<?=URL?>public/chartphp/js/chartphp.js"></script>

    <!--VISUALIZACIÓN DEL HEADER UTILIZADO EN EL SISTEMA-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            VISIUS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-nav ml-auto"> 


            <a class="nav-link" href="<?=URL?>inicio/home">Inicio</a>
            <?php
                if($_SESSION['rol']=='administrador'){
            ?>
            <a class="nav-link" href="<?=URL?>usuario/index">Usuarios</a>
            <a class="nav-link" href="<?=URL?>empleado/index">Empleados</a>
            <?php
                }
            ?>
            <?php
                if($_SESSION['rol']=='supervisor'){
            ?>
              <a class="nav-link" href="<?=URL?>tarea/index">Tareas</a> 
              <a class="nav-link" href="<?=URL?>informe/reporteEmpleados">Reporte de Empleados por Area</a>
              <a class="nav-link" href="<?=URL?>informe/reporteTareas">Reporte de Tareas por Empleado</a>
              <a class="nav-link" href="<?=URL?>informe/reporteEstados">Reporte de Estados por Area</a>
              
            <?php
                }
            ?>

            <?php
                if($_SESSION['rol']=='empleado'){
            ?>
            <a class="nav-link" href="<?=URL?>informe/reporteTareasEmpleado">Mis tareas</a> 
            <?php
                }
            ?>
            
            <?php
                if($_SESSION['rol']=='administrador'){
            ?>
                <a class="nav-link" href="<?=URL?>grafico/anillo">Gráfico #1</a>
                <a class="nav-link" href="<?=URL?>grafico/anillo2">Gráfico #2</a>
            <?php
                }
            ?>

            <a class="nav-link" href="<?=URL?>inicio/logout">Salir</a> 
            </div>
        </div>
    </nav>

