<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas asignadas por empleado</title>    
</head>
<body>

    <?php
        require_once('views/header.php');
        // echo "<pre>";
        // var_dump($this->areas);
        // echo "</pre>";
    ?>

    <div class="container">
        <div class="card mt-4 p-4">
                <div class="card-header bg-primary text-white">
                    <h5>Filtros</h5>
                </div>
                <div class="card-body">                    
                    <form action="<?=URL?>informe/reporteTareas" method="POST" target="_blank">                
                        Seleccione Empleado
                        <select class="form-control" name="txtEmpleadoIn">  
                        <?php
                        
                        $encargado = $this->encargado;
                        for ($i=0; $i < count($encargado); $i++) { 
                            echo '<option value="'.$encargado[$i]['codigo'].'">'.
                            $encargado[$i]['nombre'].'</option> ';
                        }
                    ?>                                            
                        </select>
                            
                        <div class="text-center">
                            <button class="btn btn-primary mt-3">Generar PDF</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    <?php
        require_once('views/footer.php')
    ?>
</body>
</html>