jQuery(function(){
    $('#frmTarea').validetta({
        realTime: true,
        onValid: function(e){
            e.preventDefault()
            Swal.fire({
                icon: 'question',
                title: '¿Desea crear la tarea?',
                confirmButtonText: 'si',
                showDenyButton: true,
            }).then(function(boton){
                if(boton.isConfirmed){
                    var action = $('#frmTarea').attr('action')
                    var method = $('#frmTarea').attr('method')
                    $.ajax({
                        type: $('#frmTarea').attr('method'),
                        url: $('#frmTarea').attr('action'),
                        data: $('#frmTarea').serialize(),
                        success: function(response){
                           //console.log(response)
                        if(response>0){
                            alert('Tarea insertada')
                            $('#frmTarea')[0].reset()
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

    //Modificar producto

    //Modificar empleado
    $('#frmModificar').validetta({
        realTime: true,
        onValid: function(e){
            e.preventDefault()
            Swal.fire({
                icon: 'question',
                title: '¿Desea modificar la tarea?',
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
                            alert('Tarea modificada')
                            window.location.href = 'http://localhost/Visius/tarea/index';
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
            title: '¿Desea eliminar la tarea?',
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
                            alert('Tarea eliminada')
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
                window.location.href = 'http://localhost/Visius/tarea/index';
            }
        })
    })
})

