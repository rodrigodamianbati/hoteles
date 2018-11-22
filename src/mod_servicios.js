var checked = [];
if( $('input[name=servicios_agregar]').prop("checked") ) {
    alert('Seleccionado');
}

$('input[name=servicios_agregar]').on( 'change', function() {
    if( $(this).is(':checked') ) {
       
        checked.push(parseInt($(this).val()));
    } else {
        
        checked.pop(parseInt($(this).val()));
    }
});

function sumetear() {
    var id = document.getElementById('id').value; 
    $.ajax({
        type: "POST",
        url: "agregar_servicios",
        data: { chequeados: checked , id_alojamiento: id},
        success: function() {
            location.reload();
        }
     });

}