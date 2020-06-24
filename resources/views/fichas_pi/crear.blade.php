@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
<div class="container-fluid">
    <form action="">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                    <i class="fas fa-university"></i>
                    Seleciona una empresa
                  </button>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="datos_empresa"></div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>


  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
        $('#menuEmpresas').addClass('active')
        
        // cargar empresa
        function cargarEmpresa(arg){
            $('#basicExampleModal').modal('hide');
            var url="{{ route('obtenerEmpresa',':empresa') }}".replace(':empresa',$(arg).data('empresa'));
            $( "#datos_empresa" ).load(url);

            
        }


        function mostrarPorcentajeDiscapacidad(arg){
            var valor=$(arg).val();
            if(valor=='NO'){
                $('#porcentaje_discapacidad_text').hide();
                $('#porcentaje_discapacidad').val('');
            }else{
                $('#porcentaje_discapacidad_text').show();
            }
            console.log(valor)
        }

        function cargarAntecedentes(arg){
            var valor=$(arg).val();
            var url="{{ route('cargarAntecedentesHombre') }}";
            if(valor=='Mujer'){
                url="{{ route('cargarAntecedentesMujer') }}";
            }

            $('#antecedentes').load(url);
        }

        
        
        
        
    </script>



    @endpush

@endsection
