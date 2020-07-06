<div class="table-responsive">


    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th colspan="5" class="text-center bg-dark text-white">
                    INFORME DEL ASSIST
                </th>
            </tr>
            <tr>
                <th>
                    Nombre completo:
                </th>
                <td colspan="4">
                    {{ $ficha->user_m->apellidos_nombres }}
                </td>
            </tr>
            <tr>
                <th>
                    Edad:
                </th>
                <td colspan="4">
                    {{ $ficha->user_m->edad }}
                </td>
            </tr>
            <tr>
                <th>
                    Puesto de trabajo:
                </th>
                <td colspan="4">
                    {{ $ficha->areaTrabajo_m->nombre }}
                </td>
            </tr>
            <tr>
                <th>
                    Fecha de aplicación:
                </th>
                <td colspan="4">
                    {{ $ficha->user_m->fecha_ingreso_trabajo }}
                </td>
            </tr>
            
            <tr>
                <th>Sustancia</th>
                <th>Su puntaje</th>
                <th>Tipo de Intervención</th>
                <th>Tipo de riesgo</th>
                <th>Significado</th>
            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Tabaco</td>
                <td>
                    {{ $ficha->informeTabaco->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Alcohol
                </td>
                <td>
                    {{ $ficha->informeAlcohol->sum('valor') }}
                </td>
                <td>
                    
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Cannabis
                </td>
                <td>
                    {{ $ficha->informeCannabis->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Cocaína
                </td>
                <td>
                    {{ $ficha->informeCocaina->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Anfetaminas
                </td>
                <td>
                    {{ $ficha->informeAnfetaminas->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Inhalantes
                </td>
                <td>
                    {{ $ficha->informeInhalantes->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tranquilizantes
                </td>
                <td>
                    {{ $ficha->informeTranquilizantes->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Alucinógenos
                </td>
                <td>
                    {{ $ficha->informeAlucinogenos->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Opiáceos
                </td>
                <td>
                    {{ $ficha->informeOpiaceos->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Otras drogas
                </td>
                <td>
                    {{ $ficha->informeOtrasDrogas->sum('valor') }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tfoot>

        </tfoot>
    </table>

</div>