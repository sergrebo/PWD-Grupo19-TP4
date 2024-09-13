$(document).ready(function () {
  $.validator.addMethod("patente", function (value, element, param) {
    var regex = /^[a-zA-Z]{3} \d{3}$/;
    return this.optional(element) || regex.test(value);
  }, "El valor ingresado no cumple el formato de una patente.");

  $.validator.addMethod("soloLetras", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
  }, "El campo solo puede contener letras y espacios.");

  $('#formulario').validate({
    rules: {
      Patente: {
        required: true,
        patente: true
      },
      NroDni: {
        required: true,
        number: true,
        rangelength: [7, 10]
      },
      dniDuenio: {
        required: true,
        number: true,
        rangelength: [7, 10]
      },
      Apellido: {
        required: true,
        soloLetras: true,
        rangelength: [1, 50]
      },
      Nombre: {
        required: true,
        soloLetras: true,
        rangelength: [1, 50]
      },
      fechaNac: {
        required: true,
        dateISO: true
      },
      Telefono: {
        required: true,
        number: true,
        rangelength: [1, 20]
      },
      Domicilio: {
        required: true,
        rangelength: [1, 200]
      },
      Marca: {
        required: true,
        rangelength: [1, 50]
      },
      Modelo: {
        required: true,
        number: true,
        rangelength: [1, 11]
      }
    },
    messages: {
      Patente: {
        required: 'Este campo es obligatorio.',
        patente: 'El valor ingresado no cumple el formato de una patente.'
      },
      NroDni: {
        required: 'Este campo es obligatorio.',
        number: 'Este campo debe ser numérico.',
        rangelength: 'Este campo tiene que tener entre 7 y 10 dígitos.'
      },
      dniDuenio: {
        required: 'Este campo es obligatorio.',
        number: 'Este campo debe ser numérico.',
        rangelength: 'Este campo tiene que tener entre 7 y 10 dígitos.'
      },
      Apellido: {
        required: 'Este campo es obligatorio.',
        soloLetras: 'Este campo solo puede contener letras.',
        rangelength: 'Este campo tiene un máximo de 50 caracteres.'
      },
      Nombre: {
        required: 'Este campo es obligatorio.',
        soloLetras: 'Este campo solo puede contener letras.',
        rangelength: 'Este campo tiene un máximo de 50 caracteres.'
      },
      fechaNac: {
        required: 'Este campo es obligatorio.',
        dateISO: 'Este campo tiene que tener el formato YYYY-MM-DD.'
      },
      Telefono: {
        required: 'Este campo es obligatorio.',
        number: 'Este campo debe ser numérico.',
        rangelength: 'Este campo tiene un máximo de 20 dígitos.'
      },
      Domicilio: {
        required: 'Este campo es obligatorio.',
        rangelength: 'Este campo tiene un máximo de 200 caracteres.'
      }
    },
    errorElement: 'div',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element) {
      $(element).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: function (element) {
      $(element).addClass('is-valid').removeClass('is-invalid');
    },
    submitHandler: function (form) {
      form.submit();
    }
  });
});
