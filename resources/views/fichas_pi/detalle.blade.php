@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')

<div class="container-fluid">

    @if ($test_f)
        
        @include('fichas_pi.test.fagerstom',['test_f'=>$test_f])

    @else
        <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-smoking-ban fa-2x"></i> NO APLICA TEST DE TABACO</strong>
        </div>
    @endif
</div>

<div class="container-fluid">
    @if ($test_c)
        @include('fichas_pi.test.cage',['test_c'=>$test_c])
    @else
        <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-wine-bottle fa-2x"></i> NO APLICA TEST DE ALCOHOL</strong>
        </div>
    @endif
</div>
<div class="container-fluid">


    @if (count($test_a)>0)
       @include('fichas_pi.test.asist',['test_a'=>$test_a])
    @else
        <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-cannabis fa-2x"></i> NO APLICA TEST DE OTRAS DROGAS</strong>
        </div>
    @endif

</div>


<div class="container">
    
    @include('fichas_pi.test.informe',['ficha'=>$ficha])

</div>


@prepend('scriptsHeader')
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
@endprepend

@push('scriptsFooter')

<script src="{{ asset('js/api/test_fagerstom.js') }}"></script>
<script src="{{ asset('js/api/test_cage.js') }}"></script>

@endpush
@endsection
