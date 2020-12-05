alert("toma mensajes javascript");
console.log("antes de la funcion");
$('.contact').click(function() {
    //console.log(this.id); //no imprime nada
    console.log("entro a la funcion");
    var chat = $(this).attr('id');
    console.log(chat);
    var base_url = window.location.origin;
    $.ajax({
        type: "POST",
        url: base_url + "usuario/mensajes",
        data: {id_chat:chat},
        dataType:'json',
        success: function (response) {
            var mensajes = response.data;
            console.log(mensajes);
        },
        error: function(){ alert('no anduvo'); }
    });
});