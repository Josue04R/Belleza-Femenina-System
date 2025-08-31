$(function() {
let variantes = @json($producto->variantes);

function cargarTallas(colorSeleccionado) {
    let opciones = '';
    let primeraVariante = null;

    variantes.forEach(v => {
        if (v.color === colorSeleccionado) {
            opciones += `<option value="${v.idVariante}">${v.talla.talla}</option>`;
            if (!primeraVariante) primeraVariante = v;
        }
    });

    $('#talla-select').html(opciones);

    if (primeraVariante) {
        actualizarInfoVariante(primeraVariante.idVariante);
    }
}

function actualizarInfoVariante(idVariante) {
    let variante = variantes.find(v => v.idVariante == idVariante);
    if (variante) {
        $('#color').text(variante.color);
        $('#stock').text(variante.stock);
        $('#id-variante').val(variante.idVariante);
        $('#precio').text(`$${parseFloat(variante.precio).toFixed(2)}`);

        // Actualizar imagen si tiene
        if (variante.imagen) {
            $('#producto-imagen').attr('src', variante.imagen);
        }

        let maxStock = variante.stock > 0 ? variante.stock : 1;
        $('#cantidad').attr('max', maxStock);
        if ($('#cantidad').val() > maxStock) $('#cantidad').val(maxStock);
        if ($('#cantidad').val() < 1) $('#cantidad').val(1);
    }
}

$('#color-select').on('change', function() {
    cargarTallas($(this).val());
});

$('#talla-select').on('change', function() {
    actualizarInfoVariante($(this).val());
});

// Inicializar
cargarTallas($('#color-select').val());
});