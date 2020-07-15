<form action="{{ route('actualizarTestFagerstom') }}" method="POST" id="form_fagerstom">
    @csrf
    <input type="hidden" name="test_f" id="" value="{{ $test_f->id }}">
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th colspan="2" class="table-danger text-center">
                        <strong><i class="fas fa-smoking fa-2x"></i> APLICAR TEST DE FAGERSTOM</strong>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1.- ¿Cuánto tiempo pasa entre que se levanta y se fuma su primer cigarrillo?
                        <br>
                    </td>
                    <td>
                        <select  id="" class="form-control p_fagerstom" name="p_1">
                            <option value=""></option>
                            <option value="3" {{ $test_f->p_1=='3'?'selected':'' }}>Hasta 5 minutos</option>
                            <option value="2" {{ $test_f->p_1=='2'?'selected':'' }}>De 6 a 30 minutos</option>
                            <option value="1" {{ $test_f->p_1=='1'?'selected':'' }}>De 31 a 60 minutos</option>
                            <option value="0" {{ $test_f->p_1=='0'?'selected':'' }}>Más de 60 minutos</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        2.- ¿Encuentra difícil no fumar en lugares donde está prohibido (hospital, cine, biblioteca)?
                    </td>
                    <td>
                        <select  id="" class="form-control p_fagerstom" name="p_2">
                            <option value=""></option>
                            <option value="1" {{ $test_f->p_2=='1'?'selected':'' }}>SI</option>
                            <option value="0" {{ $test_f->p_2=='0'?'selected':'' }}>NO</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        3.- ¿Qué cigarrillo se le hace más necesario a Ud.?
                    </td>
                    <td>
                        <select  id="" class="form-control p_fagerstom" name="p_3">
                            <option value=""></option>
                            <option value="1" {{ $test_f->p_3=='1'?'selected':'' }}>El primero de la mañana</option>
                            <option value="0" {{ $test_f->p_3=='0'?'selected':'' }}>Cualquier otro</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        4.- ¿Cuántos cigarrillos fuma al día?
                    </td>
                    <td>
                        <select  id="" class="form-control p_fagerstom" name="p_4">
                            <option value=""></option>
                            <option value="0" {{ $test_f->p_4=='0'?'selected':'' }}>< 10/d</option>
                            <option value="1" {{ $test_f->p_4=='1'?'selected':'' }}>De 11 a 20/d</option>
                            <option value="2" {{ $test_f->p_4=='2'?'selected':'' }}>De 21 a 30/d</option>
                            <option value="3" {{ $test_f->p_4=='3'?'selected':'' }}>> 30/d</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        5.- ¿Fuma con más frecuencia durante las primeras horas después de levantarse?
                    </td>
                    <td>
                        <select  id="" class="form-control p_fagerstom" name="p_5">
                            <option value=""></option>
                            <option value="1" {{ $test_f->p_5=='1'?'selected':'' }}>SI</option>
                            <option value="0" {{ $test_f->p_5=='0'?'selected':'' }}>NO</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        6. ¿Fuma aunque esté tan enfermo que tenga que guardar cama la mayor parte del día?
                    </td>
                    <td>
                        <select  id="" class="form-control p_fagerstom" name="p_6">
                            <option value=""></option>
                            <option value="1" {{ $test_f->p_6=='1'?'selected':'' }}>SI</option>
                            <option value="0" {{ $test_f->p_6=='0'?'selected':'' }}>NO</option>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="table-danger text-center">Valoración de dependencia a la nicotina
                        <input type="hidden" name="aplicarasis_fagerstom" id="aplicarasis_fagerstom">
                    </th>
                    
                </tr>
                <tr class="text-center">
                    <td id="resultado_dependencia_fagerstom">
                        NO TIENE DEPENDENCIA
                    </td>
                    <td id="resultado_aplicat_test_asist">
                        NO APLICA TEST ASIST
                        
                    </td>
                </tr>
                <tr class="text-center">
                    <td colspan="2">
                        <button class="btn btn-danger" type="submit">GUARDAR TEST DE FAGERSTOM</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    
</form>
