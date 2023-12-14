$(document).ready(function() {
    $('#DTadmins').DataTable();


    $('.btn-eliminar').on('click', function() {
        var idAdmin = $(this).data('id-admin');

  
        $.ajax({
            type: 'POST',
            url: '/PHP/tables.php',
            data: { action: 'eliminar', id: idAdmin },
            success: function(response) {
                console.log('Administrador eliminado con éxito');
            
                location.reload();
            },
            error: function(error) {
                console.log(idAdmin)
                console.error('Error al eliminar el administrador', error);
            }
        });
    });
});