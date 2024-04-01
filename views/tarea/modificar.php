<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>    
    <link rel="stylesheet" href="<?=URL?>public/css/validetta.min.css">    
</head>
<body>

    <?php
        require_once('views/header.php');
    ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5 mt-4">            
            <h2 class="text-center pt-3">Modificar Tarea</h2>  
            <form action="<?=URL?>tarea/modificar" method="POST" id="frmModificar">
                <?php
                    $tarea = $this->datos;
                    //print_r($productos);
                ?>
                
                Codigo
                <input type="text" class="form-control" name="txtCodigo" value="<?=$tarea[0]?>" readonly>
                Nombre de tarea
                <input type="text" class="form-control" name="txtNombre" value="<?=$tarea[1]?>" data-validetta="required">
                Descripcion
                <input type="text" class="form-control" name="txtDescripcion" value="<?=$tarea[2]?>" data-validetta="required">
                Fecha de Inicio
                <input type="text" class="form-control" name="txtFechaIni" value="<?=$tarea[3]?>" data-validetta="required" required pattern="[0-9][0-9]-[0-9][0-9]-[0-9][0-9][0-9][0-9]">
                Fecha de Final
                <input type="text" class="form-control" name="txtFechaFinal" value="<?=$tarea[4]?>" data-validetta="required" required pattern="[0-9][0-9]-[0-9][0-9]-[0-9][0-9][0-9][0-9]">
                Estado
                <select class="form-control" name="sEstado" data-validetta="required">  
                    <?php
                        
                        $estado = $this->estado;
                        
                        for ($i=0; $i < count($estado); $i++) {
                            $selected = ($tarea[5]==$estado[$i]['codigo'])?'selected':''; 
                            echo '<option value="'.$estado[$i]['codigo'].'"'.$selected.'>'.
                            $estado[$i]['nombre'].'</option> ';
                        }
                    ?>                                          
                </select>
                Empleado Encargado
                <select class="form-control" name="sEncargado" data-validetta="required">  
                    <?php
                        
                        $encargado = $this->encargado;
                        
                        for ($i=0; $i < count($encargado); $i++) {
                            $selected = ($tarea[6]==$encargado[$i]['codigo'])?'selected':''; 
                            echo '<option value="'.$encargado[$i]['codigo'].'"'.$selected.'>'.
                            $encargado[$i]['nombre'].'</option> ';
                        }
                    ?>                                          
                </select>
                <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnModificar">Modificar</button>
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