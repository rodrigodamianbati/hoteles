
//console.log("valoracion");
var valor = parseInt($('#mi_valoracion').val());
console.log("el valor es: "+valor);

//$("#"+valor).prop('checked', true);
if(valor == 1){
    $("#uno").attr('checked', 'checked');
}else{
    if(valor == 2){
        $("#dos").attr('checked', 'checked');
    }else{
        if(valor == 3){
            $("#tres").attr('checked', 'checked');
        }else{
            if(valor == 4){
                $("#cuatro").attr('checked', 'checked');
            }else{
                if(valor == 5){
                    $("#cinco").attr('checked', 'checked');
                }
            }
        }
    }
}
