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
            <?php
                if($_SESSION['rol']==0){
            ?>

            <!--BOTÓN AGREGAR DEL SISTEMA-->
            <a href="<?=URL?>usuario/agregar" class="btn btn-block btn-primary mt-3">Agregar Usuario</a>   
            <?php
                }
            ?>
    
            <h2 class="text-center p-3 text-primary">USUARIOS <?=$_SESSION['usuario']?></h2> 
            <table class="table table-hover" id="usuario">
                <thead class="thead-dark text-white text-center">
                    <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        /*Se manda a llamar la información almacenada en la variable productos, y ser mostrado en la tabla*/
                        $usuario= $this->usuario;
                        /*Recorrido de toda la información que trae desde base de datos, por medio de la variable*/
                        for ($i=0; $i < count($usuario) ; $i++) { 
                            $urlModificar = URL.'usuario/modificar?usuario='.$usuario[$i]['usuario'];
                            $urlEliminar = URL.'usuario/eliminar?usuario='.$usuario[$i]['usuario'];
                            /*Dibujar la tabla en la página*/
                            echo '
                            <tr>
                            <td>'.$usuario[$i]['usuario'].'</td>
                            <td>'.$usuario[$i]['contrasena'].'</td>
                            <td>'.$usuario[$i]['rol'].'</td>
                            <td>
                                <div class="btn-group btn-group-sm">';
   
                                        echo '<a href="'.$urlEliminar.'" type="button" class="btn btn-danger" id="btnEliminar">Eliminar</a>';
                                    
                                        echo '<a href="'.$urlModificar.'" type="button" class="btn btn-dark">Modificar</a>      
                                </div>
                            </td>
                        </tr>';
                        }
                    ?>
                </tbody>
            </table> 
        </div>
    </div>
</div> 
    
    <!--Requerir el footer utilizado en el sistema-->
    <?php
        require_once('views/footer.php')
    ?>

    <script src="<?=URL?>public/js/usuario.js"></script>
</body>
</html>