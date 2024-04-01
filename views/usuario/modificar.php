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
            <h2 class="text-center pt-3">Modificar Usuario</h2>  
            <form action="<?=URL?>usuario/modificar" method="POST" id="frmUsuario1">
                <?php
                    $usuario = $this->datos;
                    //print_r($productos);
                ?>
                
                Nombre
                <input type="text" class="form-control" name="txtNombre" value="<?=$usuario[0]?>" readonly>
               
                Contraseña
                <input type="text" class="form-control" name="txtContra" value="<?=$usuario[1]?>" data-validetta="required">
                
                Rol de trabajo
                <input type="text" class="form-control" name="txtRol" value="<?=$usuario[2]?>" data-validetta="required">
                <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnModificar">Modificar</button>
            </form> 
        </div>
    </div>
</div>

    <?php
        require_once('views/footer.php')
    ?>

    <script src="<?=URL?>public/js/usuario.js"></script>
</body>
</html>