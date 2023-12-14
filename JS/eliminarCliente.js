$(document).ready(function() {
    $('#DTClientes').DataTable();


    $('.btn-eliminar').on('click', function() {
        var idAdmin = $(this).data('id-admin');

  
        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id_cliente: idAdmin },
            success: function(response) {
                console.log('Cliente eliminado con éxito');
            
                location.reload();
            },
            error: function(error) {
                console.log(idAdmin)
                console.error('Error al eliminar el Cliente', error);
            }
        });
    });
});