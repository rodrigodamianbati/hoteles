/*var checked = []
$("input[name='fotos_borrar']:checked").each(function (){
    checked.push(parseInt($(this).val()));
});

$.ajax({
    type: "POST",
    url: "alojamiento/modificar_galeria",
    data: { chequeados: checked },
    success: function() {
        console.log("anduvo!");
    }
 });*/
 /*
if( $(".fotos_borrar").prop("checked") ) {
    alert('Seleccionado');
}
//$('input[name=fotos_borrar]')
$(".fotos_borrar").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }
});
*/
var id_alojamiento;
var checked = [];
$( document ).ready(function() {
id_alojamiento = parseInt($("#id_alojamiento").attr('value'));
console.log(id_alojamiento);
if( $('input[name=fotos_borrar]').prop("checked") ) {
    alert('Seleccionado');
}
//$('input[name=fotos_borrar]')
$('input[name=fotos_borrar]').on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
        checked.push(parseInt($(this).val()));
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
        checked.pop(parseInt($(this).val()));
    }
});


});

function sumetear() {
    console.log(id_alojamiento);
    $.ajax({
        type: "POST",
        url: "modificar_galeria",
        data: { chequeados: checked, id_alojamiento: id_alojamiento },
        success: function(response) {
            console.log("algo");
            console.log(response);
            location.reload();
        }
     });
}