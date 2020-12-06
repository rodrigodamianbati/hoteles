console.log("antes de la funcion");
$(".friend-drawer--onhover").on("click", function () {
    console.log("entro a la funcion");
    console.log(this.id);
    var chat = this.id;
    var base_url = window.location.origin;
    $( "#usuario-seleccionado" ).text($( "#usuario-nombre" ).text());
    $.ajax({
        type: "POST",
        url: base_url + "/hoteles/usuario/mensajes",
        data: {"id_chat":chat},
        //contentType: 'application/json',
        //dataType: 'text/json',
        success: function (response) {
            console.log("response bien");
            var mensajes = JSON.parse(response);
            console.log(mensajes);
            $(".chat-bubble").hide("slow").show("slow");
            $(".chat-bubble" ).remove();
            var id_sesion = mensajes.id_session;
            $.each(mensajes, function(clave, valor) {
                //console.log(clave);
                //console.log(valor.id_usuario_envia);
                //console.log(id_sesion);
                if (id_sesion == valor.id_usuario_envia) {
                    var elemento =  "<div class='row no-gutters'><div class='col-md-3'><div class='chat-bubble chat-bubble--left'>"+valor.texto+"</div></div></div>"
                 } else {
                    var elemento =  "<div class='row no-gutters'><div class='col-md-3 offset-md-9'><div class='chat-bubble chat-bubble--right'>"+valor.texto+"</div></div></div>"
                 }
                //$(".chat-bubble").hide("slow").show("slow");
                $( ".chat-panel" ).append( elemento );
                //console.log(valor.texto);
            });
            
            /*
            mensajes.each(function() {
                var elemento =  "<div class='row no-gutters'><div class='col-md-3'><div class='chat-bubble chat-bubble--left'>" + +"</div></div></div>";
            });*/
            //console.log(mensajes);
        }, 
        error: function(response){ 
            console.log("error");
            var mensajes = response;
            console.log(mensajes);
            /*
            $.each(mensajes, function(clave, valor) {
                console.log(clave);
                console.log(valor.texto);
            });*/
        }
    });
});
  
/*
$('.contact').click(function() {
    //console.log(this.id); //no imprime nada
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
});*/
  // Video tutorial/codealong here: https://youtu.be/fCpw5i_2IYU


  /*

<div class="row no-gutters">
          <div class="col-md-3">
            <div class="chat-bubble chat-bubble--left">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3 offset-md-9">
            <div class="chat-bubble chat-bubble--right">
              Hello dude!
            </div>
          </div>
        </div>


  */