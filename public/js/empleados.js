jQuery(function(){
    $('#frmEmpleado').validetta({
        realTime: true,
        onValid: function(e){
            e.preventDefault()
            Swal.fire({
                icon: 'question',
                title: '¿Desea enviar el formulario?',
                confirmButtonText: 'si',
                showDenyButton: true,
            }).then(function(boton){
                if(boton.isConfirmed){
                    var action = $('#frmEmpleado').attr('action')
                    var method = $('#frmEmpleado').attr('method')
                    $.ajax({
                        type: $('#frmEmpleado').attr('method'),
                        url: $('#frmEmpleado').attr('action'),
                        data: $('#frmEmpleado').serialize(),
                        success: function(response){
                           //console.log(response)
                        if(response>0){
                            alert('Empleado insertado')
                            $('#frmEmpleado')[0].reset()
                        }
                        }, 
                        error: function(){
                            Swal.fire('Error')
                        }
                    })
                }else if(boton.isDenied){
                    Swal.fire('Ingreso cancelado')
                }
            })
        }
    })


    //Modificar empleado
    $('#frmModificar').validetta({
        realTime: true,
        onValid: function(e){
            e.preventDefault()
            Swal.fire({
                icon: 'question',
                title: '¿Desea modificar el formulario?',
                confirmButtonText: 'si',
                showDenyButton: true,
            }).then(function(boton){
                if(boton.isConfirmed){
                    $.ajax({
                        type: $('#frmModificar').attr('method'),
                        url: $('#frmModificar').attr('action'),
                        data: $('#frmModificar').serialize(),
                        success: function(response){
                           //console.log(response)
                        if(response>0){                            
                            // $('#frmModificar')[0].reset()
                            alert('Empleado modificado')
                            window.location.href = 'http://localhost/Visius/empleado/index';
                        }
                        }, 
                        error: function(){
                            Swal.fire('Error')
                        }
                    })
                }else if(boton.isDenied){
                    Swal.fire('Modificación cancelada')
                }
            })
        }
    })


    $('body').on('click', '#btnEliminar', function(e){
        e.preventDefault()
        let button = $(this)
        Swal.fire({
            icon: 'question',
            title: '¡Desea eliminar el empleado?',
            confirmButtonText: 'si',
            showDenyButton: true,
        }).then(function(boton){
            if(boton.isConfirmed){
                var action = $(button).attr('href')
                $.ajax({
                    type: 'GET',
                    url: action,
                    success: function(response){
                        if(response>0){
                            alert('Empleado eliminado')
                            $(button).closest('tr').remove()
                            // window.location.href = 'http://localhost/Visius/empleado/index';
                        }
                    }, 
                    error: function(){
                        Swal.fire('Error')
                    }
                })
            }else if(boton.isDenied){
                Swal.fire('Eliminación cancelada')
                window.location.href = 'http://localhost/Visius/empleado/index';
            }
        })
    })
})
