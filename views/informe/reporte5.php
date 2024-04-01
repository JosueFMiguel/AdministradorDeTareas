<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis tareas asignadas</title>    
</head>
<body>

    <?php
        require_once('views/header.php');
    ?>

    <div class="container">
        <div class="card mt-4 p-4">
                <div class="card-header bg-primary text-white">
                    <h5>Filtros</h5>
                </div>
                <div class="card-body">                    
                    <form action="<?=URL?>informe/reporteTareasEmpleado" method="POST" target="_blank">                
                        Escriba su nombre
                        <input type="text" class="form-control" name="txtEmpleado">
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