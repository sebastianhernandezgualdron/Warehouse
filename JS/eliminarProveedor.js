$(document).ready(function() {
    $('#DTVenta').DataTable();


    $('.btn-eliminar').on('click', function() {
        var idAdmin = $(this).data('id-venta');

  
        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id_venta: idAdmin },
            success: function(response) {
                console.log('Proveedor eliminado con éxito');
            
                location.reload();
            },
            error: function(error) {
                console.log(idAdmin)
                console.error('Error al eliminar el Proveedor', error);
            }
        });
    });
});