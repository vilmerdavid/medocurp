<div class="table-responsive" id="table_test_cage">
    <table class="table table-bordered">
        <thead>
            <tr class="table-warning text-center">
                <th colspan="2">
                    <strong><i class="fas fa-wine-bottle fa-2x"></i> APLICAR TEST DE CAGE</strong>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    1.- En los últimos 3 meses, ¿Ha sentido Ud. que debe beber menos o dejar de beber? 
                </td>
                <td>
                    <input type="hidden" name="test_c" value="si">
                    <select name="p_1" id="" class="form-control p_cage">
                        <option value=""></option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    2.- En los últimos 3 meses, ¿Le ha molestado que la gente lo critique por su forma de beber? 
                </td>
                <td>
                    <select name="p_2" id="" class="form-control p_cage">
                        <option value=""></option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    3.- En los últimos 3 meses, ¿Se ha sentido mal o culpable por la cantidad o forma de beber?
                </td>
                <td>
                    <select name="p_3" id="" class="form-control p_cage">
                        <option value=""></option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    4.- En los últimos 3 meses, ¿Ha necesitado Ud. beber al siguiente día? 
                </td>
                <td>
                    <select name="p_4" id="" class="form-control p_cage">
                        <option value=""></option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td id="resultado_dependencia_cage">
                    Abstemio - Bebedor social
                </td>
                <td id="resultado_aplicar_test_cage_asist">

                </td>
            </tr>
            <tr class="text-center">
                <td colspan="2">
                    <input type="hidden" name="aplicarasis_fagerstom" id="aplicarasis_fagerstom_cage">
                </td>
            </tr>
        </tfoot>
    </table>
</div>