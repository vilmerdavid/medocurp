<table class="table table-bordered table-sm" id="table_fagerstom_test">
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
                <select  id="" class="form-control p_fagerstom" name="pf_1">
                    <option value=""></option>
                    <option value="3">Hasta 5 minutos</option>
                    <option value="2">De 6 a 30 minutos</option>
                    <option value="1">De 31 a 60 minutos</option>
                    <option value="0">Más de 60 minutos</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                2.- ¿Encuentra difícil no fumar en lugares donde está prohibido (hospital, cine, biblioteca)?
            </td>
            <td>
                <select  id="" class="form-control p_fagerstom" name="pf_2">
                    <option value=""></option>
                    <option value="1" >SI</option>
                    <option value="0" >NO</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                3.- ¿Qué cigarrillo se le hace más necesario a Ud.?
            </td>
            <td>
                <select  id="" class="form-control p_fagerstom" name="pf_3">
                    <option value=""></option>
                    <option value="1">El primero de la mañana</option>
                    <option value="0">Cualquier otro</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                4.- ¿Cuántos cigarrillos fuma al día?
            </td>
            <td>
                <select  id="" class="form-control p_fagerstom" name="pf_4">
                    <option value=""></option>
                    <option value="0">Menos de 10 unidades por día</option>
                    <option value="1">De 11 a 20 unidades por día</option>
                    <option value="2">De 21 a 30 unidades por día</option>
                    <option value="3">Más de 30 unidades por día</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                5.- ¿Fuma con más frecuencia durante las primeras horas después de levantarse?
            </td>
            <td>
                <select  id="" class="form-control p_fagerstom" name="pf_5">
                    <option value=""></option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                6. ¿Fuma aunque esté tan enfermo que tenga que guardar cama la mayor parte del día?
            </td>
            <td>
                <select  id="" class="form-control p_fagerstom" name="pf_6">
                    <option value=""></option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
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
                NO APLICA TEST ASSIST 
                
            </td>
        </tr>
      
    </tfoot>
</table>