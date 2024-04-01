<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>    
</head>
<body>
    <!--Requerir el header utilizado en el sistema-->
    <?php
        require_once('views/header.php');
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 mt-4">
                <h1 class="text-center text-primary">Bienvenid@ <?=$_SESSION['usuario']?></h1>
                <img src="<?=URL?>public/img/fondo.jpg" class="mx-auto img-fluid d-block mt-4">
            </div>
        </div>
    </div>

    <!--Requerir el footer utilizado en el sistema-->
    <?php
        require_once('views/footer.php')
    ?>
</body>
</html>