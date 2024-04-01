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
            <a href="<?=URL?>empleado/agregar" class="btn btn-block btn-primary mt-3">Agregar empleado</a>   
            <?php
                }
            ?>
    
            <h2 class="text-center p-3 text-primary">EMPLEADOS <?=$_SESSION['usuario']?></h2> 
            <table class="table table-hover" id="productos">
                <thead class="thead-dark text-white text-center">
                    <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Area de Empleado</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        /*Se manda a llamar la información almacenada en la variable productos, y ser mostrado en la tabla*/
                        $empleados = $this->empleados;
                        /*Recorrido de toda la información que trae desde base de datos, por medio de la variable*/
                        for ($i=0; $i < count($empleados) ; $i++) { 
                            $urlModificar = URL.'empleado/modificar?codigo='.$empleados[$i]['codigo'];
                            $urlEliminar = URL.'empleado/eliminar?codigo='.$empleados[$i]['codigo'];
                            /*Dibujar la tabla en la página*/
                            echo '
                            <tr>
                            <td>'.$empleados[$i]['codigo'].'</td>
                            <td>'.$empleados[$i]['nombre'].'</td>
                            <td>'.$empleados[$i]['areaEmp'].'</td>
                            <td>'.$empleados[$i]['edad'].'</td>
                            <td>
                                <div class="btn-group btn-group-sm">';

                                    if($_SESSION['rol']==0){
                                        echo '<a href="'.$urlEliminar.'" type="button" class="btn btn-danger" id="btnEliminar">Eliminar</a>';
                                    }
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=URL?>public/js/empleados.js"></script>
</body>
</html>

