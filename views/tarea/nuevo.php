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
            <h2 class="text-center pt-3">Nuevo Tarea</h2>  
            <form action="<?=URL?>tarea/agregar" method="POST" id="frmTarea">
                Nombre de tarea
                <input type="text" class="form-control" name="txtNombre" data-validetta="required">
                Descripcion
                <input type="text" class="form-control" name="txtDescripcion" data-validetta="required">
                Fecha de Inicio
                <input type="text" class="form-control" name="txtFechaIni" data-validetta="required" placeholder="Por ejemplo: 00-00-0000" required pattern="[0-9][0-9]-[0-9][0-9]-[0-9][0-9][0-9][0-9]">
                Fecha de Final
                <input type="text" class="form-control" name="txtFechaFinal" data-validetta="required" placeholder="Por ejemplo: 00-00-0000" required pattern="[0-9][0-9]-[0-9][0-9]-[0-9][0-9][0-9][0-9]">
                Estado
                <select class="form-control" name="sEstado" data-validetta="required">  
                    <?php
                        
                        $estado = $this->estado;
                        for ($i=0; $i < count($estado); $i++) { 
                            echo '<option value="'.$estado[$i]['codigo'].'">'.
                            $estado[$i]['nombre'].'</option> ';
                        }
                    ?>                                          
                </select>
                Empleado Encargado
                <select class="form-control" name="sEncargado" data-validetta="required">  
                    <?php
                        
                        $encargado = $this->encargado;
                        for ($i=0; $i < count($encargado); $i++) { 
                            echo '<option value="'.$encargado[$i]['codigo'].'">'.
                            $encargado[$i]['nombre'].'</option> ';
                        }
                    ?>                                          
                </select>
                <button class="btn btn-primary mt-2 btn-block btn-sm">Agregar</button>
            </form> 
        </div>
    </div>
</div>

    <?php
        require_once('views/footer.php')
    ?>


    <script src="<?=URL?>public/js/tarea.js"></script>
</body>
</html>

<script>
    jQuery(function(){
        $('#frmTarea').validetta({
            realTime: true
        })
    })
</script>