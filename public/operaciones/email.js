var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000
});

//abrir modal para el registro y reiniciar el formulario
$("#agregar").on('click', function(){
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','none');
    $('#FormRegistro').trigger("reset");
    $("#ModalRegistro").modal('show');
})

//Nuevo Registro
$('#FormRegistro').formValidation({
  framework: "bootstrap4",
  button: {
    selector: '#agregar',
    disabled: 'disabled'
  },
  icon: null,
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
        url: "/email",
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
  $.get("/listado_email", function(response){
        
        var $contenido = $('.tabla-email');
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
        url: '/email/' + id,
        success: function(data) {

            $("#FormEditar input[name=editar_asunto]").val(data.emails.subject);
            $("#FormEditar input[name=editar_destinatario]").val(data.emails.recipient);
            $("#FormEditar input[name=codigo_editar]").val(data.emails.id);
            $(".mensaje").html(' <textarea class="form-control" id="editar_mensaje" name="editar_mensaje" rows="3">'+data.emails.message+'</textarea>');
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
        url: '/email/'+ codigo,
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
        url: '/email/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea Eliminar este email (" +data.emails.asunto+")?");
            $("#FormEliminar input[name=codigo]").val(data.emails.id);
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
        url: '/email/' + $("#FormEliminar input[name=codigo]").val(),
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



