jQuery(function(){
    
    $('#frmUsuario').validetta({
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
                    var action = $('#frmUsuario').attr('action')
                    var method = $('#frmUsuario').attr('method')
                    $.ajax({
                        type: $('#frmUsuario').attr('method'),
                        url: $('#frmUsuario').attr('action'),
                        data: $('#frmUsuario').serialize(),
                        success: function(response){
                           //console.log(response)
                        if(response>0){
                            alert('Usuario insertado')
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


   
    
    $('#frmUsuario1').validetta({
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
                        url: $('#frmUsuario1').attr('action'),
                        data: $('#frmUsuario1').serialize(),
                        success: function(response){
                           //console.log(response)
                        if(response>0){                            
                            // $('#frmModificar')[0].reset()
                            alert('Usuario modificado')
                            window.location.href = 'http://localhost/Visius/usuario/index';
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
            title: '¿Desea eliminar el usuario?',
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
                            alert('Usuario eliminado')
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
                window.location.href = 'http://localhost/Visius/usuario/index';
            }
        })
    })
})
