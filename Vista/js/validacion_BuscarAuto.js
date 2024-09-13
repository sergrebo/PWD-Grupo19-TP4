$(document).ready(function () {

  /**
  * Retorna true si el campo value coincide con la expresión regular dada
  * @name $.validator.methods.patente
  * @type Boolean
  * @cat Plugins/Validate/Methods
  */
  $.validator.addMethod("patente", function (value, element, param) {
    // Expresión regular para validar el formato "ABC 123"
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
      NroDni, dniDuenio: {
        required: true,
        number: true,
        rangelength:[7,10]
      },
      Apellido:{
        required: true,
        soloLetras: true,
        rangelength:[1,50]
      },
      Nombre:{
        required: true,
        soloLetras: true,
        rangelength:[1,50]
      },
      fechaNac:{
        required: true,
        dateISO: true
      },
      Telefono:{
        requerid: true,
        number: true,
        rangelength: [1,20]
      },
      Domicilio:{
        required: true,
        rangelength: [1,200]
      },
      Marca: {
        required: true,
        rangelength: [1,50]
      },
      Modelo:{
        required: true,
        number: true,
        rangelength: [1,11]
      }
    },
    messages: {
      Patente:{
      required: 'Este campo es obligatorio.',
      patente: 'El valor ingresado no cumple el formato de una patente.'
    },
    NroDni:{
      required: 'Este campo es obligatorio.',
      number: 'Este campo debe ser numerico.',
      rangelength: 'Este campo tiene que tener entre 7 u 10 digitos.'
    },
    Apellido:{
      required: 'Este campo es obligatorio.',
      soloLetras: 'Este campo solo puede contener letras.',
      rangelength: 'Este campo tiene un max de 50 caracteres.'
    },
    Nombre:{
      required: 'Este campo es obligatorio.',
      soloLetras: 'Este campo solo puede contener letras.',
      rangelength: 'Este campo tiene un max de 50 caracteres.'
    },
    fechaNac:{
      required: 'Este campo es obligatorio.',
      dateISO: 'Este campo tiene que tener el formato YYYY-MM-DD'
    },
    Telefono:{
      required: 'Este campo es obligatorio.',
      number: 'Este campo debe ser numerico.',
      rangelength: 'Este campo tiene un max de 20 digitos.'
    },
    Domicilio:{
      required: 'Este campo es obligatorio.',
      rangelength: 'Este campo tiene un max de 200 digitos.'
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
  })
})