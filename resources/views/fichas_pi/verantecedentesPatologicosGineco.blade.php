<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>MENARQUIA</th>
                <th>CICLOS</th>
                <th>DISMINORREA</th>
                <th>FUM</th>
                <th>G</th>
                <th>P</th>
                <th>C</th>
                <th>A</th>
                <th>HV</th>
                <th>HM</th>
                <th>VIDA SEXUAL ACTIVA</th>
                <th>PLANIFICACIÓN FAMILIAR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $ficha->menarquia_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->ciclos_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->disminorrea_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->fum_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->g_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->p_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->c_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->a_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->hv_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->hm_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->vida_sexual_activa_mujer??'' }}
                </td>
                <td>
                    {{ $ficha->planificacion_familiar_mujer??'' }}
                </td>
            </tr>
        </tbody>
    </table>
</div>