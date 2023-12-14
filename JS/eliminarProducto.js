$(document).ready(function() {
    $('#DTProductos').DataTable();

    $('.btn-eliminar').on('click', function() {
        var idProducto = $(this).data('id-producto');

        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id_producto: idProducto }, 
            success: function(response) {
                console.log('Producto eliminado con éxito');
                location.reload();
            },
            error: function(error) {
                console.error('Error al eliminar el producto', error);
            }
        });
    });
});
