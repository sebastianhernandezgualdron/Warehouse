$(document).ready(function() {
    $('#DTCompras').DataTable();


    $('.btn-eliminar').on('click', function() {
        var idAdmin = $(this).data('id-compra');

  
        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id_compra: idAdmin },
            success: function(response) {
                console.log('Compra eliminado con éxito');
            
                location.reload();
            },
            error: function(error) {
                console.log(idAdmin)
                console.error('Error al eliminar la compra', error);
            }
        });
    });
});