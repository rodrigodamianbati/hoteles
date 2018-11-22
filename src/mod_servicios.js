var checked_servicios = [];

$('input[name=servicios_agregar]').on( 'change', function() {
    if( $(this).is(':checked') ) {
       
        checked_servicios.push(parseInt($(this).val()));
        console.log(checked_servicios);
    } else {
        checked_servicios.pop(parseInt($(this).val()));
        console.log(checked_servicios);
    }
});

function sumetear_servicios() {
    var id = document.getElementById('id').value; 
    $.ajax({
        type: "POST",
        url: "agregar_servicios",
        data: { chequeados: checked_servicios , id_alojamiento: id},
        success: function() {
            location.reload();
        }
     });

}