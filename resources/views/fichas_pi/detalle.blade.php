@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')

<div class="container">

    @if ($test_f)
        
    @include('fichas_pi.test.fagerstom',['test_f'=>$test_f])

    @else
        <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-smoking-ban fa-2x"></i> NO APLICA TEST DE TABACO</strong>
        </div>
    @endif


    @if ($test_c)
        

        <form action="{{ route('actualizarTestCage') }}" method="POST">
            @csrf
            <input type="hidden" name="test_c" value="{{ $test_c->id }}">
            <div class="table-responsive">
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
                                <select name="p_1" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="1" {{ $test_c->p_1=='1'?'selected':'' }}>SI</option>
                                    <option value="0" {{ $test_c->p_1=='0'?'selected':'' }}>NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2.- En los últimos 3 meses, ¿Le ha molestado que la gente lo critique por su forma de beber? 
                            </td>
                            <td>
                                <select name="p_2" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="1" {{ $test_c->p_2=='1'?'selected':'' }}>SI</option>
                                    <option value="0" {{ $test_c->p_2=='0'?'selected':'' }}>NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3.- En los últimos 3 meses, ¿Se ha sentido mal o culpable por la cantidad o forma de beber?
                            </td>
                            <td>
                                <select name="p_3" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="1" {{ $test_c->p_3=='1'?'selected':'' }}>SI</option>
                                    <option value="0" {{ $test_c->p_3=='0'?'selected':'' }}>NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4.- En los últimos 3 meses, ¿Ha necesitado Ud. beber al siguiente día? 
                            </td>
                            <td>
                                <select name="p_4" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="1" {{ $test_c->p_4=='1'?'selected':'' }}>SI</option>
                                    <option value="0" {{ $test_c->p_4=='0'?'selected':'' }}>NO</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="2">
                                <button class="btn btn-primary btn-sm" type="submit">GUARDAR TEST DE CAGE</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    @else
        <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-wine-bottle fa-2x"></i> NO APLICA TEST DE ALCOHOL</strong>
        </div>
    @endif

    @if ($ficha->otras_drogas=='SI')
        <div class="alert alert-danger" role="alert">
            <strong><i class="fas fa-cannabis fa-2x"></i> APLICAR TEST DE OTRAS DROGAS</strong>
        </div>
    @else
        <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-cannabis fa-2x"></i> NO APLICA TEST DE OTRAS DROGAS</strong>
        </div>
    @endif
    
    
</table>
</div>



@prepend('scriptsHeader')
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
@endprepend

@push('scriptsFooter')
<script src="{{ asset('js/api/test_fagerstom.js') }}"></script>


@endpush
@endsection
