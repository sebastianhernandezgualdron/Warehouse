$(document).ready(function() {
    $('#DTProductosT').DataTable();



    $('.btn-eliminar').on('click', function() {
        var idAdmin = $(this).data('id-productoEnTienda');

  
        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id_productoEnTienda: idAdmin },
            success: function(response) {
                console.log('Producto en tienda eliminado con éxito');
            
                location.reload();
            },
            error: function(error) {
                console.log(idAdmin)
                console.error('Error al eliminar el Producto en tienda', error);
            }
        });
    });
});