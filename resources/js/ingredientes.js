import './bootstrap';

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

$('#agregar-ingrediente').click(function() {
    var numeroIngredientes = $('#ingredientes-dinamicos .ingrediente').length;
    var nuevoIngrediente = $('#ingredientes-dinamicos .ingrediente:first').clone();
    nuevoIngrediente.find('select').attr('name', 'ingredientes[' + numeroIngredientes + '][id]');
    nuevoIngrediente.find('input').each(function() {
        var newName = $(this).attr('name').replace(/\d+/, numeroIngredientes);
        $(this).attr('name', newName).val('');
    });
    $('#ingredientes-dinamicos').append(nuevoIngrediente);
});




