$( document ).ready(function() {
    console.log( "ready!" );
    console.log("aver que tira"+($('#fecha-desde').val()));
    
    let dia_desde = 0;
    let mes_desde = 0;
    let año_desde = 0;

    let dia_hasta = 0;
    let mes_hasta = 0;
    let año_hasta = 0;

    var fecha_desde = new Date($('#fecha-desde').val());
    var fecha_hasta = new Date($('#fecha-hasta').val());
    console.log(fecha_desde.getDate());
    $('#fecha-desde').change(function() {
        //var date = $(this).val();
        fecha_desde = new Date($('#fecha-desde').val());

        dia_desde = fecha_desde.getDate() + 1;
        mes_desde = fecha_desde.getMonth() + 1;
        año_desde = fecha_desde.getFullYear() + 1;
        console.log(fecha_desde.getFullYear(), 'change')
        if($('#fecha-hasta').val()) {
       
            console.log("se eligio fecha hasta y desde");
            if(año_desde <= año_hasta){
                console.log("el año esta bien");
                if(mes_desde <= mes_hasta){
                    console.log("el mes esta bien");
                    if(dia_desde <= dia_hasta){
                        console.log("la fecha esta bien");
                        $("#alerta").hide();
                        $("#alerta_alojamiento_ocupado").hide();
                        $("#boton_sumbit").attr("disabled", false);
                    }else{
                        $("#alerta").show();
                        $("#boton_sumbit").attr("disabled", true);
                        console.log("el dia esta mal");
                    }
                }else{
                    $("#alerta").show();
                    console.log(mes_desde);
                    console.log(mes_hasta);
                    $("#boton_sumbit").attr("disabled", true);
                    console.log("el mes esta mal");
                }
            }else{
                $("#alerta").show();
                $("#boton_sumbit").attr("disabled", true);
                console.log("el año esta mal");
            }
        }else{
            $("#alerta").show();
            $("#boton_sumbit").attr("disabled", true);
        }
    });
    $('#fecha-hasta').change(function() {
        //var date = $(this).val();
        fecha_hasta = new Date($('#fecha-hasta').val());

        dia_hasta = fecha_hasta.getDate() + 1;
        mes_hasta = fecha_hasta.getMonth() + 1;
        año_hasta = fecha_hasta.getFullYear() + 1;
        console.log(fecha_hasta.getFullYear(), 'change')

        console.log(fecha_hasta, 'change')
        if($('#fecha-desde').val()) {
            console.log("se eligio fecha desde y hasta");
            if(año_desde <= año_hasta){
                console.log("el año esta bien");
                if(mes_desde <= mes_hasta){
                    console.log("el mes esta bien");
                    if(dia_desde <= dia_hasta){
                        console.log("la fecha esta bien");
                        $("#alerta").hide();
                        $("#alerta_alojamiento_ocupado").hide();
                        $("#boton_sumbit").attr("disabled", false);
                    }else{
                        console.log("el dia esta mal");
                        $("#alerta").show();
                        $("#boton_sumbit").attr("disabled", true);
                    }
                }else{
                    console.log(mes_desde);
                    console.log(mes_hasta);
                    console.log("el mes esta mal");
                    $("#alerta").show();
                    $("#boton_sumbit").attr("disabled", true);
                }
            }else{
                console.log("el año esta mal");
                $("#alerta").show();
                $("#boton_sumbit").attr("disabled", true);
            }
        }else{
            $("#alerta").show();
            $("#boton_sumbit").attr("disabled", true);
        }
    });

});