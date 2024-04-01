<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?=URL?>public/css/validetta.min.css">        
</head>
<body>

    <?php
        require_once('views/header.php');
    ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5 mt-4">            
            <h2 class="text-center pt-3">Nuevo Empleado</h2>  
            <form action="<?=URL?>empleado/agregar" method="POST" id="frmEmpleado">
                Nombre
                <input type="text" class="form-control" name="txtNombre" data-validetta="required">
                Area de Empleado
                <select class="form-control" name="sArea" data-validetta="required">  
                    <?php
                        /*Variable para generar el nombre de la marca, por medio de su codigo*/
                        $areas = $this->areas;
                        for ($i=0; $i < count($areas); $i++) { 
                            echo '<option value="'.$areas[$i]['codigo'].'">'.
                            $areas[$i]['nombre'].'</option> ';
                        }
                    ?>                                          
                </select>
                Edad
                <input type="text" class="form-control" name="txtEdad" data-validetta="required">
                <button class="btn btn-primary mt-2 btn-block btn-sm">Agregar</button>
            </form> 
        </div>
    </div>
</div>

    <?php
        require_once('views/footer.php')
    ?>

    <script src="<?=URL?>public/js/validetta.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=URL?>public/js/empleados.js"></script>
</body>
</html>

<script>
    jQuery(function(){
        $('#frmEmpleado').validetta({
            realTime: true
        })
    })
</script>