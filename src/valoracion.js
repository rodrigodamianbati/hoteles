
//console.log("valoracion");
$( document ).ready(function() {
    console.log( "listo!" );

//mi_valoracion = $("#mi_valoracion").val();
/*
valoracion($("#mi_valoracion").val());

function valoracion(valor){

    console.log("el valor es: "+valor);
    if(valor == 1){
        console.log("cambio el 1");
        limpiar(valor);
        $("#uno").attr('checked', 'checked');
    }else{
        if(valor == 2){
            console.log("cambio el 2");
            limpiar(valor);
            $("#dos").attr('checked', 'checked');
        }else{
            if(valor == 3){
                console.log("cambio el 3");
                limpiar(valor);
                $("#tres").attr('checked', 'checked');
            }else{
                if(valor == 4){
                    console.log("cambio el 4");
                    limpiar(valor);
                    $("#cuatro").attr('checked', 'checked');
                }else{
                    if(valor == 5){
                        console.log("cambio el 5");
                        limpiar(valor);
                        $("#cinco").attr('checked', 'checked');
                    }
                }
            }
        }
    }
    console.log("funcion valoracion entro: "+valor);
}*/

$( ".puntaje" ).click(function(event) {
    var valor
    
    //alert(parseInt(event.target.id));
    //valor = parseInt(event.target.id);
    //console.log(event.target.class);
    valor = event.target.id;
    //valor = $(event.target).attr('class');
    value = $("#"+valor).attr('value');

    var id_alojamiento = $("#"+valor).attr('alojamiento');
    //console.log($(this).val());
    //console.log("el id es:"+ $("#"+event.target.id));
    console.log("el value es: "+value);
    //console.log("el valor es: "+valor);
    console.log("el id es: "+valor);

    if(value == 1){
        console.log("cambio el 1");
        limpiar(id_alojamiento);
        $("."+valor).attr('checked', 'checked');
    }else{
        if(value == 2){
            console.log("cambio el 2");
            limpiar(id_alojamiento);
            $("."+valor).attr('checked', 'checked');
        }else{
            if(value == 3){
                console.log("cambio el 3");
                limpiar(id_alojamiento);
                $("."+valor).attr('checked', 'checked');
            }else{
                if(value == 4){
                    console.log("cambio el 4");
                    limpiar(id_alojamiento);
                    $("."+valor).attr('checked', 'checked');
                }else{
                    if(value == 5){
                        console.log("cambio el 5");
                        limpiar(id_alojamiento);
                        $("."+valor).attr('checked', 'checked');
                    }
                }
            }
        }
    }
});

function limpiar(id_alojamiento){
    console.log("el id del alojamiento en la funcion es: "+id_alojamiento);
    console.log("primero limpio");
    console.log("limpiando");
    $(".uno"+id_alojamiento).attr('checked', false);
    $(".dos"+id_alojamiento).attr('checked', false);
    $(".tres"+id_alojamiento).attr('checked', false);
    $(".cuatro"+id_alojamiento).attr('checked', false);
    $(".cinco"+id_alojamiento).attr('checked', false);
    console.log("se limpio");
}

});
//$("#"+valor).prop('checked', true);

