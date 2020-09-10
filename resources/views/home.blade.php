@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
                      <div class="card" style="width: 18rem; heigth:30rem; "  style="height: 10%">
              <img src="{{ asset('img/medicina.png') }}"   class="card-img-top" alt="...">
              <div class="card-body">
                <a href="{{ route('empresas') }}"class="btn btn-primary btn-block">Institución/Empresa</a>
              </div>
          </div>
        </div>
        <div class="col-md-6"  style="height: 10%">
          <div class="card" style="width: 18rem; heigth:30rem; " >
            <img src="{{ asset('img/medicia1.png') }}"  class="card-img-top" alt="...">
            <div class="card-body">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                    <i class="fas fa-university"></i>
                    FICHA PRELABORAL INICIAL
                </button>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Selecionar una empresa</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="table-responsive">
        {!! $dataTable->table()  !!}
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>


@prepend('scriptsHeader')
<link rel="stylesheet" href="{{ asset('js/DataTables/datatables.min.css') }}">
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{{-- confirm --}}
<link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
<script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')


{!! $dataTable->scripts() !!}

<script>
  $('#menuInicio').addClass('bg-danger');
  
</script>

@endpush
@endsection
