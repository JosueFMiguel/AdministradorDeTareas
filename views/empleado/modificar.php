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
            <h2 class="text-center pt-3">Modificar Empleado</h2>  
            <form action="<?=URL?>empleado/modificar" method="POST" id="frmModificar">
                <?php
                    $empleados = $this->datos;
                    //print_r($productos);
                ?>
                Codigo
                <input type="text" class="form-control" name="txtCodigo" value="<?=$empleados[0]?>" readonly>
                Nombre
                <input type="text" class="form-control" name="txtNombre" value="<?=$empleados[1]?>" data-validetta="required">
                Area
                <select class="form-control" name="sArea" data-validetta="required">  
                    <?php
                        $areas = $this->areas;
                        for ($i=0; $i < count($areas); $i++) {
                            $selected = ($empleados[2]==$areas[$i]['codigo'])?'selected':''; 
                            echo '<option value="'.$areas[$i]['codigo'].'"'.$selected.'>'.
                            $areas[$i]['nombre'].'</option> ';
                        }
                    ?>                                         
                </select>
                Edad
                <input type="text" class="form-control" name="txtEdad" value="<?=$empleados[3]?>" data-validetta="required">
                <button class="btn btn-primary mt-2 btn-block btn-sm">Modificar</button>
            </form> 
        </div>
    </div>
</div>

    <?php
        require_once('views/footer.php')
    ?>

    <!-- <script src="<?=URL?>public/js/validetta.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="<?=URL?>public/js/empleados.js"></script>
</body>
</html>

<script>
    // jQuery(function(){
    //     $('#frmModificar').validetta({
    //         realTime: true
    //     })
    // })
</script>