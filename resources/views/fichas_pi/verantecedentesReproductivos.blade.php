<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>EXÁMEN</th>
                <th>TIEMPO</th>
                <th>RESULTADO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">APE: {{ $ficha->ape_hombre??'' }}</td>
                <td>{{ $ficha->tiempo_ape_hombre??'' }}</td>
                <td>{{ $ficha->resultado_ape_hombre??'' }}</td>
            </tr>
            <tr>
                <td scope="row">ECO prostático: {{ $ficha->eco_prostatico_hombre??'' }}</td>
                <td>{{ $ficha->tiempo_eco_prostatico_hombre??'' }}</td>
                <td>{{ $ficha->resultado_eco_prostatico_hombre??'' }}</td>
            </tr>
        </tbody>
    </table>
</div>