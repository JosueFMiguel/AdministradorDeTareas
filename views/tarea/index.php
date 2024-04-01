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
                if($_SESSION['rol']=='supervisor'){
            ?>

            <!--BOTÓN AGREGAR DEL SISTEMA-->
            <a href="<?=URL?>tarea/agregar" class="btn btn-block btn-primary mt-3">Agregar Tarea</a>   
            <?php
                }
            ?>
    
            <h2 class="text-center p-3 text-primary">TAREAS <?=$_SESSION['usuario']?></h2> 
            <table class="table table-hover" id="tarea">
                <thead class="thead-dark text-white text-center">
                    <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre de Tarea</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Finalización</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Empleado Encargado</th>
                    <?php
                        if($_SESSION['rol']=='supervisor'){
                    ?>
                    <th scope="col">Acciones</th>
                    <?php
                     }
                    ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
                       
                        $tarea = $this->tarea;
                        /*Recorrido de toda la información que trae desde base de datos, por medio de la variable*/
                        for ($i=0; $i < count($tarea) ; $i++) { 
                            $urlModificar = URL.'tarea/modificar?codigo='.$tarea[$i]['codigo'];
                            $urlEliminar = URL.'tarea/eliminar?codigo='.$tarea[$i]['codigo'];
                            /*Dibujar la tabla en la página*/
                            echo '
                            <tr>
                            <td>'.$tarea[$i]['codigo'].'</td>
                            <td>'.$tarea[$i]['nombreTarea'].'</td>
                            <td>'.$tarea[$i]['descripcion'].'</td>
                            <td>'.$tarea[$i]['fechaInicio'].'</td>
                            <td>'.$tarea[$i]['fechaFinal'].'</td>
                            <td>'.$tarea[$i]['estado'].'</td>
                            <td>'.$tarea[$i]['fk_empleadoEncargado'].'</td>
                            <td>
                                <div class="btn-group btn-group-sm">';

                                    if($_SESSION['rol']=='supervisor'){
                                        echo '<a href="'.$urlEliminar.'" type="button" class="btn btn-danger" id="btnEliminar">Eliminar</a>';
                                        echo '<a href="'.$urlModificar.'" type="button" class="btn btn-dark">Modificar</a>';



                                    }
                                              
                                '</div>
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

    <script src="<?=URL?>public/js/tarea.js"></script>
</body>
</html>