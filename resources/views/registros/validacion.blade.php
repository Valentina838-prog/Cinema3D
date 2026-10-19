<script>
    // Reglas de validación en el cliente compartidas por los formularios de registro y edición
    $.validator.addMethod('fechaPasada', function(valor, elemento) {
        return this.optional(elemento) || new Date(valor) < new Date();
    }, 'La fecha de nacimiento debe ser anterior a hoy.');

    $('#formularioBootstrap').validate({
        errorElement: 'div',
        errorClass: 'text-danger small',
        highlight: elemento => $(elemento).addClass('is-invalid'),
        unhighlight: elemento => $(elemento).removeClass('is-invalid'),
        rules: {
            nombres: {
                required: true,
                maxlength: 100
            },
            apellidos: {
                required: true,
                maxlength: 100
            },
            fecha_nacimiento: {
                required: true,
                date: true,
                fechaPasada: true
            },
            ninos: {
                required: true,
                digits: true,
                min: 0,
                max: 30
            }
        }
    });
</script>
