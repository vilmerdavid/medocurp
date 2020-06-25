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
        <div class="alert alert-danger" role="alert">
            <strong><i class="fas fa-wine-bottle fa-2x"></i> APLICAR TEST DE ALCOHOL</strong>
        </div>
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
