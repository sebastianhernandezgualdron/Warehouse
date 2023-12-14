$(document).ready(function() {
    $('#DTProveedores').DataTable();



    $('.btn-eliminar').on('click', function() {
        var idAdmin = $(this).data('id-proveedor');

  
        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id_proveedor: idAdmin },
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