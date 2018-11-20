var checked = []
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
 });
/*
$('#myCheckbox').click(function() {
    var checked = $(this).is(':checked');

    $.ajax({
        type: "POST",
        url: myUrl,
        data: { checked : checked },
        success: function(data) {
            alert('it worked');
        },
        error: function() {
            alert('it broke');
        },
        complete: function() {
            alert('it completed');
        }
    });
});
*/