var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000
});


//Calcular edad segun la fecha de nacimiento
$(function(){
  $('#fecha').on('change', calcularEdad);
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
    $('#edad').val(edad);

    if(edad > 15){
        // aqui haces lo que quieras con la validacion de si es mayor a 15
      
    }else{

        $("#edad").val('');
        $("#fecha").val('');
        $("#msj").html('<small class="text-help" data-fv-validator="notEmpty" data-fv-for="identificacion" data-fv-result="INVALID" style="">Debe ser mayor a 15 años</small>');
    }
}

//abrir modal para el registro y reiniciar el formulario
$("#agregar").on('click', function(){
    $('#FormRegistro').trigger("reset");
    $("#ModalRegistro").modal('show');
})

//hace el llamado para cargar los estados
$("#pais").change(function(){
  var pais=$("#pais").val();

    cargarestado(pais);

});

//carga los estados segun el pais
function cargarestado(pais){

    $.get('/estados/'+pais, function(response){
        $("#estado").empty();
        cargarciudad(response.estados[0].id)
        $(response.estados).each(function(i, valor){ // indice, valor
          $("#estado").append('<option value="'+valor.id+'">'+valor.state_name+'</option>');
        })

    })

}

$("#estado").change(function(){
  var estado=$("#estado").val();

    cargarciudad(estado);

});


function cargarciudad(estado){

    $.get('/ciudad/'+estado, function(response){
        $("#ciudad").empty();
        $(response.ciudades).each(function(i, valor){ // indice, valor
          $("#ciudad").append('<option value="'+valor.id+'">'+valor.city_name+'</option>');
        })

    })
}


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
        console.log(response);
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

