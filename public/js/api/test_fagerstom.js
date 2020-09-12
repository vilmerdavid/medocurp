    suma_fagerstom=0;
    
    // sumar todas las respuestas
    function obter_suma_fagerstom(){
        $('.p_fagerstom').each(function () {
            valor=parseInt($(this).val());
            if(valor){
                suma_fagerstom+=valor;
            }
            
        });
    }
    obter_suma_fagerstom();
    
    //mostrar resultado de dependencia
    function resultado_dependencia_fagerstom(){
        switch(true) {
        case (suma_fagerstom <= 0):
            $('#resultado_dependencia_fagerstom').html('No tiene dependencia');
            break;
        case (suma_fagerstom <= 1):
            $('#resultado_dependencia_fagerstom').html('Dependencia muy baja');
            break;
        case (suma_fagerstom <= 4):
            $('#resultado_dependencia_fagerstom').html('Dependencia baja');
            break;
        case (suma_fagerstom <= 6):
            $('#resultado_dependencia_fagerstom').html('Dependencia moderada');
        break;
        case (suma_fagerstom <= 10):
            $('#resultado_dependencia_fagerstom').html('Dependencia alta');
        break;
        default:
            // mas codigo
        }
    }
    
    resultado_dependencia_fagerstom();

    // mostrar aplicat test asists
    function verificar_resultado_asist(){
        if($('#resultado_dependencia_fagerstom').html()=='Dependencia moderada' || $('#resultado_dependencia_fagerstom').html()=='Dependencia alta'){
            $('#resultado_aplicat_test_asist').html('APLICAR TEST ASSIST');
            $('#aplicarasis_fagerstom').val('SI');
            $('#table_asist_test').show();
        }else{
            $('#resultado_aplicat_test_asist').html('NO APLICA TEST ASSIST');
            $('#aplicarasis_fagerstom').val('NO');
            $('#table_asist_test').hide();
        }
    }
    verificar_resultado_asist();
    


    // actualizar sumas cuando cambio de respuesta
    $(".p_fagerstom").on("change",function(){
        suma_fagerstom=0;
        obter_suma_fagerstom();
        resultado_dependencia_fagerstom();
        verificar_resultado_asist();
    });

    // actualizar formulario de test
    $( "#form_fagerstom_x" ).submit(function( event ) {
        
        event.preventDefault();

        var $form = $( this ),
        datos = $form.serialize(),
        url = $form.attr( "action" );

        $form.block({message: '<i class="fas fa-spinner fa-spin"></i>Procesando'});
        var posting = $.post( url, datos )
        .done(function( data ) {
            
        })
        .fail(function() {
            alert( "TEST DE FAGERSTOM NO GUARDADO" );
        })
        .always(function() {
            $form.unblock(); 
        });
    });
