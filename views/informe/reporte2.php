<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de empleados por</title>    
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
                    <form action="<?=URL?>informe/reporteEmpleados" method="POST" target="_blank">                
                        Empleados por area
                        <select class="form-control" name="txtCodigo">  
                            <?php
                                /*Variable para generar el nombre de la marca, por medio de su codigo*/
                                $areas = $this->areas;
                                for ($i=0; $i < count($areas); $i++) { 
                                    echo '<option value="'.$areas[$i]['codigo'].'">'.
                                    $areas[$i]['nombre'].'</option> ';
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