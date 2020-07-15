suma_cage=0;
    
    // sumar todas las respuestas test cage
    function obter_suma_cage(){
        $('.p_cage').each(function () {
            valor_c=parseInt($(this).val());
            if(valor_c){
                suma_cage+=valor_c;
            }
            
        });
    }
    obter_suma_cage();
    
     //mostrar resultado de dependencia
     function resultado_dependencia_cage(){
        switch(true) {
        
        case (suma_cage <= 1):
            $('#resultado_dependencia_cage').html('Abstemio - Bebedor social');
            break;
        case (suma_cage <= 2):
            $('#resultado_dependencia_cage').html('Consumo de riesgo');
            break;
        case (suma_cage <= 3):
            $('#resultado_dependencia_cage').html('Consumo perjudicial');
        break;
        case (suma_cage <= 4):
            $('#resultado_dependencia_cage').html('Dependencia alcohólica');
        break;
        default:
            // mas codigo
        }
    }
    
    resultado_dependencia_cage();

    $(".p_cage").on("change",function(){
        suma_cage=0;
        obter_suma_cage();
        resultado_dependencia_cage();
        verificar_resultado_test_cage_asist();
    });

     // mostrar aplicat test asists
     function verificar_resultado_test_cage_asist(){
        if($('#resultado_dependencia_cage').html()!='Abstemio - Bebedor social'){
            
            $('#resultado_aplicar_test_cage_asist').html('APLICAR TEST ASIST');
            $('#aplicarasis_fagerstom_cage').val('SI');
        }else{
            $('#resultado_aplicar_test_cage_asist').html('NO APLICA TEST ASIST');
            $('#aplicarasis_fagerstom_cage').val('NO');
        }
    }
    verificar_resultado_test_cage_asist();

    $('#form_test_cage_x').submit(function( event ) {
        
        event.preventDefault();

        var $form = $( this ),
        datos = $form.serialize(),
        url = $form.attr( "action" );

        $form.block({message: '<i class="fas fa-spinner fa-spin"></i>Procesando'});
        var posting = $.post( url, datos )
        .done(function( data ) {
            
        })
        .fail(function() {
            alert( "TEST DE CAGE NO GUARDADO" );
        })
        .always(function() {
            $form.unblock(); 
        });
    });