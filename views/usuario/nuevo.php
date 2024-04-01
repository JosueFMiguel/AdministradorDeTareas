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
            <h2 class="text-center pt-3">Nuevo Usuario</h2>  
            <form action="<?=URL?>usuario/agregar" method="POST" id="frmUsuario">
                Usuario
                <input type="text" class="form-control" name="txtNombre" data-validetta="required">
                Contraseña
                <input type="text" class="form-control" name="txtContra" data-validetta="required">
                Rol para Sistema "administrador, supervisor, empleado"
                <input type="text" class="form-control" name="txtRol" data-validetta="required">
                
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
    <script src="<?=URL?>public/js/usuario.js"></script>
</body>
</html>

<script>
    jQuery(function(){
        $('#frmUsuario').validetta({
            realTime: true
        })
    })
</script>