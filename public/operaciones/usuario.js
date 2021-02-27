var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000
});


//Calcular edad segun la fecha de nacimiento
$(function(){
  $('.fecha').on('change', calcularEdad);
});
    
function calcularEdad() {

    fecha = $(this).val();
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    $('.edad').val(edad);

    if(edad > 15){
        // aqui haces lo que quieras con la validacion de si es mayor a 15
      
    }else{

        $(".edad").val('');
        $('.fecha').val('');
        $('.msj').html('<small class="text-help" data-fv-validator="notEmpty" data-fv-for="identificacion" data-fv-result="INVALID" style="">Debe ser mayor a 15 años</small>');
    }
}

//abrir modal para el registro y reiniciar el formulario
$("#agregar").on('click', function(){
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','none');
    $('#FormRegistro').trigger("reset");
    $("#ModalRegistro").modal('show');
})

//hace el llamado para cargar los estados
$('.pais').change(function(){
    
    var pais=$(this).val();
    cargarestado(pais);

});

//carga los estados segun el pais
function cargarestado(pais){

    $.get('/estados/'+pais, function(response){
        $(".estado").empty();
        cargarciudad(response.estados[0].id)
        $(response.estados).each(function(i, valor){ // indice, valor
          $(".estado").append('<option value="'+valor.id+'">'+valor.state_name+'</option>');
        })

    })

}

$(".estado").change(function(){
    var estado=$(this).val();

    cargarciudad(estado);

});


function cargarciudad(estado){

    $.get('/ciudad/'+estado, function(response){
        $(".ciudad").empty();
        $(response.ciudades).each(function(i, valor){ // indice, valor
          $(".ciudad").append('<option value="'+valor.id+'">'+valor.city_name+'</option>');
        })

    })
}


FormValidation.Validator.mayorEdad = {
    validate: function(validator, $field, options) {
        var value = $field.val();
        
       
        var fechanacimiento = moment(value, "DD-MM-YYYY");
      
        if(!fechanacimiento.isValid())
            return false;
      
        var years = moment().diff(fechanacimiento, 'years');
      
        return years > 15;
           
    }
};


//Nuevo Registro
$('#FormRegistro').formValidation({
  framework: "bootstrap4",
  button: {
    selector: '#agregar',
    disabled: 'disabled'
  },
  icon: null,
  fields: {
    clave: {
      validators: {
        notEmpty: {
          message: 'La Clave es requerida'
        },
        stringLength: {
          min: 8,
          message: 'La clave deben contener al menos 8 caracteres, '
        },
      }
    },
    identification: {
      validators: {
        notEmpty: {
          message: 'La Clave es requerida'
        },
        stringLength: {
          min: 11,
          max: 11,
          message: 'Deben contener 11 caracteres, '
        },
        numeric: {
            message: 'El Valor debe ser numerico',
            thousandsSeparator: '',
            decimalSeparator: '.'
        },
      }
    },
    telefono: {
      validators: {
        stringLength: {
          min: 8,
          max: 11,
          message: 'Deben contener minimo 8 y maximo 11 Digitos '
        },
        numeric: {
            message: 'El Valor debe ser numerico',
            // The default separators
            thousandsSeparator: '',
            decimalSeparator: '.'
        },
      }
    },
  },
  err: {
    clazz: 'text-help'
  },
  row: {
    invalid: 'has-danger'
  }
})
.on('success.form.fv', function(event) {
    event.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/usuario",
        type: "POST",
        data: $("#FormRegistro").serialize(),
        success:function(response){
            if (response) {

                    Toast.fire({
                       icon: 'success',
                       title: response.success
                    });

                    actualizar()
                    $("#ModalRegistro").modal('hide');
            }
        },
        error: function(response) {

            printErrorMsg(response.responseJSON.errors);

        }
    });
});

//muestra el mensaje de error de la validacion
function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}

//actualiza el listado de usuario una vez que registra
function actualizar(){
  $.get("/listado_usuario", function(response){
        
        var $contenido = $('.tabla-usuario');
        $contenido.html(response.html);

    })
}


//buscar en tiempo real por Nombre, apellido, documento identificación, email,teléfono
function myFunction(elemento){

    //toma las letras para buscar
    var texto = elemento.value;
    if((texto.length)>=1){
        fetch(`/buscador?texto=${texto}`,{ method:'get' })
        .then(response  =>  response.text() )
        .then(html      =>  {   

            var $contenido = $('.tabla-usuario');
            $contenido.html(html);  

        })
    }else{
        
        actualizar()
    }

}

function editar(id) {

    $.ajax({
        type: 'GET',
        url: '/usuario/' + id,
        success: function(data) {

            $("#FormEditar input[name=editar_nombres]").val(data.usuario.nombres);
            $("#FormEditar input[name=editar_apellidos]").val(data.usuario.apellidos);
            $("#FormEditar input[name=email]").val(data.usuario.email);
            $("#FormEditar input[name=editar_telefono]").val(data.usuario.telefono);
            $("#FormEditar input[name=identification]").val(data.usuario.identificacion);
            $("#FormEditar input[name=editar_fecha]").val(data.usuario.fecha);

            var hoy = new Date();
            var cumpleanos = new Date(data.usuario.fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }

            $("#FormEditar input[name=edad_editar]").val(edad);
            $("#editar_pais").append('<option value="'+data.usuario.codigo_pais+'" selected="selected">'+data.usuario.pais+'</option>');
            $("#editar_estado").append('<option value="'+data.usuario.estado_codigo+'" selected="selected">'+data.usuario.estado+'</option>');
            $("#editar_ciudad").append('<option value="'+data.usuario.codigo_ciudad+'" selected="selected">'+data.usuario.ciudad+'</option>');
            $("#FormEditar input[name=codigo_editar]").val(data.usuario.codigo);
            $('#ModalEditar').modal('show');
        }
    });
}


//editar localidad
$('#FormEditar').formValidation({
  framework: "bootstrap4",
  button: {
    selector: '#editar',
    disabled: 'disabled'
  },
  icon: null,
  fields: {
    identification: {
      validators: {
        notEmpty: {
          message: 'La Clave es requerida'
        },
        stringLength: {
          min: 11,
          max: 11,
          message: 'Deben contener 11 caracteres, '
        },
        numeric: {
            message: 'El Valor debe ser numerico',
            thousandsSeparator: '',
            decimalSeparator: '.'
        },
      }
    },
    editar_telefono: {
      validators: {
        stringLength: {
          min: 8,
          max: 11,
          message: 'Deben contener minimo 8 y maximo 11 Digitos '
        },
        numeric: {
            message: 'El Valor debe ser numerico',
            // The default separators
            thousandsSeparator: '',
            decimalSeparator: '.'
        },
      }
    },
  }, 
  err: {
    clazz: 'text-help'
  },
  row: {
    invalid: 'has-danger'
  }
})
.on('success.form.fv', function(e) {
    e.preventDefault();

    var codigo = $("#FormEditar input[name=codigo_editar]").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'PUT',
        url: '/usuario/'+ codigo,
        data: $("#FormEditar").serialize(),
        dataType: 'json',
        success:function(response){
            if (response) {

                Toast.fire({
                   icon: 'success',
                   title: response.success
                });

                actualizar()
                $("#ModalEditar").modal('hide');
            }
        },
        error: function(response) {

            printErrorMsg(response.responseJSON.errors);

        }
    });
}); 

//eliminar registro
function eliminar(id) {
    $.ajax({
        type: 'GET',
        url: '/usuario/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea Eliminar este usuario (" +data.usuario.nombres+" "+data.usuario.apellidos+")?");
            $("#FormEliminar input[name=codigo]").val(data.usuario.codigo);
            $('#ModalEliminar').modal('show');
        }
    });
}

$("#btn-eliminar").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: '/usuario/' + $("#FormEliminar input[name=codigo]").val(),
        dataType: 'json',
        success:function(response){
            if (response) {

                Toast.fire({
                   icon: 'success',
                   title: response.success
                });

                actualizar()
                $("#ModalEliminar").modal('hide');
            }
        },
        error: function(response) {

                Toast.fire({
                   icon: 'error',
                   title: 'Lo siento error inesperado.'
                });  

        }
    });
});



