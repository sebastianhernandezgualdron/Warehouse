$(document).ready(function() {
    $('#DTTiendas').DataTable();


    $('.btn-eliminar').on('click', function() {
        var idAdmin = $(this).data('id-tienda');

  
        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id_tienda: idAdmin },
            success: function(response) {
                console.log('Tienda eliminada con éxito');
            
                location.reload();
            },
            error: function(error) {
                console.log(idAdmin)
                console.error('Error al eliminar la Tienda', error);
            }
        });
    });
});