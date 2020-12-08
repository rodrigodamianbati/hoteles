$("#caja-chat").hide();
console.log("antes de la funcion");
var global_chat_id;
$(".friend-drawer--onhover").on("click", function () {
    console.log("entro a la funcion chat click");
    console.log(this.id);
    var chat = this.id;
    global_chat_id = chat;
    var base_url = window.location.origin;
    var id_usuario_nombre = "#usuario-nombre"+chat;
    //console.log("hola");
    //console.log("nombreusuario: "+id_usuario_nombre);
    $( "#usuario-seleccionado" ).text($( id_usuario_nombre ).text());
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
            $("#caja-chat").show();
            //borrarCaja(); <----------------PREGUNTAR ----------------------------
            //recargarCaja();
        }, 
        error: function(response){ 
            console.log("error");
            var mensajes = response;
            console.log(mensajes);
        }
    });
});

function borrarCaja(){
  if (document.contains($("#caja-chat"))){
    $("#caja-chat").remove();
  }
}

function recargarCaja(){
  var caja = "<div class='chat-box-tray'><i class='material-icons'>sentiment_very_satisfied</i><input type='text' placeholder='Escriba su mensaje acá...' id='mensaje'><i class='material-icons'>mic</i><i class='material-icons' id='enviar'>send</i></div>"
  $("#caja-chat").append(caja);
}

$("#enviar").on("click", function () {
    console.log("global_chat_id: " + global_chat_id);
    console.log("enviar");
    var texto = $("#mensaje").val();
    console.log("texto: "+ texto);
    var base_url = window.location.origin;
    $.ajax({
      type: "POST",
      url: base_url + "/hoteles/usuario/nuevo_mensaje",
      data: {"id_chat":global_chat_id,"texto":texto},
      success: function (response) {
          console.log("response bien");
          var mensajes = JSON.parse(response);
          console.log("nuevo mensaje: ");
          console.log(mensajes);
          //$(".chat-bubble").hide("slow").show("slow");
          //$(".chat-bubble" ).remove();
          //var id_sesion = mensajes.id_session;
          $.each(mensajes, function(clave, valor) {
              //if (id_sesion == valor.id_usuario_envia) {
                  var elemento =  "<div class='row no-gutters'><div class='col-md-3'><div class='chat-bubble chat-bubble--left'>"+valor.texto+"</div></div></div>"
                  $("#mensaje").val('');
                  //} else {
                  //var elemento =  "<div class='row no-gutters'><div class='col-md-3 offset-md-9'><div class='chat-bubble chat-bubble--right'>"+valor.texto+"</div></div></div>"
               //}
              $( ".chat-panel" ).append( elemento );
          });
      }, 
      error: function(response){ 
          console.log("error");
          var mensajes = response;
          console.log(mensajes);
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