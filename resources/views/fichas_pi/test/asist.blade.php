
<form action="{{ route('actualizarTestAsis') }}" method="POST" id="form_test_asis">
    @csrf
    <input type="hidden" name="ficha" value="{{ $ficha->id }}">
    <div class="table-responsive">
        <table class="table table-sm">
            <thead >
                
                <tr class="table-primary text-center">
                    <th colspan="3">
                        <strong>
                            
                            <i class="fas fa-cannabis fa-2x"></i>
                            Prueba de detección de consumo de alcohol, tabaco y otras drogas - ASSIST V3.0
                        </strong>
                    </th>
                    
                </tr>
                <tr>
                    <td colspan="3" class="text-justify">
                        <small>
                            Gracias por aceptar a participar en esta breve entrevista sobre el alcohol, tabaco y otras drogas. Le voy hacer algunas preguntas sobre su experiencia de consumo de sustancias a lo largo de su vida, así como en los últimos tres meses. Estas sustancias pueden ser fumadas, ingeridas, inhaladas, inyectadas o consumidas en forma de pastillas (muestre la tarjeta de drogas). Algunas de las sustancias incluidas pueden haber sido recetadas por un médico (p.ej. pastillas adelgazantes, tranquilizantes, o determinados medicamentos para el dolor). Para esta entrevista, no vamos a anotar fármacos que hayan sido consumidos tal como han sido prescritos por su médico. Sin embargo, si ha tomado alguno de estos medicamentos por motivos distintos a los que fueron prescritos o los toma más frecuentemente o a dosis más altas a las prescritas, entonces díganoslo. Si bien estamos interesados en conocer su consumo de diversas drogas, por favor tenga por seguro que esta información será tratada con absoluta confidencialidad
                        </small>
                    </td>
                </tr>
            </thead>
            <tbody>
                

                @php($i=1)
                
                @foreach ($test_a as $a)
            


                


                @if ($a->codigo=='p1_1')
                    <tr class="table-primary">

                        <td >PREGUNTA 1</td>
                        <td colspan="2">
                            A lo largo de su vida, ¿Cuál de las siguientes sustancias ha consumido alguna vez? (SOLO PARA USOS NO - MÉDICOS)
                        </td>
                    </tr>

                @endif


                @if ($a->codigo=='p2_1')
                <tr>
                    <td colspan="3" class="table-success">
                        <small>Compruebe si todas las respuestas son negativas: “¿Tampoco incluso cuando iba al colegio?”</small>
                        <br>
                        <small>Si contestó "No" a todos los ítems, pare la entrevista. Si contestó "Si" a alguno de estos ítems, siga a la Pregunta 2 para cada sustancia que ha consumido alguna vez.</small>
                    </td>
                </tr>
                    <tr class="table-primary">

                        <td >PREGUNTA 2</td>
                        <td colspan="2">
                            ¿Con qué frecuencia ha consumido las sustancias que ha mencionado en los últimos tres meses, (PRIMERA DROGA, SEGUNDA DROGA, ETC)?
                        </td>
                    </tr>
                @endif


                @if ($a->codigo=='p3_1')
                    
                    <tr>
                        <td colspan="3" class="table-success">
                            <small>Si ha respondido "Nunca" a todos los items en la Pregunta 2, salte a la Pregunta 6. Si ha consumido alguna de las sustancias de la Pregunta 2 en los últimos tres meses, continúe con las preguntas 3, 4 & 5 para cada una de las sustancias que ha consumido.</small>
                        </td>
                    </tr>
                    <tr class="table-primary">
                        <td >PREGUNTA 3</td>
                        <td colspan="2">
                            En los últimos tres meses, ¿con qué frecuencia ha tenido deseos fuertes o ansias de consumir (PRIMERA DROGA, SEGUNDA DROGA, ETC)?
                        </td>
                    </tr>
                @endif


                @if ($a->codigo=='p4_1')
                    <tr class="table-primary">

                        <td >PREGUNTA 4</td>
                        <td colspan="2">
                            En los últimos tres meses, ¿con qué frecuencia le ha llevado su consumo de (PRIMERA DROGA, SEGUNDA DROGA, ETC) a problemas de salud, sociales, legales o económicos?
                        </td>
                    </tr>
                @endif


                @if ($a->codigo=='p5_1')
                    <tr class="table-primary">

                        <td >PREGUNTA 5</td>
                        <td colspan="2">
                            En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que se esperaba de usted habitualmente por el consumo de (PRIMERA DROGA, SEGUNDA DROGA, ETC)?
                        </td>
                    </tr>
                @endif


                @if ($a->codigo=='p6_1')
                    <tr>
                        <td colspan="3" class="table-success">
                            <small>
                                Haga las preguntas 6 y 7 para todas las sustancias que ha consumido alguna vez (es decir, aquellas abordadas en la Pregunta 1)
                            </small>
                        </td>
                    </tr>
                    <tr class="table-primary">

                        <td >PREGUNTA 6</td>
                        <td colspan="2">
                            ¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por su consumo de (PRIMERA DROGA, SEGUNDA DROGA, ETC)?
                        </td>
                    </tr>
                @endif

                @if ($a->codigo=='p7_1')
                    <tr class="table-primary">
                        <td >PREGUNTA 7</td>
                        <td colspan="2">
                            ¿Ha intentado alguna vez controlar, reducir o dejar de consumir (PRIMERA DROGA, SEGUNDA DROGA, ETC) y no lo ha logrado?
                        </td>
                    </tr>
                @endif

                @if ($a->codigo=='p8_1')
                    <tr>

                        
                        <td class="table-primary">
                            PREGUNTA 8 <br>
                            ¿Ha consumido alguna vez alguna droga por vía inyectada? (ÚNICAMENTE PARA USOS NO MÉDICOS)
                        </td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>No, nunca</option>
                                <option value="2" {{ $a->valor=='2'?'selected':'' }}>Si, en los últimos 3 meses</option>
                                <option value="1" {{ $a->valor=='1'?'selected':'' }}>Sí, pero no en los últimos 3 meses</option>
                            </select>
                        </td>
                        <td>
                            {{ $a->valor }}
                            
                        </td>
                    </tr>
                @endif

                @if ($a->codigo=='p9_1')
                    <tr>
                        <th colspan="3" class="text-center table-success">
                            <strong>NOTA IMPORTANTE</strong>
                            <br>
                            <small>
                                A los pacientes que se han inyectado drogas en los últimos 3 meses se les debe preguntar sobre su patrón de inyección en este período, para determinar los niveles de riesgo y el mejor tipo de intervención.
                            </small>
                        </th>


                    </tr>
                    <tr>
                        <td>
                            PATRÓN DE INYECCIÓN
                        </td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>Una vez a la semana o menos, ó; menos de 3 días seguidos</option>
                                <option value="1" {{ $a->valor=='1'?'selected':'' }}>Más de una vez a la semana, ó; 3 o más días seguidos </option>
                                
                            </select>
                        </td>
                        <td>
                            {{ $a->valor }}
                        </td>
                    </tr>
                    
                @endif

                    


                {{-- pregunta 1 --}}
                @if ($i<=10)
                    <tr>
                        <td scope="row">{{ $a->pregunta_m->nombre }}</td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="3" {{ $a->valor=='3'?'selected':'' }}>SI</option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>NO</option>
                            </select>
                        </td>
                        <td>
                            
                            <p>{{ $a->valor }}</p>
                        </td>
                    </tr>
                @endif



                {{-- pregunta 2 --}}
                @if ( $i>10 && $i<=20)
                    <tr>
                        <td scope="row">{{ $a->pregunta_m->nombre }}</td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>Nunca</option>
                                <option value="2" {{ $a->valor=='2'?'selected':'' }}>Una o dos veces</option>
                                <option value="3" {{ $a->valor=='3'?'selected':'' }}>Cada mes</option>
                                <option value="4" {{ $a->valor=='4'?'selected':'' }}>Cada semana</option>
                                <option value="6" {{ $a->valor=='6'?'selected':'' }}>A diario o casi a diario</option>
                            </select>
                        </td>
                        <td>
                            {{ $a->valor }}
                        </td>
                    </tr>
                @endif

                
                
                {{-- pregunta 3 --}}
                @if ( $i>20 && $i<=30)
                    <tr>
                        <td scope="row">{{ $a->pregunta_m->nombre }}</td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>Nunca</option>
                                <option value="3" {{ $a->valor=='3'?'selected':'' }}>Una o dos veces</option>
                                <option value="4" {{ $a->valor=='4'?'selected':'' }}>Cada mes</option>
                                <option value="5" {{ $a->valor=='5'?'selected':'' }}>Cada semana</option>
                                <option value="6" {{ $a->valor=='6'?'selected':'' }}>A diario o casi a diario</option>
                            </select>
                        </td>
                        <td>
                            {{ $a->valor }}
                        </td>
                    </tr>
                @endif



                
                {{-- pregunta 4 --}}
                @if ( $i>30 && $i<=40)
                    <tr>
                        <td scope="row">{{ $a->pregunta_m->nombre }}</td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>Nunca</option>
                                <option value="4" {{ $a->valor=='4'?'selected':'' }}>Una o dos veces</option>
                                <option value="5" {{ $a->valor=='5'?'selected':'' }}>Cada mes</option>
                                <option value="6" {{ $a->valor=='6'?'selected':'' }}>Cada semana</option>
                                <option value="7" {{ $a->valor=='7'?'selected':'' }}>A diario o casi a diario</option>
                            </select>
                        </td>
                        <td>
                            {{ $a->valor }}
                        </td>
                    </tr>
                @endif




                {{-- pregunta 5 --}}
                @if ( $i>40 && $i<=50)
                    <tr>
                        <td scope="row">{{ $a->pregunta_m->nombre }}</td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>Nunca</option>
                                <option value="5" {{ $a->valor=='5'?'selected':'' }}>Una o dos veces</option>
                                <option value="6" {{ $a->valor=='6'?'selected':'' }}>Cada mes</option>
                                <option value="7" {{ $a->valor=='7'?'selected':'' }}>Cada semana</option>
                                <option value="8" {{ $a->valor=='8'?'selected':'' }}>A diario o casi a diario</option>
                            </select>
                        </td>
                        <td>
                            {{ $a->valor }}
                            
                        </td>
                    </tr>
                @endif



                {{-- pregunta 6 y 7 --}}
                @if ( $i>50 && $i<=70)
                    <tr>
                        <td scope="row">{{ $a->pregunta_m->nombre }}</td>
                        <td>
                            <select name="pregunta[{{ $a->id }}]" id="{{ $a->id }}" class="form-control">
                                <option value=""></option>
                                <option value="0" {{ $a->valor=='0'?'selected':'' }}>No, nunca</option>
                                <option value="6" {{ $a->valor=='6'?'selected':'' }}>Si, en los últimos 3 meses</option>
                                <option value="3" {{ $a->valor=='3'?'selected':'' }}>Sí, pero no en los últimos 3 meses</option>
                            </select>
                        </td>
                        <td>
                            {{ $a->valor }}
                            
                        </td>
                    </tr>
                @endif


                
                
                

                @php($i++)
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar TEST ASSIST</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</form>