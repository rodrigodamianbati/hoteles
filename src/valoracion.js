
//console.log("valoracion");
$( document ).ready(function() {
    console.log( "listo!" );

//mi_valoracion = $("#mi_valoracion").val();
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
}

$( ".puntaje" ).click(function(event) {
    var valor
    //alert(parseInt(event.target.id));
    valor = parseInt(event.target.id);

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
});

function limpiar(valor){
    console.log("el valor en la funcion es: "+valor);
    console.log("primero limpio");
    $("#uno").attr('checked', false);
    $("#dos").attr('checked', false);
    $("#tres").attr('checked',  false);
    $("#cuatro").attr('checked', false);
    $("#cinco").attr('checked', false);
}

});
//$("#"+valor).prop('checked', true);

