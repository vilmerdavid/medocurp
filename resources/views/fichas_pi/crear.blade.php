@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
<div class="container-fluid">
    <form action="{{ route('guardarFichaPI') }}" method="POST">
      @csrf
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                    <i class="fas fa-university"></i>
                    Cambiar de empresa
                  </button>
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
    <div class="modal-dialog" role="document">
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
        $('#menuFichas').addClass('active')
        
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

        var val_sexo=$( "#sexo" ).val();
        if(val_sexo=='Hombre'){
          $('#antecedentes').load("{{ route('cargarAntecedentesHombre') }}");
        }else{
          $('#antecedentes').load("{{ route('cargarAntecedentesMujer') }}");
        }
        

        function mostrarOtrasDrogas(arg){
          var valor=$(arg).val();
          if(valor=='SI'){
            $('#selecionar_drogas').show();
          }else{
            $('#selecionar_drogas').hide();
          }
        }


        function verificarUsuario(arg){
          var h_c=$(arg).val();
          $.post( "{{ route('obtenerUsuarioXhistoriaClinica') }}", { hc: h_c })
          .done(function( data ) {
            if(data.id){
              $('#numero_archivo').val(data.numero_archivo);
              $("label[for='numero_archivo']").addClass("active");
              $('#apellido_uno').val(data.apellido_uno);
              $("label[for='apellido_uno']").addClass("active");
              $('#apellido_dos').val(data.apellido_dos);
              $("label[for='apellido_dos']").addClass("active");
              $('#nombre_uno').val(data.nombre_uno);
              $("label[for='nombre_uno']").addClass("active");
              $('#nombre_dos').val(data.nombre_dos);
              $("label[for='nombre_dos']").addClass("active");
              $('#edad').val(data.edad);
              $("label[for='edad']").addClass("active");

              $('#btnantecedentesPatologicosClinicos').show();
              $('#btnantecedentesPatologicosQuirurgicos').show();
              $('#btnantecedentesPatologicosGineco').show();
            }else{
              $('#numero_archivo').val('');
              $("label[for='numero_archivo']").removeClass("active");
              $('#apellido_uno').val('');
              $("label[for='apellido_uno']").removeClass("active");
              $('#apellido_dos').val('');
              $("label[for='apellido_dos']").removeClass("active");
              $('#nombre_uno').val('');
              $("label[for='nombre_uno']").removeClass("active");
              $('#nombre_dos').val('');
              $("label[for='nombre_dos']").removeClass("active");
              $('#edad').val('');
              $("label[for='edad']").removeClass("active");
              $('#btnantecedentesPatologicosClinicos').hide();
            }
          });
        }



        //revisar antecedentes patologicos clinicos
        function antecedentesPatologicosClinicos(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('ANTECEDENTES PATOLÓGICOS CLÍNICOS')
          $.post( "{{ route('verantecedentesPatologicosClinicos') }}", { hc: hc})
            .done(function( data ) {
              if(data.antecedentes_clinicos){
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
          $.post( "{{ route('verantecedentesPatologicosQuirurgicos') }}", { hc: hc})
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
          $('#modalbodyRes').load("{{ route('verantecedentesPatologicosGineco') }}",{hc:hc},function(){
          })
        }

        function antecedentesReproductivos(arg){
          var hc=$('#historia_clinica_ci').val();
          $('#modalRevisar').modal('show');
          $('#exampleModalLabelRes').html('ANTECEDENTES REPRODUCTIVOS MASCULINOS')
          $('#modalbodyRes').load("{{ route('verantecedentesReproductivos') }}",{hc:hc},function(){
          })
        }

        $('#modalRevisar').on('hidden.bs.modal', function (e) {
          $('#modalbodyRes').html('');
          $('#exampleModalLabelRes').html('')
        });
    </script>



    @endpush

@endsection
