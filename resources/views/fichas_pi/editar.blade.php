@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
<style>
    .np-logo {
        background-repeat: no-repeat;
        background-size: 100% 100%;
        width: 20%;
        height: 75px;
    }
</style>
@include('fichas_pi.menu')


<div class="container-fluid">
    <form action="{{ route('guardarFichaPI') }}" method="POST">
        <input type="hidden" name="usuario_id" id="usuario_id" value="{{ $ficha->user_m->id??'' }}">
        <input type="hidden" name="fichaPi_id" id="fichaPi_id" value="{{ $ficha->id??'' }}">
      @csrf
        <div class="card">
            <div class="card-header">
                
              <div class="form-row">
                <div class="col-md-2">
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                      <i class="fas fa-university"></i>
                      Cambiar de empresa
                  </button>
                </div>

                <div class="col-md-10">
                  <div class="form-group">
                      <label for="tipoFicha">Selecione tipo de ficha</label>
                      <select class="form-control" name="tipoFicha" id="tipoFicha" onchange="cambiarTipoFicha(this);">
                        <option value="DE INGRESO" {{ $ficha->tipoFicha=='DE INGRESO'?'selected':'' }}>DE INGRESO</option>
                        <option value="PERIÓDICA" {{ $ficha->tipoFicha=='PERIÓDICA'?'selected':'' }}>PERIÓDICA</option>
                        <option value="DE REINTEGRO" {{ $ficha->tipoFicha=='DE REINTEGRO'?'selected':'' }}>DE REINTEGRO</option>
                        <option value="DE RETIRO" {{ $ficha->tipoFicha=='DE RETIRO'?'selected':'' }}>DE RETIRO</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-body" id="datos_empresa">
                
                  @include('fichas_pi.datos_empresa',['emp'=>$empresa])
                
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
          <h5 class="modal-title" id="exampleModalLabel">Cambiar de empresa</h5>
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



  <div class="modal fade" id="modalRevisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelRes" aria-hidden="true">
    <div class="modal-dialog modal-fluid" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelRes"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalbodyRes">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
    
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @endprepend

    @push('scriptsFooter')
    
    {!! $dataTable->scripts() !!}

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_empresa_usuario').addClass('active')
        
        var idFicha="{{ $ficha->id }}";
        

        function mostrarPorcentajeDiscapacidad(arg){
            var valor=$(arg).val();
            if(valor=='NO'){
                $('#porcentaje_discapacidad_text').hide();
                $('#porcentaje_discapacidad').val('');
            }else{
                $('#porcentaje_discapacidad_text').show();
            }
            
        }

        function cargarAntecedentes(arg){
            var valor=$(arg).val();
            var url="{{ route('cargarAntecedentesHombre',$ficha->id) }}";
            if(valor=='Mujer'){
                url="{{ route('cargarAntecedentesMujer',$ficha->id) }}";
            }

            $('#antecedentes').load(url);
        }

        var opcion_sexo=$('#sexo option:selected').val();
        
        if(opcion_sexo=='Hombre'){
            var url="{{ route('cargarAntecedentesHombre',$ficha->id) }}";
            $('#antecedentes').load(url);
        }else{
            var url="{{ route('cargarAntecedentesMujer',$ficha->id) }}";
            $('#antecedentes').load(url);
        }



        

        function mostrarOtrasDrogas(arg){
          var valor=$(arg).val();
          if(valor=='SI'){
            $('#selecionar_drogas').show();
          }else{
            $('#selecionar_drogas').hide();
          }
        }

        function cambiarEmpresa(arg){
            var ficha_id="{{ $ficha->id }}";
            $.post( "{{ route('cambiarEmpresaEditarFichaPI') }}", {empresa:$(arg).data('id'),ficha:ficha_id})
            .done(function(data) {
                location.replace(data.url);
            })
            .fail(function() {
                alert( "Error en cambiar empresa" );
            })
            .always(function() {
                
            });
        }


        //revisar antecedentes patologicos clinicos
        function antecedentesPatologicosClinicos(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('ANTECEDENTES PATOLÓGICOS CLÍNICOS')
          $.post( "{{ route('verantecedentesPatologicosClinicos') }}", { hc: hc,ficha:idFicha})
            .done(function( data ) {
              if(data.antecedentes_clinicos){
                console.log(data)
                $('#modalbodyRes').html(data.antecedentes_clinicos)
              }else{
                $('#modalbodyRes').html('')
              }
          });
        }


        function antecedentesPatologicosQuirurgicos(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('ANTECEDENTES PATOLÓGICOS QUIRÚRGICOS')
          $.post( "{{ route('verantecedentesPatologicosQuirurgicos') }}", { hc: hc,ficha:idFicha})
            .done(function( data ) {
              console.log(data)
              if(data.antecedentes_quirurgicos){
                
                $('#modalbodyRes').html(data.antecedentes_quirurgicos)
              }else{
                $('#modalbodyRes').html('')
              }
          });
        }


        function antecedentesPatologicosGineco(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('ANTECEDENTES PATOLÓGICOS GINECO OBSTÉTRICOS')
          $('#modalbodyRes').load("{{ route('verantecedentesPatologicosGineco') }}",{hc: hc,ficha:idFicha},function(){
          })
        }

        function antecedentesReproductivos(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('ANTECEDENTES REPRODUCTIVOS MASCULINOS')
          $('#modalbodyRes').load("{{ route('verantecedentesReproductivos') }}",{hc: hc,ficha:idFicha},function(){
          })
        }

        function verHabitosToxicos(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('HÁBITOS TÓXICOS')
          $('#modalbodyRes').load("{{ route('verHabitosToxicosAnteriores') }}",{hc: hc,ficha:idFicha},function(){
          })
        }
        function verEstiloVida(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('ESTILO DE VIDA')
          $('#modalbodyRes').load("{{ route('verEstiloVida') }}",{hc: hc,ficha:idFicha},function(){
          })
        }
        

        $('#modalRevisar').on('hidden.bs.modal', function (e) {
          $('#modalbodyRes').html('');
          $('#exampleModalLabelRes').html('')
        });

        var valorTipoFicha=$('#tipoFicha').val();
        if(valorTipoFicha=='DE RETIRO'){
            $('#tabla_ficha_retiro').show();
          }else{
            $('#tabla_ficha_retiro').hide();
          }

        function cambiarTipoFicha(arg){
          var valor=$(arg).val();
          if(valor=='DE RETIRO'){
            $('#tabla_ficha_retiro').show();
          }else{
            $('#tabla_ficha_retiro').hide();
          }
        }
        
    </script>



    @endpush

@endsection
